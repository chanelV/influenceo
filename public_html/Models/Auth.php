<?php

namespace Models;

use App\Database;

/**
 * Class Auth
 * @package Models
 */
class Auth
{

    public static function login($request)
    {
        $username=$request->username;
        $email=$request->username;
        Database::query("SELECT * FROM users WHERE email = :email OR userName = :username");
        Database::bind([':email'=> $email,':username'=> $username,]);

        if (!is_null(Database::fetch()) && password_verify($request->password, Database::fetch()['password'])) {
            $_SESSION['user_inf'] = base64_encode(Database::fetch()['id']);
            return true;
        }
        return false;
    }

    public static function register($request)
    {
        Database::query("INSERT INTO users (
            `email`,
            `password`,
            `isAdmin`,
            `compte`,
            `avatar`,
            `createdBy`,
            `createdAt`
        ) VALUES (:email, :password, :isAdmin, :compte, :avatar, :createdBy, NOW()");
        Database::bind([
            ':email' => $request->email,
            ':password' => password_hash($request->password, PASSWORD_DEFAULT),
            ':isAdmin' => intval($request->isAdmin),
            ':compte' => intval($request->compte),
            ':avatar' => $request->avatar,
            ':createdBy' => intval($request->createdBy),
        ]);

        if (Database::execute()) return true;
        return false;
    }

    public static function existed($user)
    {
        $username=$user;
        $email=$user;
        Database::query("SELECT * FROM users WHERE email = :email OR userName = :username");
        Database::bind([':email'=> $email,':username'=> $username,]);

        if (!is_null(Database::fetch()) && !is_null(Database::fetch()['id'])) return true;
        return false;
    }

    public static function logout()
    {
        session_destroy();
        unset($_SESSION['userhetic']);
        return true;
    }
}
