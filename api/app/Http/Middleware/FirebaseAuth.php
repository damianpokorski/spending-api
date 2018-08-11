<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

// Firebase auth
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Firebase\Auth\Token\Exception\InvalidToken;

class FirebaseAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */

    public function pass($request, $next)
    {
        $response =  $next($request);
        $response->header('x-token-valid', 1);
        return $response;
    }

    public function handle(Request $request, Closure $next)
    {
        // Establish variables
        $headers = $request->headers->all();
        $useremail = $headers['x-user-email'][0] ?? '';
        $authtoken = $headers['x-auth-token'][0] ?? '';

        // Check if user exists, and if store token is matching, if so - user been recently authenticated
        $user = \App\User::firstOrCreate(['email' => $useremail]);
        if($user->auth_token == $authtoken) {
            return $this->pass($request, $next);
        }
        
        // Firebase auth
        $serviceAccount = ServiceAccount::fromJsonFile('/var/www/spending-api-firebase-adminsdk.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        try {
            $verifiedIdToken = $firebase->getAuth()->verifyIdToken($authtoken);
        } catch (InvalidToken $e) {
            return (new Response(['error'=> $e->getMessage()], 401))
                ->withHeaders(
                    [
                    'x-token-valid' => 0,
                    'Content-Type' => 'application/json'
                    ]
                );
        }
        
        // Get user data
        $user_verified = $firebase->getAuth()->getUser($verifiedIdToken->getClaim('sub'));

        // If user token matches
        //print_r($user_verified);
        //die();
        if($user->email == $useremail && $user_verified->email == $useremail) {
            // Save or update verified data
            $user->auth_token = $authtoken;
            $user->display_name = $user_verified->displayName;
            $user->photo_url = $user_verified->photoUrl;
            $user->save();

            return $this->pass($request, $next);
        }

        // Email supplied in header doesnt match the token
        return (new Response(['error'=> 'Token -> email mismatch.'], 401))
            ->withHeaders(
                [
                'x-token-valid' => 0,
                'Content-Type' => 'application/json'
                ]
            );
    }
}
