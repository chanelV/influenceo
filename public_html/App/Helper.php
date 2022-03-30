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

    public static function echappe($string)
	{
		return str_replace("'","''",$string);
	}

	public static function text($string) {
		$searched = array('&lt;','&gt;');
		$replaced = array('<','>');

		$string = htmlspecialchars($string, ENT_QUOTES, "UTF-8");
		$string = str_replace($searched,$replaced,$string);

		return $string;
	}
	
	public static function uploadFile($file,$destination){
		$extre = explode('.',$file['name']);
        $fichier = round(microtime(true)).'.'.end($extre);
        if(move_uploaded_file($file['tmp_name'], __DIR__. '/../pubblic/'.$destination . $fichier)){
            return $fichier;
        }
        else{
            return false;
        }
		
	}
	
	
	public static function sizeImage($file,$t){
		$taille = $file['size'];
		$autorise = 1024*$t;
		if($taille<=$autorise){
			return true;
		}
		else{
			return false;
		}
	}

	public static function forUrl($string) {
		$string = str_replace('é','e',$string);
		$string = str_replace('?','e',$string);
		$string = $this->noAccent($string);
		$string = strtolower($string);
		$string = str_replace(' ','-',$string);
		$string = str_replace(',','-',$string);
		$string = str_replace("'",'-',$string);
		$string = str_replace('--','-',$string);
		$string = str_replace('_','-',$string);
											
		return $string;
	}

	public static function noAccent($string){
		$string = utf8_decode($string);
		$string =  strtr($string,'àáâãäçèéêëìíîïñòóôõöùúûüýÿÀÁÂÃÄÇÈÉÊËÌÍÎÏÑÒÓÔÕÖÙÚÛÜÝ?',
	'aaaaaceeeeiiiinooooouuuuyyAAAAACEEEEIIIINOOOOOUUUUYe');

		$string = str_replace('?','e',$string);

		return $string;
	}

	public static function verifMail($email) {
		return filter_var($email, FILTER_VALIDATE_EMAIL);
	}

	public static function verifDate($dateDMY) {
		return preg_match("^\d{1,2}/\d{2}/\d{4}^",$dateDMY);
	}

	public static function envoiMail($exp, $destinataire,$sujet,$contenu,$replyto = NULL) {

		if(is_null($replyto)) $replyto = $exp;

		$from  = "From:".$exp."\n";
		$from .= "MIME-version: 1.0\n";
		$from .= "Content-type: text/html; charset= utf-8\n";
		$from .= "Reply-To: $replyto\n";
		$message = '';
		$message .= stripslashes($contenu);
		$envoi = mail($destinataire,$sujet,$contenu,$from);
		return $envoi;
	}

	public static function dateFR2EN($dateFr) {
		$tabDate = explode('/',$dateFr);

		return $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
	}

	public static function dateEN2FR($dateEN) {
		$tabDate = explode('-',$dateEN);

		return $tabDate[2].'/'.$tabDate[1].'/'.$tabDate[0];
	}

	public static function dateTimeEN2FR($dateEN) {
		$tabDateEN = explode(' ',$dateEN);
		$tabDate = explode('-',$tabDateEN[0]);

		return $tabDate[2].'/'.$tabDate[1].'/'.$tabDate[0];
	}


	public static function formatTimestampToDate($timestamp) {
		if(!is_int($timestamp)) return $timestamp;

		return date('Y-m-d H:i:s',$timestamp);
	}
	
		
		//Genere un mot de passe automatiquement
    public static function uniqidReal($lenght = 10) {
    
        if (function_exists("random_bytes")) {
            $bytes = random_bytes(ceil($lenght / 2));
        } elseif (function_exists("openssl_random_pseudo_bytes")) {
            $bytes = openssl_random_pseudo_bytes(ceil($lenght / 2));
        } else {
            throw new Exception("no cryptographically secure random function available");
        }
        return substr(bin2hex($bytes), 0, $lenght);
    }
	
    public static function trunc($phrase,$max){
        $phrase_array = explode(' ',$phrase);
        if(count($phrase_array) > $max && $max > 0){
            $phrase = implode(' ',array_slice($phrase_array, 0, $max)).'...';
        }
        return $phrase;
    }
	
	public static function affDateTimeFrAffich($date){
	
		$tab =explode('-', $date);
		
		$year = $tab[0];
		$month = $tab[1];
		$dayHour = $tab[2];
		$tabDayHour=explode(' ', $dayHour);
		
		$day = "le ".$tabDayHour[0];
		$hour = $tabDayHour[1];
		 
		$str = $day." ";
		if($month == 1) $str .= "Janvier";
		if($month == 2) $str .= "Février";
		if($month == 3) $str .= "Mars";
		if($month == 4) $str .= "Avril";
		if($month == 5) $str .= "Mai";
		if($month == 6) $str .= "Juin";
		if($month == 7) $str .= "Juillet";
		if($month == 8) $str .= "Août";
		if($month == 9) $str .= "Septembre";
		if($month == 10) $str .= "Octobre";
		if($month == 11) $str .= "Novembre";
		if($month == 12) $str .= "Décembre";
		$str .= " ".$year." à ".$hour;
		 
		return $str;
	}
	
	
	public static function affDateTimeFr($date){
	
		$tab =explode('-', $date);
		
		$year = $tab[0];
		$month = $tab[1];
		$dayHour = $tab[2];
		$tabDayHour=explode(' ', $dayHour);
		
		$day = "le ".$tabDayHour[0];
		$hour = $tabDayHour[1];
		 
		$str = $day." ";
		if($month == 1) $str .= "Janvier";
		if($month == 2) $str .= "Février";
		if($month == 3) $str .= "Mars";
		if($month == 4) $str .= "Avril";
		if($month == 5) $str .= "Mai";
		if($month == 6) $str .= "Juin";
		if($month == 7) $str .= "Juillet";
		if($month == 8) $str .= "Août";
		if($month == 9) $str .= "Septembre";
		if($month == 10) $str .= "Octobre";
		if($month == 11) $str .= "Novembre";
		if($month == 12) $str .= "Décembre";
		$str .= " ".$year." à ".$hour;
		 
		return $str;
	}
}
