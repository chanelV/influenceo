<?php
use App\Helper;

    if($me['info']['create_date'] == $me['info']['update_date'] || empty($me['social_network']) || empty($me['language']) || empty($me['categories'])){
        $_SESSION["active_account"] = false;
       Helper::redirect("/profile-account-setting");
    }
?>