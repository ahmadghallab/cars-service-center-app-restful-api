<?php

$router->group(['prefix' => 'api/v1'], function() use ($router) {
    // User Routes
    $router->post('user/register', 'AuthController@store');
    $router->post('user/signin', 'AuthController@signin');
    $router->get('user/{id}', 'AuthController@show');
    $router->patch('user/{id}', 'AuthController@update');

    // Make Routes
    $router->get('makes', 'MakeController@index');
    $router->post('makes', 'MakeController@store');
    $router->get('makes/{id}', 'MakeController@show');
    $router->get('makes/{id}/models', 'MakeController@getModelsByMake');
    $router->patch('makes/{id}', 'MakeController@update');
    $router->delete('makes/{id}', 'MakeController@destroy');
    
    // Make Model Routes
    $router->get('models', 'MakeModelController@index');
    $router->post('models', 'MakeModelController@store');
    $router->get('models/{id}', 'MakeModelController@show');
    $router->patch('models/{id}', 'MakeModelController@update');
    $router->delete('models/{id}', 'MakeModelController@destroy');

    // Customer Routes
    $router->get('customers', 'CustomerController@index');
    $router->post('customers', 'CustomerController@store');
    $router->get('customers/{id}', 'CustomerController@show');
    $router->patch('customers/{id}', 'CustomerController@update');
    $router->delete('customers/{id}', 'CustomerController@destroy');

    // Vehicle Routes
    $router->get('vehicles', 'VehicleController@index');
    $router->post('vehicles', 'VehicleController@store');
    $router->get('vehicles/{id}', 'VehicleController@show');
    $router->patch('vehicles/{id}', 'VehicleController@update');
    $router->delete('vehicles/{id}', 'VehicleController@destroy');
});
