<?php
use Models\Posts;
use App\Helper;
$posts = Posts::getPosts();

foreach($posts as $item){
    $categories = Posts::categories($item["id"]);
    $likes = Posts::likes($item["id"]);
    $usersId = [];
    for ($i=0; $i < count($likes); $i++) { 
       $usersId[] = $likes[$i]["id_user"];
    }
?>
<div class="post-bar">
    <div class="post_topbar">
        <div class="usy-dt">
            <img src="<?=$item["picture"]?>" width="50" height="50" alt="">
            <div class="usy-name">
                <h3><?=$item["reason_social"]?></h3>
                <span>
                    <img src="/public/images/clock.png" alt="">
                    publiée le <?=date("d/m/Y H:s:i", strtotime($item["create_date"]))?>
                </span>
            </div>
        </div>
        <div class="ed-opts">
            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
            <ul class="ed-options">
                <li><a href="#" title="">Supprimer</a></li>
            </ul>
        </div>
    </div>
    <div class="epi-sec"></div>
    <div class="job_descp">
        <h3>Influenceur</h3>
        <ul class="job-dt">
            <li><a href="#" title="">Débute le <?=date("d/m/Y", strtotime($item["start_date"]))?></a></li>
            <li><a href="#" title="" class="bg-warning">Date de fin <?=date("d/m/Y", strtotime($item["start_date"]))?></a></li>
        </ul>
        <p><?=Helper::trunc($item['description'], 144)?>  <?php if(strlen($item['description']) >= 144){ ?><a href="#" title="">Lire plus</a><?php } ?></p>
        <ul class="skill-tags">
            <?php foreach($categories as $c){ ?>
            <li><a href="#" title=""><?=$c["name"]?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="job-status-bar">
        <ul class="like-com">
            <li>
                <a style="cursor:pointer" class="action-like" id="action-like-<?=$item['id']?>" rel="<?=$item['id']?>"><i class="la la-heart <?php if(in_array($me['info']['id'], $usersId)){echo 'text-danger';} ?>"></i> <?=count($likes)?> </a>
            </li> 
            <li>
                <a href="#"><i class="la la-comment"></i> 25 </a>
            </li> 
        </ul>
        <a class="btn btn-primary text-white"><i class="la la-eye"></i> En savoir plus</a>
    </div>
</div><!--post-bar end-->
<?php } ?>