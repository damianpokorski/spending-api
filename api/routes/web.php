<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/*
    User for models that belong to user. 
    Yay for generic approach and no copy pasta
*/
function UserResource($ModelName, &$router){
    $Prefix = strtolower($ModelName);
    $ControllerName = $ModelName.'Controller';

    // Irregular spending
    $router->group(['prefix' => $Prefix], function() use ($router, $ControllerName){
        $router->post('', $ControllerName.'@post');
        $router->get('', $ControllerName.'@getAll');
        $router->put('', $ControllerName.'@put');
        $router->delete('', $ControllerName.'@delete');
        $router->get('{id}', $ControllerName.'@get');
    });
}


// Main api entry
$router->group(['prefix' => 'api'], function() use ($router){

    // Sub-Types of spending
    $router->group(['prefix' => 'user'], function() use ($router){
        $router->post('', 'UserController@post');
        $router->get('', 'UserController@getAll');
        $router->put('', 'UserController@put');
        $router->delete('{id}', 'UserController@delete');
        $router->get('{id}', 'UserController@get');
    });

    UserResource('Expense', $router);
    UserResource('Label', $router);
    UserResource('Vendor', $router);
});

