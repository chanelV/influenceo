<?php
    use App\Helper;
    if(isset($_SESSION['influenceo'])){
        Helper::redirect("/home");
    }
?>
<!--Header authentification-->
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
<link rel="stylesheet" type="text/css" href="/public/lib/slick/slick.css">
<link rel="stylesheet" type="text/css" href="/public/lib/slick/slick-theme.css">
<link rel="stylesheet" type="text/css" href="/public/css/style.css">
<link rel="stylesheet" type="text/css" href="/public/css/responsive.css">


<script>
    const apiAddress = '<?= URL_ROOT; ?>';
    const roots = {
        login: "/login",
        register: "/register",
        home: "/home"
    };
</script>

</head>

<body class="sign-in">
	

	<div class="wrapper">