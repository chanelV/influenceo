<?php

namespace Models;

use App\Database;
use App\Helper;

class Users
{
    public static function getUsers()
    {
        Database::query("SELECT * FROM users  ORDER BY lastname, reason_social ASC");
        return Database::fetchAll();
    }

    public static function getInfluencors()
    {
        Database::query("SELECT * FROM users WHERE user_type=1 ORDER BY lastname ASC");
        return Database::fetchAll();
    }

    public static function getBrands()
    {
        Database::query("SELECT * FROM users WHERE user_type=0 ORDER BY reason_social ASC");
        return Database::fetchAll();
    }


    public static function getUser($id)
    {
        Database::query("SELECT * FROM users WHERE id = :id");
        Database::bind(':id', intval($id));

        return Database::fetch();
    }

    public static function social_network($id)
    {
        Database::query("SELECT us.id, us.id_user, us.id_social, s.name FROM user_social_network us  
            INNER JOIN social_network s ON s.id = us.id_social
            WHERE us.id_user = :id_user");
        Database::bind(':id_user', intval($id));
        return Database::fetchAll();
    }

    public static function addSocialNetworks($request)
    {
        Database::query("DELETE FROM user_social_network WHERE id_user = :id_user");
        Database::bind(':id_user', intval($request->id_user));

        if (Database::execute()){
            if(is_array($request->id_social)){
                for ($i=0; $i < count($request->id_social) ; $i++) { 
                    Database::query("INSERT INTO user_social_network (`id_user`, `id_social`) VALUES (:id_user, :id_social)");
                    Database::bind([
                        ':id_user' => intval($request->id_user),
                        ':id_social' => intval($request->id_social[$i])
                    ]);
                    Database::execute();  
                }
                return "updated";
            } else {
                Database::query("INSERT INTO user_social_network (`id_user`, `id_social`) VALUES (:id_user, :id_social)");
                Database::bind([
                    ':id_user' => intval($request->id_user),
                    ':id_social' => intval($request->id_social)
                ]);
        
                if (Database::execute()) return "updated";
            }
           
        } 
        return "failed"; 
    }

    public static function language($id)
    {
        Database::query("SELECT ul.id, ul.id_user, ul.id_lang, l.name FROM user_lang ul  
            INNER JOIN languages l ON l.id = ul.id_lang
            WHERE ul.id_user = :id_user");
        Database::bind(':id_user', intval($id));
        return Database::fetchAll();
    }

    public static function addLanguage($request)
    {
        Database::query("DELETE FROM user_lang WHERE id_user = :id_user");
        Database::bind(':id_user', intval($request->id_user));

        if (Database::execute()){
            if(is_array($request->id_lang)){
                for ($i=0; $i < count($request->id_lang) ; $i++) { 
                    Database::query("INSERT INTO user_lang (`id_user`, `id_lang`) VALUES (:id_user, :id_lang)");
                    Database::bind([
                        ':id_user' => intval($request->id_user),
                        ':id_lang' => $request->id_lang[$i]
                    ]);
                    Database::execute();  
                }
                return "updated";
            } else {
                Database::query("INSERT INTO user_lang (`id_user`, `id_lang`) VALUES (:id_user, :id_lang)");
                Database::bind([
                    ':id_user' => intval($request->id_user),
                    ':id_lang' => $request->id_lang
                ]);
        
                if (Database::execute()) return "updated";
            }
           
        } 
        return "failed"; 
    }


    public static function categories($id)
    {
        Database::query("SELECT uc.id, uc.id_user, uc.id_cat, c.name FROM user_categories uc  
            INNER JOIN categories c ON c.id = uc.id_cat
            WHERE uc.id_user = :id_user");
        Database::bind(':id_user', intval($id));
        return Database::fetchAll();
    }

    public static function addCategories($request)
    {
        Database::query("DELETE FROM user_categories WHERE id_user = :id_user");
        Database::bind(':id_user', intval($request->id_user));

        if (Database::execute()){
            if(is_array($request->id_cat)){
                for ($i=0; $i < count($request->id_cat) ; $i++) { 
                    Database::query("INSERT INTO user_categories (`id_user`, `id_cat`) VALUES (:id_user, :id_cat)");
                    Database::bind([
                        ':id_user' => intval($request->id_user),
                        ':id_cat' => intval($request->id_cat[$i])
                    ]);
                    Database::execute();  
                }
                return "updated";
            } else {
                Database::query("INSERT INTO user_categories (`id_user`, `id_cat`) VALUES (:id_user, :id_cat)");
                Database::bind([
                    ':id_user' => intval($request->id_user),
                    ':id_cat' => intval($request->id_cat)
                ]);
        
                if (Database::execute()) return "updated";
            }
           
        } 
        return "failed"; 
    }


    public static function update($request)
    {
        if($request->email){
            Database::query("SELECT * FROM users WHERE email = :email AND id != :id");
            Database::bind([':email' => $request->email, ':id'=> intval($request->id)]);
            if (!is_null(Database::fetch()) && !is_null(Database::fetch()['id'])) {
                return "email_existed";
            }
        }

        if($request->username){
            Database::query("SELECT * FROM users WHERE username = :username AND id != :id");
            Database::bind([':username' => $request->username, ':id'=>intval($request->id)]);
            if (!is_null(Database::fetch()) && !is_null(Database::fetch()['id'])) {
                return "username_existed";
            }
        }

        if($request->reason_social){
            Database::query("SELECT * FROM users WHERE reason_social = :reason_social AND id != :id");
            Database::bind([':reason_social' => $request->reason_social, ':id'=>intval($request->id)]);
            if (!is_null(Database::fetch()) && !is_null(Database::fetch()['id'])) {
                return "reason_social_existed";
            }
        }


        //$picture = "/public/files/pictures".(base64_decode($_SESSION['account_type']) ? "/users/default_user.png" : "/users/default_brand.png" );
        //$dir = "/public/files/pictures/".(base64_decode($_SESSION['account_type']) ? "users/" : "brand/" );

        $data = [
            "username" => $request->username,
            "email" => $request->email,
            "firstname" => $request->firstname?$request->firstname:null,
            "lastname" => $request->lastname?$request->lastname:null,
            "reason_social" => $request->reason_social?$request->reason_social:null,
            "address" => $request->address?$request->address:null,
            "code_postal" => $request->code_postal?$request->code_postal:null,
            "city" => $request->city?$request->city:null,
            "country" => $request->country?$request->country:null
        ];

        Database::query("UPDATE users SET 
            username = :username, email = :email, firstname = :firstname, lastname = :lastname, 
            reason_social = :reason_social, address = :address, code_postal = :code_postal, 
            city = :city, country = :country, update_date = NOW() WHERE id = :id");
        Database::bind([
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'], 
            ':reason_social' => $data['reason_social'],
            ':address' => $data['address'],
            ':code_postal' => $data['code_postal'],
            ':city' => $data['city'],
            ':country' => $data['country'],
            ':id' => intval($request->id)
        ]);

        if (Database::execute()) {
            $_SESSION["active_account"] = true;
            return "updated";
        }
        return "failed";
    }

    public static function updatePassword($request)
    {
        Database::query("SELECT * FROM users WHERE id = :id");
        Database::bind(':id', $request->id);
        if (!is_null(Database::fetch()) && password_verify($request->old_password, Database::fetch()['password'])) {
            Database::query("UPDATE users SET 
                password = :password  
                WHERE id = :id"
            );
            Database::bind([
                ':password' => password_hash($request->password, PASSWORD_DEFAULT),
                ':id' => intval($request->id),
            ]);

            if (Database::execute()) return "updated";
            return "failed"; 
        } else {
            return "incorrect_password";
        }

        
    }

}
