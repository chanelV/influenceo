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
						<?php   
							require_once APP_ROOT . '/Views/Pages/Common_components/profil-card.php';
						?>
					</div>
					<div class="col-lg-6 col-md-8 no-pd">
						<div class="main-ws-sec">
							<?php if(!$type){ ?>
								<div class="post-topbar">
									<div class="post-st">
										<ul>
											<li><a class="post-jb active" href="#" title="">Créer une mission</a></li>
										</ul>
									</div><!--post-st end-->
								</div><!--post-topbar end-->
							<?php } ?>

							<div class="posts-section">
								<?php   
									require_once APP_ROOT . '/Views/Pages/Common_components/post-card.php';
								?>
								
							</div><!--posts-section end-->
						</div><!--main-ws-sec end-->
					</div>
					<div class="col-lg-3 pd-right-none no-pd">
						<?php   
							require_once APP_ROOT . '/Views/Pages/Common_components/aside-card.php';
						?>
					</div>
				</div>
			</div><!-- main-section-data end-->
		</div> 
	</div>
</main>

<?php require_once APP_ROOT . '/Views/Include/Layout/footer.php'; ?>
