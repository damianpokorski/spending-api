<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

// Firebase auth
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;
use Firebase\Auth\Token\Exception\InvalidToken;

class FirebaseAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Establish variables
        $headers = $request->headers->all();
        $useremail = $headers['x-user-email'][0];
        $authtoken = $headers['x-auth-token'][0];
        
        // Firebase auth
        $serviceAccount = ServiceAccount::fromJsonFile('/var/www/spending-api-firebase-adminsdk.json');
        $firebase = (new Factory)
            ->withServiceAccount($serviceAccount)
            ->create();

        try {
            $verifiedIdToken = $firebase->getAuth()->verifyIdToken($authtoken);
        } catch (InvalidToken $e) {
            return (new Response(['error'=> $e->getMessage()], 401))
                ->withHeaders([
                    'x-token-valid' => 0,
                    'Content-Type' => 'application/json'
                ]);
        }
        
        // Get user data
        $user = $firebase->getAuth()->getUser($verifiedIdToken->getClaim('sub'));

        // If user data is valid, 
        if($user->email == $useremail){
            $response =  $next($request);
            $response->header('x-token-valid', 1);
            return $response;
        }

        // Email supplied in header doesnt match the token
        return (new Response(['error'=> 'Token -> email mismatch.'], 401))
            ->withHeaders([
                'x-token-valid' => 0,
                'Content-Type' => 'application/json'
            ]);
    }
}
