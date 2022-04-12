<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;


class HomeController
{
   
    public function index()
    {

        Helper::render(
            'Pages/Home/home',
            [
                'page_title' => 'Accueil',
                'page_subtitle' => 'Bienvenu sur le premier réseau social des influenceurs'
            ]
        );
    }
}
?>