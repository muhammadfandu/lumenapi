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

$router->get('/key', 'KeyController@generateKey');

$router->post('/foo', 'KeyController@fooExample');

$router->get('/user/{id}', 'KeyController@getUser');
$router->get('/post/cat1/{cat1}/cat2/{cat2}', 'KeyController@getPost');

$router->get('profile', ['as' => 'profile', 'uses' => 'KeyController@getProfile']);
$router->get('/profile/action', ['as' => 'profile.action', 'uses' =>'KeyController@getProfileAction']);

$router->group(['prefix' => 'admin', 'middleware' => 'auth', 'namespace' => ''], function() use ($router) {
    $router->get('home', function(){
        return 'Home Admin';
    });
    $router->get('profile', function(){
        return 'Profile Admin';
    });
});

$router->get('/admin/home', ['middleware' => 'age', function(){
    return 'Old Enough';
}]);

$router->get('/fail', function(){
    return "Not mature yet";
});