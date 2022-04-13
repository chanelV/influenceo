<?php
    //page  Liste des profils de marques et influenceurs  
?>

<?php   
    require_once APP_ROOT . '/Views/Include/Layout/header.php';
	require_once APP_ROOT . '/Views/Pages/Common_components/newUser.php';

    //page  Liste des profils des marques et influenceurs  
?>

<section class="companies-info">
			<div class="container">
				<div class="company-title">
					<h3><?=$data['page_subtitle']?></h3>
				</div><!--company-title end-->
				<div class="companies-list">
					<div class="row">
						<?php foreach($data['list'] as $item){ ?>
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="company_profile_info">
									<div class="company-up-info">
										<img width="91" height="91" src="<?=$item["picture"]?>" alt="">
										<h3>
											<?=!$item["user_type"]?$item["reason_social"]:$item["username"]?>
											</h3>
										<h4>Graphic Designer</h4>
										<ul>
											<li><a href="#" title="" class="follow">Suivre</a></li>
											<li><a href="#" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
										</ul>
									</div>
									<a href="/profile/<?=$item["id"]?>" title="" class="view-more-pro">Voir le profil</a>
								</div><!--company_profile_info end-->
							</div>
						<?php  } ?>
					</div>
				</div><!--companies-list end-->
			</div>
		</section><!--companies-info end-->

<?php require_once APP_ROOT . '/Views/Include/Layout/footer.php'; ?>
