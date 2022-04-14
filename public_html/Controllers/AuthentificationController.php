<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;
use Models\Auth;
use App\Middleware;


class AuthentificationController
{

    public function index()
    {

        Helper::render(
            'Pages/Authentification/authentification', // page d'authentification
            [
                'page_title' => "s'identifier",
                'page_subtitle' => "Bienvenu sur ma page d'authetification"
            ]
        );
    }
    
    public function formLogin()
    {
        $request = json_decode(json_encode($_POST));
        $login = Auth::login($request);
        unset($_POST);
        if(!$login){
            $_SESSION['response']["status"] = 409;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = 'Identifiant ou mot de passe incorrect';
        } 
        else {
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = 'Connexion réussie';
        }
        
        echo json_encode($_SESSION['response']);
    }

    public function formRegister()
    {
        $request = json_decode(json_encode($_POST));
        
        if($request->password != $register->confirm_password){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = "Les mots de passe ne sont pas identiques";
        }

        $register = Auth::register($request);
        
        $error = [
            "email_existed" => "Cet email est déjà utilisé",
            "username_existed" => "Cet pseudo et déjà utilisé",
            "reason_social_existed" => "le compte de cette marque existe déjà",
            "failed" => "Erreur lors de l'enregistrement"
        ];

        $success = [
            "created" => "Compte créé avec succès"
        ];
       
        unset($_POST);
        if(array_key_exists($register, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$register];
        }
        else if(array_key_exists($register, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$register];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }


    public function logout()
    {
        if (Auth::logout()) {
            Helper::redirect("/");
        } else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = 'Echec de déconnexion !';
        }

        Helper::redirect("/home");
    }
}
?>