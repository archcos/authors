<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/author','AuthorController@index');  //this route will show all data about author site
$router->post('/author','AuthorController@add'); //this route will add data to author site
$router->get('/author/{id}','AuthorController@show'); //this route will show a specific data about author site
$router->put('/author/{id}','AuthorController@update');  //this route will update data in author site
$router->delete('/author/{id}','AuthorController@delete'); //this route will delete data in author site