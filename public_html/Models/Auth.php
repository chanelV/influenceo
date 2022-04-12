<?php

namespace Models;

use App\Database;
use App\Helper;

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
        Database::query("SELECT * FROM users WHERE email = :email OR username = :username");
        Database::bind([':email'=> $email,':username'=> $username,]);

        if (!is_null(Database::fetch()) && password_verify($request->password, Database::fetch()['password'])) {
            $_SESSION['influenceo']['id'] = base64_encode(Database::fetch()['id']);
            $_SESSION['influenceo']['account'] = Database::fetch()['account_type'];
            return true;
        }
        return false;
    }

    public static function register($request)
    {

        $username=$request->username;
        $email=$request->email;
       
        Database::query("SELECT * FROM users WHERE email = :email");
        Database::bind(':email', $email);
        if (!is_null(Database::fetch()) && !is_null(Database::fetch()['id'])) {
            return "email_existed";
        }
        //var_dump($request);
        //die();

        Database::query("SELECT * FROM users WHERE username = :username");
        Database::bind(':username', $username);
        if (!is_null(Database::fetch()) && !is_null(Database::fetch()['id'])) {
            return "username_existed";
        }

        if($request->reason_social){
            Database::query("SELECT * FROM users WHERE reason_social = :reason_social");
            Database::bind(':reason_social', $request->reason_social);
            if (!is_null(Database::fetch()) && !is_null(Database::fetch()['id'])) {
                return "reason_social_existed";
            }
        }

        $user_type = filter_var($request->user_type, FILTER_VALIDATE_BOOLEAN);
        $data = [
            "username" => $request->username,
            "email" => $request->email,
            "firstname" => $request->firstname?$request->firstname:null,
            "lastname" => $request->lastname?$request->lastname:null,
            "reason_social" => $request->reason_social?$request->reason_social:null,
            "genre" => $request->genre?$request->genre:null,
            "user_type" => $user_type,
            "password" => password_hash($request->password, PASSWORD_DEFAULT),
            "picture" => "/public/files/pictures".($user_type ? "/users/default_user.png" : "/brand/default_brand.png" ),
            "address" => $request->address?$request->address:null,
            "code_postal" => $request->code_postal?$request->code_postal:null,
            "city" => $request->city?$request->city:null,
            "country" => $request->country?$request->country:null
        ];
       

        Database::query("INSERT INTO users (
            `username`, `email`, `firstname`, `lastname`, `reason_social`, `genre`, `user_type`, `password`, `picture`, `address`,
            `code_postal`, `city`, `country`, `create_date`, `update_date`
        ) VALUES (:username, :email, :firstname, :lastname, :reason_social, :genre,
                    :user_type, :password, :picture, :address, :code_postal,
                        :city, :country, NOW(), NOW())");
        Database::bind([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'], 
            ':reason_social' => $data['reason_social'],
            ':genre' => $data['genre'],
            ':user_type' => $data['user_type'],
            ':password' => $data['password'],
            ':picture' => $data['picture'],
            ':address' => $data['address'],
            ':code_postal' => $data['code_postal'],
            ':city' => $data['city'],
            ':country' => $data['country']
        ]);

        if (Database::execute()) return "created";
        return "failed";
    }

    public static function logout()
    {
        session_destroy();
        unset($_SESSION['influenceo']);
        return true;
    }
}
