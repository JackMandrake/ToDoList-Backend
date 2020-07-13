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

// HOME

$router->get(
    '/',
    [
        // NomDuControleur@NomDeLaMéthode
        'uses' => 'MainController@home',
        // nom-de-la-route
        'as'   => 'main-home'
    ]
);

// LECTURE DES CATEGORIES

$router->get(
    '/categories',
    [
        // NomDuControleur@NomDeLaMéthode
        'uses' => 'CategoryController@list',
        // nom-de-la-route
        'as'   => 'category-list'
    ]
);

$router->get(
    '/categories/{id}',
    [
        'uses' => 'CategoryController@item',
        'as'   => 'category-item'
    ]
);

// LECTURE DES TASKS

$router->get(
    '/tasks',
    [
        // NomDuControleur@NomDeLaMéthode
        'uses' => 'TaskController@list',
        // nom-de-la-route
        'as'   => 'task-list'
    ]
);

$router->get(
    '/tasks/{id}',
    [
        'uses' => 'TaskController@item',
        'as'   => 'task-item'
    ]
);

// CREATION DES TASKS

$router->post(
    '/tasks',
    [
        'uses' => 'TaskController@add',
        'as'   => 'task-add'
    ]
);

$router->put(
    '/tasks/{id}',
    [
        // NomDuControleur@NomDeLaMéthode
        'uses' => 'TaskController@update',
        // nom-de-la-route
        'as'   => 'task-update'
    ]
);

$router->patch(
    '/tasks/{id}',
    [
        // NomDuControleur@NomDeLaMéthode
        'uses' => 'TaskController@update',
        // nom-de-la-route
        'as'   => 'task-patch'
    ]
);
