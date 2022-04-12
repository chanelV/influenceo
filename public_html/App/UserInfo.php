<?php

namespace App;
use Models\Users;


class UserInfo
{
    public static function current()
    {
        $user = Users::getUser(base64_decode($_SESSION['influenceo']['id']));
        $social_network = Users::social_network($_SESSION['influenceo']['id']);
        $language = Users::language($_SESSION['influenceo']['id']);
        $categories = Users::categories($_SESSION['influenceo']['id']);

       // var_dump($user);
      //  die();
      
        if (isset($_SESSION['influenceo'])) {
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
