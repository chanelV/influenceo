<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;
use Models\Auth;
use App\Middleware;

// Ici la function du controller profil
class ProfilController
{

    public function index()
    {

        Helper::render(
            'Pages/Profile/profile', // page de Profil
            [
                'page_title' => "Page Profil",
                'page_subtitle' => "Bienvenu sur la page Profil"
            ]
        );
    }

    // Ici la function de la liste de profil soit marques soit controlleurs 
    public function listProfile()
    {

        Helper::render(
            'Pages/Profile/listProfile', // page liste profil marques / controlleurs
            [
                'page_title' => "Page Liste Profil",
                'page_subtitle' => "Bienvenu sur la liste des  Profils "
            ]
        );
    }
    
   
}
?>