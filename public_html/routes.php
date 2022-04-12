<?php

use App\Router;

/**
 * Web routes
 */

 //View routes
Router::get('/home', 'HomeController@index'); // Page d'accueil 
Router::get('/', 'AuthentificationController@index'); // formulaire Inscription connexion 
Router::get('/profile-account-setting', 'AccountController@index'); // page reglage et de modification profil 
Router::get('/profile', 'ProfilController@index'); // Route de la page  profil 
Router::get('/profile-list', 'ProfilController@listProfile'); // Route de la page  List de profil soit marques soit influenceurs
Router::get('/messages', 'MessagesController@index'); // Route de la page de la discussion soit marques soit influenceurs



//Actions routes
Router::post('/login', 'AuthentificationController@formLogin');
Router::post('/register', 'AuthentificationController@formRegister');
Router::get('/logout', 'AuthentificationController@logout');


Router::error(function () {
    die('404 Page not found');
});

Router::dispatch();
