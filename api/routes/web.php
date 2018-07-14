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

// Main api entry
$router->group(['prefix' => 'api'], function() use ($router){

    // Irregular spending
    $router->group(['prefix' => 'expennse'], function() use ($router){
        $router->post('', 'ExpenseController@post');
        $router->put('{id}', 'ExpenseController@put');
        $router->delete('{id}', 'ExpenseController@delete');
        $router->get('{id}', 'ExpenseController@get');
    });

    // Regular spending
    $router->group(['prefix' => 'label'], function() use ($router){
        $router->post('', 'LabelController@post');
        $router->put('{id}', 'LabelController@put');
        $router->delete('{id}', 'LabelController@delete');
        $router->get('{id}', 'LabelController@get');
    });
    
    // Sub-Types of spending
    $router->group(['prefix' => 'user'], function() use ($router){
        $router->post('', 'UserController@post');
        $router->put('{id}', 'UserController@put');
        $router->delete('{id}', 'UserController@delete');
        $router->get('{id}', 'UserController@get');
    });

    // Types of spending
    $router->group(['prefix' => 'type'], function() use ($router){
        $router->post('', 'TypeController@post');
        $router->put('{id}', 'TypeController@put');
        $router->delete('{id}', 'TypeController@delete');
        $router->get('{id}', 'TypeController@get');
    });
    
    // Vendors
    $router->group(['prefix' => 'vendor'], function() use ($router){
        $router->post('', 'VendorController@post');
        $router->put('{id}', 'VendorController@put');
        $router->delete('{id}', 'VendorController@delete');
        $router->get('{id}', 'VendorController@get');
    });
});

