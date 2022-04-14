<?php
    //page reglage profil 
?>

<?php   
    require_once APP_ROOT . '/Views/Include/Layout/header.php';
?>


<section class="profile-account-setting">
			<div class="container">
				<div class="account-tabs-setting">
					<div class="row">
						<?php if(!$_SESSION["active_account"]){ ?><div class="col-lg-12 alert alert-warning text-center text-uppercase mb-5 p-4">Veuillez compléter votre profil sur les informations personnelles, <b>les catégories</b>, <b>les réseaux sociaux</b>, et <b>les langues parlées</b></div><?php } ?>
						<div class="col-lg-4">
							<div class="acc-leftbar">
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
								    <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true">
										<i class="la la-cogs"></i>informations personnelles  
										<?php if($me['info']['create_date'] == $me['info']['update_date']){ ?>
											<span class="float-right text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
										<?php }else{ ?>
											<span class="float-right text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>  
										<?php } ?>
									</a>
								    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false">
										<i class="fa fa-lock"></i>Changer le mot de passe
									</a>
								    <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false">
										<i class="fa fa-tags"></i>Mes catégories 
										<?php if(empty($me['categories'])){ ?>
											<span class="float-right text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
										<?php }else{ ?>
											<span class="float-right text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>  
										<?php } ?>
									</a>
								    <a class="nav-item nav-link" id="nav-requests-tab" data-toggle="tab" href="#nav-requests" role="tab" aria-controls="nav-requests" aria-selected="false">
										<i class="fa fa-globe"></i>Mes réseaux sociaux 
										<?php if(empty($me['social_network'])){ ?>
											<span class="float-right text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
										<?php }else{ ?>
											<span class="float-right text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>  
										<?php } ?>
									</a>
								    <a class="nav-item nav-link" id="security-login-tab" data-toggle="tab" href="#security-login" role="tab" aria-controls="security-login" aria-selected="false">
										<i class="fa fa-language"></i>Langues parlées 
										<?php if(empty($me['language'])){ ?>
											<span class="float-right text-danger"><i class="fa fa-times-circle" aria-hidden="true"></i></span>
										<?php }else{ ?>
											<span class="float-right text-success"><i class="fa fa-check-circle" aria-hidden="true"></i></span>  
										<?php } ?>
									</a>
								  </div>
							</div><!--acc-leftbar end-->
						</div>
						<div class="col-lg-8">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
									<?php   
										require_once APP_ROOT . '/Views/Pages/Account/components/info.php';
									?>

								</div>
							  	<div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
								  	<?php   
										require_once APP_ROOT . '/Views/Pages/Account/components/password.php';
									?>
							  	</div>
							  	<div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
								  	<?php   
										require_once APP_ROOT . '/Views/Pages/Account/components/category.php';
									?>
							  	</div>
							  	<div class="tab-pane fade" id="nav-requests" role="tabpanel" aria-labelledby="nav-requests-tab">
								  	<?php   
										require_once APP_ROOT . '/Views/Pages/Account/components/social_network.php';
									?>
							  	</div>
							  	<div class="tab-pane fade" id="security-login" role="tabpanel" aria-labelledby="security-login-tab">
								  	<?php   
										require_once APP_ROOT . '/Views/Pages/Account/components/language.php';
									?>
							  	</div>
							</div>
						</div>
					</div>
				</div><!--account-tabs-setting end-->
			</div>
		</section>

<?php require_once APP_ROOT . '/Views/Include/Layout/footer.php'; ?>
