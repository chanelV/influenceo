<?php
  use App\UserInfo;
  use App\Helper;

  if(!isset($_SESSION['influenceo']) || !$_SESSION['influenceo']){
	Helper::redirect("/");
  } 
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $segment = explode('/', $uri);
  $page = $segment[1];

  $me = UserInfo::current();
  $type = $_SESSION['influenceo']['account']; // type soit 0 pour la marque et 1 pour influenceur
  //var_dump($me);
  //die();
?>
<!--Header -->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>WorkWise Html Template</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="" />
<meta name="keywords" content="" />
<link rel="stylesheet" type="text/css" href="/public/css/animate.css">
<link rel="stylesheet" type="text/css" href="/public/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/public/css/line-awesome.css">
<link rel="stylesheet" type="text/css" href="/public/css/line-awesome-font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/public/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="/public/css/jquery.mCustomScrollbar.min.css">
<link rel="stylesheet" type="text/css" href="/public/lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/public/lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="/public/css/style.css">
<link rel="stylesheet" type="text/css" href="/public/css/responsive.css">

<script>
    const apiAddress = '<?= URL_ROOT; ?>';
    const roots = {
        profileAccountSetting: "/profile-account-setting",
        updateInfo: "/update-info",
        updateCategories: "/update-categories",
        updateSocialsNetworks: "/update-socials-networks",
        updateLanguages: "/update-languages",
        updatePassword: "/update-password",
        createPost: "/create-post",
        comments: "/comments",
    };
</script>
</head>


<body>
	
	<div class="wrapper">

		<header>
			<div class="container">
				<div class="header-data">
					<div class="logo">
						<a href="/home" title=""><img src="/public/images/logo.png" alt=""></a>
					</div><!--logo end-->
					<div class="search-bar">
					</div><!--search-bar end-->
					<nav>	
						<ul>
							<li>
								<a href="/home" title="">
									<span><img src="/public/images/icon1.png" alt=""></span>
									Accueil
								</a>
							</li>
							<li>
								<a href="/profile-list" title="">
									<?php if($type){ ?>
										<span><img src="/public/images/icon2.png" alt=""></span>
										Marques
									<?php }else{ ?>
										<span><img src="/public/images/icon4.png" alt=""></span>
										Infuenceurs
									<?php } ?>
									
								</a>
							</li>
							<li>
								<a href="/missions" title="">
									<span><img src="/public/images/icon3.png" alt=""></span>
									Missions
								</a>
							</li>
							<li>
								<a href="/messages" title="" class="not-box-open">
									<span><img src="/public/images/icon6.png" alt=""></span>
									Messages
								</a>							
							</li>
						</ul>
					</nav><!--nav end-->
					<div class="menu-btn">
						<a href="#" title=""><i class="fa fa-bars"></i></a>
					</div><!--menu-btn end-->
					<div class="user-account">
						<div class="user-info">
							<img src="<?=$me['info']['picture']?>" width="30" height="30" alt="">
							<a href="#" title="">
								<?php 
									echo $me['info']['username'];
								?>
								
							</a>
							<i class="la la-sort-down"></i>
						</div>
						<div class="user-account-settingss">
							<h3><?=$me['info']['email']?></h3>
							<ul class="us-links">
								<li><a href="/profile-account-setting" title="">Paramètre du compte</a></li>
								<li><a href="" title=""></a></li>
							</ul>
							<h3 class="tc"><a href="/logout" title="">Deconnexion</a></h3>
						</div><!--user-account-settingss end-->
					</div>
				</div><!--header-data end-->
			</div>
		</header><!--header end-->
    