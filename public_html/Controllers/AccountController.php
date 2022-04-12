<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;


class AccountController
{
   
    public function index()
    {

        Helper::render(
            'Pages/Account/account',
            [
                'page_title' => 'Reglage profil',
                'page_subtitle' => 'Bienvenu sur la page de reglage de profil'
            ]
        );
    }
}
?>