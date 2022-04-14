<?php

namespace App;

use JetBrains\PhpStorm\NoReturn;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Class Helper
 * @package App
 */
class Helper
{   
    public static function render($view, $data = [])
    {
        $file = __DIR__. '/../Views/' . $view . '.php';
        if (is_readable($file)) require_once $file;
        else die('404 Page not found');
    }

	public static function redirect(string $url)
	{
		echo '<script> window.location.replace("'.$url.'"); </script>;';
	}
	
	public static function upload($file, $destination){
		$extre = explode('.',$file['name']);
        $fichier = round(microtime(true)).'.'.end($extre);
        if(move_uploaded_file($file['tmp_name'], __DIR__. '/../public/'.$destination . $fichier)){
            return $fichier;
        }
        else{
            return false;
        }
	}

	public static function trunc($phrase,$max){
        $phrase_array = explode(' ',$phrase);
        if(count($phrase_array) > $max && $max > 0){
            $phrase = implode(' ',array_slice($phrase_array, 0, $max)).'...';
        }
        return $phrase;
    }
}
