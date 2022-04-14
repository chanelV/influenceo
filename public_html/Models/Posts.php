<?php

namespace Models;

use App\Database;
use App\Helper;

class Posts
{
    public static function getPosts()
    {
        Database::query("SELECT m.id, m.title, m.create_date, m.update_date, m.start_date, m.end_date, m.description, m.background, m.id_user, 
        u.username, u.email, u.reason_social, u.picture, u.code_postal, u.address, u.city, u.country
        FROM missions m 
        INNER JOIN users u ON u.id = m.id_user
        ORDER BY m.create_date DESC");
        return Database::fetchAll();
    }

    public static function getPostsUser($id_user)
    {
        Database::query("SELECT m.id, m.title, m.create_date, m.update_date, m.start_date, m.end_date, m.description, m.background, m.id_user, 
        u.username, u.email, u.reason_social, u.picture, u.code_postal, u.address, u.city, u.country
        FROM missions m 
        INNER JOIN users u ON u.id = m.id_user 
        WHERE m.id_user = :id_user 
        ORDER BY m.create_date DESC");
        Database::bind(':id_user', intval($id_user));
        return Database::fetchAll();
    }

    public static function getLikesUser($id_user)
    {
        Database::query("SELECT * FROM likes l
        INNER JOIN missions m ON m.id = l.id_mission
        WHERE m.id_user = :id_user");
        Database::bind(':id_user', intval($id_user));
        return Database::fetchAll();
    }

    public static function getPost($id)
    {
        Database::query("SELECT m.id, m.title, m.create_date, m.update_date, m.start_date, m.end_date, m.description, m.background, m.id_user, 
        u.username, u.email, u.reason_social, u.picture, u.code_postal, u.address, u.city, u.country
        FROM missions m 
        INNER JOIN users u ON u.id = m.id_user
        WHERE m.id = :id");
        Database::bind(':id', intval($id));

        return Database::fetch();
    }

    public static function categories($id)
    {
        Database::query("SELECT mc.id, mc.id_mission, mc.id_cat, c.name FROM mission_categories mc  
            INNER JOIN categories c ON c.id = mc.id_cat
            WHERE mc.id_mission = :id_mission");
        Database::bind(':id_mission', intval($id));
        return Database::fetchAll();
    }

    public static function likes($id)
    {
        Database::query("SELECT * FROM likes WHERE id_mission = :id_mission");
        Database::bind(':id_mission', intval($id));
        return Database::fetchAll();
    }

    public static function likeAction($id_mission)
    {
        $id_user = base64_decode($_SESSION['influenceo']['id']);
        
        Database::query("SELECT * FROM likes WHERE id_mission = :id_mission AND id_user = :id_user");
        Database::bind([':id_mission' => intval($id_mission), ':id_user' => intval($id_user)]);
        
        if (!Database::fetch()) {
            Database::query("INSERT INTO likes(`id_user`, `id_mission`) VALUES (:id_user, :id_mission)");
            Database::bind([
                ':id_user' => intval($id_user),
                ':id_mission' => intval($id_mission)
            ]);
    
            if (Database::execute()) return "liked";
        } else {
            Database::query("DELETE FROM likes WHERE id_mission = :id_mission AND id_user = :id_user");
            Database::bind([':id_mission' => intval($id_mission), ':id_user' => intval($id_user)]);
            if (Database::execute()) return "disliked";
        }
        return "failed";
    }

    public static function addComments($request)
    {  
        Database::query("INSERT INTO comments(`content`, `id_user`, `id_mission`, `create_date`) VALUES (:content, :id_user, :id_mission, NOW())");
        Database::bind([
            ':content' => $request->content,
            ':id_user' => intval($request->id_user),
            ':id_mission' => intval($request->id_mission)
        ]);
    
        if (Database::execute()) return "created";
        return "failed";
    }

    public static function comments($id)
    {
        Database::query("SELECT co.id, co.content, co.create_date, co.id_user, co.id_mission, 
            u.username, u.firstname, u.lastname, u.email, u.reason_social, u.picture, u.code_postal, u.address, u.city, u.country
            FROM comments co  
            INNER JOIN users u ON u.id = co.id_user
            WHERE co.id_mission = :id_mission
            ORDER BY co.id ASC");
        Database::bind(':id_mission', intval($id));
        return Database::fetchAll();
    }

    public static function create($request)
    {

        $background = null;
        if(isset($_FILES["background"]) && $_FILES["background"]["name"]){
            $background = Helper::upload($_FILES["background"], 'files/missions/');
            if(!$background){
                return "error_upload";
            } else {
                $background = "/public/files/missions/".$background;
            }
        }
        $data = [
            "title" => $request->title,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "description" => $request->description?$request->description:null,
            "id_user" => intval($request->id_user),
            "background" => $background
        ];
       

        Database::query("INSERT INTO missions (`title`, `start_date`, `end_date`, `description`, `id_user`, `background`, `create_date`, `update_date`) 
            VALUES (:title, :start_date, :end_date, :description, :id_user, :background, NOW(), NOW())");
        Database::bind([
            ':title' => $data['title'],
            ':start_date' => $data['start_date'],
            ':end_date' => $data['end_date'],
            ':description' => $data['description'], 
            ':id_user' => $data['id_user'],
            ':background' => $data['background']
        ]);

        if (Database::execute()) {

            Database::query("SELECT * FROM missions ORDER BY id DESC");
            $mission = Database::fetch();
    
            if ($mission){
                 if(is_array($request->id_cat)){
                    for ($i=0; $i < count($request->id_cat) ; $i++) { 
                        Database::query("INSERT INTO mission_categories (`id_mission`, `id_cat`) VALUES (:id_mission, :id_cat)");
                        Database::bind([
                            ':id_mission' => intval($mission['id']),
                            ':id_cat' => intval($request->id_cat[$i])
                        ]);
                        Database::execute();  
                    }
                    return "created";
                } else if($request->id_cat) {
                    Database::query("INSERT INTO mission_categories (`id_mission`, `id_cat`) VALUES (:id_mission, :id_cat)");
                    Database::bind([
                        ':id_mission' => intval($mission['id']),
                        ':id_cat' => intval($request->id_cat)
                    ]);
            
                    if (Database::execute()) return "created";
                }
                return "created";
            } 
            return "failed"; 
        }
        return "failed";
    }

    public static function delete($id){
        Database::query("DELETE FROM mission_categories WHERE id_mission = :id_mission");
        Database::bind(':id_mission', intval($id));

        if (Database::execute()){
            Database::query("DELETE FROM missions WHERE id = :id");
            Database::bind(':id', intval($id));
            if (Database::execute()) return "deleted";
        }
        return "failed";
    }

}
