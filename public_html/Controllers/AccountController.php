<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;


class AccountController
{
   
    public function index()
    {
        $categoriesList = Common::categories();
        $social_networkList = Common::social_network();
        $languagesList = Common::languages();

        Helper::render(
            'Pages/Account/account',
            [
                'page_title' => 'Reglage profil',
                'page_subtitle' => 'Bienvenu sur la page de reglage de profil',
                'categoriesList' => $categoriesList,
                'social_networkList' => $social_networkList,
                'languagesList' => $languagesList
            ]
        );
    }
}
?>