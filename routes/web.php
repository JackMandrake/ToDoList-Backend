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

$router->get(
    '/',
    [
        // NomDuControleur@NomDeLaMéthode
        'uses' => 'MainController@home',
        // nom-de-la-route
        'as'   => 'main-home'
    ]
);

$router->get(
    '/categories',
    [
        // NomDuControleur@NomDeLaMéthode
        'uses' => 'CategoryController@list',
        // nom-de-la-route
        'as'   => 'category-list'
    ]
);

