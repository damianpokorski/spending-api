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

    // Spending controllers
    $router->group(['prefix' => 'spending'], function() use ($router){

        // Irregular spending
        $router->group(['prefix' => 'irregular'], function() use ($router){
            $router->post('', 'SpendingIrregularController@post');
            $router->put('{id}', 'SpendingIrregularController@put');
            $router->delete('{id}', 'SpendingIrregularController@delete');
            $router->get('{id}', 'SpendingIrregularController@get');
        });

        // Regular spending
        $router->group(['prefix' => 'regular'], function() use ($router){
            $router->post('', 'SpendingRegularController@post');
            $router->put('{id}', 'SpendingRegularController@put');
            $router->delete('{id}', 'SpendingRegularController@delete');
            $router->get('{id}', 'SpendingRegularController@get');
        });
        
        // Sub-Types of spending
        $router->group(['prefix' => 'subtype'], function() use ($router){
            $router->post('', 'SpendingSubtypeController@post');
            $router->put('{id}', 'SpendingSubtypeController@put');
            $router->delete('{id}', 'SpendingSubtypeController@delete');
            $router->get('{id}', 'SpendingSubtypeController@get');
        });

        // Types of spending
        $router->group(['prefix' => 'type'], function() use ($router){
            $router->post('', 'SpendingTypeController@post');
            $router->put('{id}', 'SpendingTypeController@put');
            $router->delete('{id}', 'SpendingTypeController@delete');
            $router->get('{id}', 'SpendingTypeController@get');
        });
        
        // Vendors
        $router->group(['prefix' => 'vendor'], function() use ($router){
            $router->post('', 'SpendingVendorController@post');
            $router->put('{id}', 'SpendingVendorController@put');
            $router->delete('{id}', 'SpendingVendorController@delete');
            $router->get('{id}', 'SpendingVendorController@get');
        });
    });
});

