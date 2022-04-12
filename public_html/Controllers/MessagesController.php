<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;


class MessagesController
{
   
    public function index()
    {

        Helper::render(
            'Pages/Message/messages',
            [
                'page_title' => 'Messages',
                'page_subtitle' => "Bienvenu sur notre pages d'échanges entre influenceurs et marque"
            ]
        );
    }
}
?>