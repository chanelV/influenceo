<?php

namespace App;
use Models\Users;


class UserInfo
{
    public static function current()
    {
      
        if (isset($_SESSION['influenceo'])) {
            $user = Users::getUser(base64_decode($_SESSION['influenceo']['id']));
            $social_network = Users::social_network(base64_decode($_SESSION['influenceo']['id']));
            $language = Users::language(base64_decode($_SESSION['influenceo']['id']));
            $categories = Users::categories(base64_decode($_SESSION['influenceo']['id']));

            // var_dump($user);
            //  die();
           return [
               'info' => $user,
               'social_network' => $social_network,
               'language' => $language,
               'categories' => $categories
           ];
           
        }
        return null;
    }
}
