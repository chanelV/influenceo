<?php   
    require_once APP_ROOT . '/Views/Include/Layout/header.php';
	require_once APP_ROOT . '/Views/Pages/Common_components/newUser.php';
?>

<main>
	<div class="main-section">
		<div class="container">
			<div class="main-section-data">
				<div class="row">
					<div class="col-lg-3 col-md-4 pd-left-none no-pd">
                        <div class="main-left-sidebar no-margin">
                            <div class="user-data full-width">
                                <div class="user-profile">
                                    <div class="username-dt">
                                        <div class="usr-pic">
                                            <img src="<?=$data['post']['picture']?>" height="100" width="100" alt="">
                                        </div>
                                    </div><!--username-dt end-->

                                    <div class="user-specs">
                                        <?php
                                            echo "<h3>".$data['post']['reason_social']."</h3>"; 
                                        ?>
                                        <span>Marque</span>
                                    </div>
                                </div><!--user-profile end-->
                                <ul class="user-fw-status">
                                    <li>
                                        <a href="/profile/<?=$data['post']['id_user']?>" title="">Voir le profile</a>
                                    </li>
                                </ul>
                            </div><!--user-data end-->
                            
                        </div><!--main-left-sidebar end-->
					</div>
					<div class="col-lg-6 col-md-8 no-pd">
						<div class="main-ws-sec">
							<div class="posts-section">
                                <div class="post-bar">
                                    <div class="post_topbar">
                                        <div class="usy-dt">
                                            <img src="<?=$data['post']["picture"]?>" width="50" height="50" alt="">
                                            <div class="usy-name">
                                                <h3><?=$data['post']["reason_social"]?></h3>
                                                <span>
                                                    <img src="/public/images/clock.png" alt="">
                                                    publiée le <?=date("d/m/Y H:s:i", strtotime($data['post']["create_date"]))?>
                                                </span>
                                            </div>
                                        </div>
                                        <?php if($data['post']['id_user'] == $me['info']['id']){ ?>
                                            <div class="ed-opts">
                                                <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                                                <ul class="ed-options">
                                                    <li><a href="#" title="" rel="<?=$data['post']['id']?>" class="delete-post">Supprimer</a></li>
                                                </ul>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="epi-sec"></div>
                                    <div class="job_descp">
                                        <h3>Influenceur</h3>
                                        <ul class="job-dt">
                                            <li><a href="#" title="">Débute le <?=date("d/m/Y", strtotime($data['post']["start_date"]))?></a></li>
                                            <li><a href="#" title="" class="bg-warning">Date de fin <?=date("d/m/Y", strtotime($data['post']["start_date"]))?></a></li>
                                        </ul>
                                        <p><?=nl2br($data['post']['description'])?></p>
                                        <ul class="skill-tags">
                                            <?php foreach($data['categories'] as $c){ ?>
                                            <li><a href="#" title=""><?=$c["name"]?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="job-status-bar">
                                        <ul class="like-com">
                                            <li>
                                                <a style="cursor:pointer" class="action-like" id="action-like-<?=$data['post']['id']?>" rel="<?=$data['post']['id']?>"><i class="la la-heart <?php if(in_array($data['post']['id_user'], $data['usersId'])){echo 'text-danger';} ?>"></i> <?=count($data['likes'])?> </a>
                                            </li> 
                                            <li>
                                                <a href="#"><i class="la la-comment"></i> <?=count($data['comments'])?> </a>
                                            </li> 
                                        </ul>
                                    </div>
                                </div><!--post-bar end-->
                                <div class="comment-section">
                                    <div class="comment-sec">
                                        <ul>
                                            <?php foreach($data['comments'] as $item){ ?>
                                            <li>
                                                <div class="comment-list">
                                                    <div class="bg-img">
                                                        <img src="<?=$item['picture']?>" width="40" height="40" alt="">
                                                    </div>
                                                    <div class="comment">
                                                        <h3>
                                                        <?php
                                                            echo $item['username'];
                                                        ?>
                                                        </h3>
                                                        <span><img src="/public/images/clock.png" alt=""> <?=date("d/m/Y H:s:i", strtotime($item['create_date']))?></span>
                                                        <p><?=$item['content']?></p>
                                                    </div>
                                                </div><!--comment-list end-->
                                            </li>
                                            <?php } ?>
                                        </ul>
                                    </div><!--comment-sec end-->
                                    <div class="post-comment">
                                        <div class="comment_box">
                                            <form class="form" id="common-form-comments" action="/comments" method="POST">
                                                <input type="text" class="require" name="content" placeholder="Commentaire">
                                                <input type="hidden" name="id_user" value="<?=$data['post']['id_user']?>">
                                                <input type="hidden" name="id_mission" value="<?=$data['post']['id']?>">
                                                <button type="submit" class="form-button" rel="comments">Envoyer</button>
                                            </form>
                                        </div>
                                    </div><!--post-comment end-->
                                </div><!--comment-section end-->
								
							</div><!--posts-section end-->
						</div><!--main-ws-sec end-->
					</div>
				</div>
			</div><!-- main-section-data end-->
		</div> 
	</div>
</main>

<?php require_once APP_ROOT . '/Views/Include/Layout/footer.php'; ?>
