<?php

namespace Controllers;

use App\Event;
use App\Helper;
use Models\Common;
use Models\Posts;
use App\Middleware;

// Ici la function du controller profil
class PostController
{

    public function index(int $slug)
    {
        
        $post = Posts::getPost($slug);
        $categories = Posts::categories($post["id"]);
        $likes = Posts::likes($post["id"]);
        $comments = Posts::comments($post["id"]);
        $usersId = [];
        for ($i=0; $i < count($likes); $i++) { 
            $usersId[] = $likes[$i]["id_user"];
        }

        Helper::render(
            'Pages/Post/post', // page de Profil
            [
                'page_title' => "Page mission",
                'page_subtitle' => "Bienvenu sur la page mission",
                'post' => $post,
                'categories' => $categories,
                'likes' => $likes,
                'comments' => $comments,
                'usersId' => $usersId
            ]
        );
    }

    public function createPost()
    {
        $request = json_decode(json_encode($_POST));

        $create = Posts::create($request);
        
        $error = [
            "error_upload" => "Veuillez vérifier la taille de votre image qui doit être inférieure à 2 Mo",
            "failed" => "Erreur lors de l'enregistrement"
        ];

        $success = [
            "created" => "Mission publiée avec succès"
        ];
       
        unset($_POST);
        if(array_key_exists($create, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$create];
        }
        else if(array_key_exists($create, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$create];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }

    public function like(int $slug)
    {
        
        $likeAction = Posts::likeAction($slug);

        $likes = Posts::likes($slug);
        $error = [
            "failed" => "Erreur lors de la reqête"
        ];

        $success = [
            "liked" => '<i class="la la-heart text-danger"></i> '.count($likes),
            "disliked" => '<i class="la la-heart"></i> '.count($likes)
        ];   
        
        if(array_key_exists($likeAction, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$likeAction];
        }
        else if(array_key_exists($likeAction, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$likeAction];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }

    public function comments()
    {
        $request = json_decode(json_encode($_POST));
        
        $create = Posts::addComments($request);

        $error = [
            "failed" => "Erreur lors de la reqête"
        ];

        $success = [
            "created" => 'Commentaire ajouté avec succès'
        ];   
        
        if(array_key_exists($create, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$create];
        }
        else if(array_key_exists($create, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$create];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }


    public function deletePost(int $slug)
    {
        
        $del = Posts::delete($slug);
        $error = [
            "failed" => "Erreur lors de la reqête"
        ];

        $success = [
            "deleted" => 'deleted'
        ];   
        
        if(array_key_exists($del, $error)){
            $_SESSION['response']["status"] = 403;
            $_SESSION['response']["class"] = "alert alert-danger";
            $_SESSION['response']["message"] = $error[$del];
        }
        else if(array_key_exists($del, $success)){
            $_SESSION['response']["status"] = 200;
            $_SESSION['response']["class"] = "alert alert-success";
            $_SESSION['response']["message"] = $success[$del];
        }
        else {
            $_SESSION['response']["status"] = 500;
            $_SESSION['response']["class"] = "alert alert-warning";
            $_SESSION['response']["message"] = 'Echec de la requête';
        }
        echo json_encode($_SESSION['response']);
    }
   
}
?>