<?php

namespace App;

class UserInfo
{
    public static function current()
    {
        if (isset($_SESSION['user_inf'])) {
            Database::query("SELECT * FROM users WHERE id = :id");
            Database::bind(':id', base64_decode($_SESSION['user_inf']));

            return Database::fetch();
        }
        return null;
    }

    public static function info($id)
    {
        Database::query("SELECT * FROM users WHERE id = :id");
        Database::bind(':id', $id);

        return Database::fetch();
    }
}
