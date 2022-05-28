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

//non authenticated
$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->get('venues', 'VenuesController@index');
    $router->get('table-types', 'TableTypesController@index');
    $router->get('game-types', 'GameTypesController@index');
    $router->get('rack-types', 'RackTypesController@index');
    $router->get('formats', 'FormatsController@index');
});

//authenticated
$router->group(['prefix' => 'api', 'middleware' => 'auth'], function () use ($router) {
    //venues crud
    $router->get('venues/{id}', 'VenuesController@show');
    $router->post('venues', 'VenuesController@store');
    $router->put('venues', 'VenuesController@update');
    $router->delete('venues/{id}', 'VenuesController@destroy');
    //table types crud
    $router->post('table-types', 'TableTypesController@store');
    $router->put('table-types', 'TableTypesController@update');
    $router->delete('table-types/{id}', 'TableTypesController@destroy');
    //game types crud
    $router->get('game-types', 'GameTypesController@index');
    $router->get('game-types/{id}', 'GameTypesController@show');
    $router->post('game-types', 'GameTypesController@store');
    $router->put('game-types', 'GameTypesController@update');
    $router->delete('game-types/{id}', 'GameTypesController@destroy');
    //rack types crud
    $router->post('rack-types', 'RackTypesController@store');
    $router->put('rack-types', 'RackTypesController@update');
    $router->delete('rack-types/{id}', 'RackTypesController@destroy');
    //formats crud
    $router->get('formats', 'FormatsController@index');
    $router->get('formats/{id}', 'FormatsController@show');
    $router->post('formats', 'FormatsController@store');
    $router->put('formats', 'FormatsController@update');
    $router->delete('formats/{id}', 'FormatsController@destroy');
    //matches crud
    $router->get('matches', 'MatchesController@index');
    $router->post('matches', 'MatchesController@store');
    $router->put('matches', 'MatchesController@update');
    $router->delete('matches/{id}', 'MatchesController@destroy');
    //user matches crud
    $router->get('user-matches', 'UserMatchesController@index');
    $router->post('user-matches', 'UserMatchesController@store');
    $router->put('user-matches', 'UserMatchesController@update');
    $router->delete('user-matches/{id}', 'UserMatchesController@destroy');

    //users
    $router->get('users', 'UserController@index');

    //new stuff
    $router->get('match-forms', 'MatchFormsAction');
});
