<?php

use App\Router;

/**
 * Web routes
 */

 //View routes
Router::get('/', 'HomeController@index');
Router::get('/home', 'HomeController@index');
Router::get('/signin', 'AuthentificationController@signin');
Router::get('/signup', 'AuthentificationController@signup');

//Actions routes
Router::post('/login', 'AuthentificationController@formLogin');
Router::post('/register', 'AuthentificationController@formRegister');
Router::get('/logout', 'AuthentificationController@logout');


Router::error(function () {
    die('404 Page not found');
});

Router::dispatch();
