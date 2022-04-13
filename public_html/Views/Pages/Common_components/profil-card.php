<?php
use Models\Posts;
$getPostsUser = Posts::getPostsUser($me['info']['id']);
$getlikesUser = Posts::getLikesUser($me['info']['id']);
?>

<div class="main-left-sidebar no-margin">
    <div class="user-data full-width">
        <div class="user-profile">
            <div class="username-dt">
                <div class="usr-pic">
                    <img src="<?=$me['info']['picture']?>" height="100" width="100" alt="">
                </div>
            </div><!--username-dt end-->

            <?php if(!$type){ ?>
            <div class="user-specs">
                
                    <?php
                        if($type && $me['info']['lastname']){
                            echo "<h3>".$me['info']['firstname']." ".$me['info']['lastname']."</h3>";
                        }
                        else if(!$type && $me['info']['reason_social']){
                            echo "<h3>".$me['info']['reason_social']."</h3>";
                        }
                        else {
                            echo "<div class='text-danger'><em>Information non renseignée</em></div>";
                        }
                    ?>
                
                <span><?=$type?"Influenceur":"Marque"?></span>
            </div>
            <?php } ?>
        </div><!--user-profile end-->
        <ul class="user-fw-status">
            <li>
                <h4>Total missions publiées</h4>
                <span><?=count($getPostsUser)?></span>
            </li>
            <li>
                <h4>Total j'aime</h4>
                <span><?=count($getlikesUser)?></span>
            </li>
            <li>
                <a href="/profile" title="">Voir le profile</a>
            </li>
        </ul>
    </div><!--user-data end-->
    
</div><!--main-left-sidebar end-->