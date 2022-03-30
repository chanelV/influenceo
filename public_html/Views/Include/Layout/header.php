<?php
  use App\SiteInfo;

  if(!isset($_SESSION['user_inf'])){
      header("location:/signin");
  }
  $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
  $segment = explode('/', $uri);
  $page = $segment[1];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/public/img/logo/logo.jpg">

    <title>Dashboard Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/css/jquery-ui.min.css">
    <link rel="stylesheet" href="/public/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Custom styles for this template -->
    <link href="/public/css/dashboard.css" rel="stylesheet">
    <link href="/public/css/editor.css" rel="stylesheet">

  </head>

  <body>
    <a class="nav-link" href="/logout"><i class="fa fa-power-off"></i> Déconnexion </a>
    