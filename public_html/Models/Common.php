<?php

namespace Models;

use App\Database;
use App\Helper;

class Common
{
    public static function categories()
    {
        Database::query("SELECT * FROM categories ORDER BY name ASC");
        return Database::fetchAll();
    }

    public static function social_network()
    {
        Database::query("SELECT * FROM social_network ORDER BY name ASC");
        return Database::fetchAll();
    }
}
