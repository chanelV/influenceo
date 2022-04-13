<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;
use Models\Users;
use App\Middleware;

// Ici la function du controller profil
class ProfilController
{

    public function index()
    {
        $type = $_SESSION['influenceo']['account'];

        Helper::render(
            'Pages/Profile/profile', // page de Profil
            [
                'page_title' => "Page Profil",
                'page_subtitle' => "Bienvenu sur la page Profil"
            ]
        );
    }

    public function see_profile(int $slug)
    {
        $type = $_SESSION['influenceo']['account'];
        $user = Users::getUser($slug);
        $social_network = Users::social_network($slug);
        $language = Users::language($slug);
        $categories = Users::categories($slug);

        $entity = [
            'info' => $user,
            'social_network' => $social_network,
            'language' => $language,
            'categories' => $categories
        ];


        Helper::render(
            'Pages/Profile/profile-user', // page de Profil
            [
                'page_title' => "Page Profil",
                'page_subtitle' => "Bienvenu sur la page Profil",
                "entity" => $entity
            ]
        );
    }

    // Ici la function de la liste de profil soit marques soit controlleurs 
    public function listProfile()
    {

        $type = $_SESSION['influenceo']['account'];
        $list = $type ? Users::getBrands(): Users::getInfluencors();

        Helper::render(
            'Pages/Profile/listProfile', // page liste profil marques / controlleurs
            [
                'page_title' => "Page Liste Profil",
                'page_subtitle' => $type ? "Liste des marques":"Liste des influenceurs",
                "list" => $list            
            ]
        );
    }

    public function updateInfo()
    {
        $request = json_decode(json_encode($_POST));

        $update = Users::update($request);
        
        $error = [
            "email_existed" => "Cet email est déjà utilisé",
            "username_existed" => "Cet pseudo et déjà utilisé",
            "reason_social_existed" => "le compte de cette marque existe déjà",
            "failed" => "Erreur lors de l'enregistrement"
        ];

        $success = [
            "updated" => "information modifiée avec succès"
        ];
       
        unset($_POST);
        if(array_key_exists($update, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$update];
        }
        else if(array_key_exists($update, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$update];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }


    public function updateCategories()
    {
        $request = json_decode(json_encode($_POST));

        $update = Users::addCategories($request);
        
        $error = [
            "failed" => "Erreur lors de l'enregistrement"
        ];

        $success = [
            "updated" => "information modifiée avec succès"
        ];
       
        unset($_POST);
        if(array_key_exists($update, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$update];
        }
        else if(array_key_exists($update, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$update];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }

    public function updateSocialsNetworks()
    {
        $request = json_decode(json_encode($_POST));

        $update = Users::addSocialNetworks($request);
        
        $error = [
            "failed" => "Erreur lors de l'enregistrement"
        ];

        $success = [
            "updated" => "information modifiée avec succès"
        ];
       
        unset($_POST);
        if(array_key_exists($update, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$update];
        }
        else if(array_key_exists($update, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$update];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }

    public function updateLanguages()
    {
        $request = json_decode(json_encode($_POST));

        $update = Users::addLanguage($request);
        
        $error = [
            "failed" => "Erreur lors de l'enregistrement"
        ];

        $success = [
            "updated" => "information modifiée avec succès"
        ];
       
        unset($_POST);
        if(array_key_exists($update, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$update];
        }
        else if(array_key_exists($update, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$update];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }

    public function updatePassword()
    {
        $request = json_decode(json_encode($_POST));

        $update = Users::updatePassword($request);
        
        $error = [
            "failed" => "Erreur lors de l'enregistrement",
            "incorrect_password" => "Ancien mot de passe incorrect",
        ];

        $success = [
            "updated" => "information modifiée avec succès"
        ];
       
        unset($_POST);
        if(array_key_exists($update, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$update];
        }
        else if(array_key_exists($update, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$update];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }
    
   
}
?>