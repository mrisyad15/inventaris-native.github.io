<?php
session_start();
include "../config/conn.php";
if(empty($_SESSION['user'])) {
  echo "<script>alert('You must login before!');location=('../login.php');</script>";
}
$user = $_SESSION['user'];
$n = 0;
?>
<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>InventarisKu</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="../css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="../icons-reference/google-font.css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Datepicker -->
    <link rel="stylesheet" type="text/css" href="../vendor/datepicker/datepicker.min.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="../img/favicon.ico">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="header">   
      <nav class="navbar navbar-expand-lg">
        <div class="search-panel">
          <div class="search-inner d-flex align-items-center justify-content-center">
            <div class="close-btn">Close <i class="fa fa-close"></i></div>
            <form id="searchForm" action="#">
              <div class="form-group">
                <input type="search" name="search" placeholder="What are you searching for...">
                <button type="submit" class="submit">Search</button>
              </div>
            </form>
          </div>
        </div>
        <div class="container-fluid d-flex align-items-center justify-content-between">
          <div class="navbar-header">
            <a href="index.html" class="navbar-brand">
              <div class="brand-text brand-big visible text-uppercase">
                <strong class="text-primary">Inventaris</strong><strong>KU</strong>
              </div>
              <div class="brand-text brand-sm"><strong class="text-primary">I</strong><strong>K</strong></div>
            </a>
            <button class="sidebar-toggle"><i class="fa fa-long-arrow-left"></i></button>
          </div>
          <div class="right-menu list-inline no-margin-bottom">    
            <div class="list-inline-item">
              <a href="#" class="search-open nav-link"><i class="icon-magnifying-glass-browser"></i></a>
            </div>
            <div class="list-inline-item dropdown">
              <a id="notif" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link messages-toggle">
                <i class="icon-email"></i><span class="badge dashbg-1">5</span>
              </a>
              <div aria-labelledby="notif" class="dropdown-menu messages">
                <a href="#" class="dropdown-item message d-flex align-items-center">
                  <div class="profile"><img src="../img/avatar-3.jpg" alt="..." class="img-fluid">
                    <div class="status online"></div>
                  </div>
                  <div class="content">
                    <strong class="d-block">Nadia Halsey</strong>
                    <span class="d-block">lorem ipsum dolor sit amit</span>
                    <small class="date d-block">9:30am</small>
                  </div>
                </a>
                <a href="#" class="dropdown-item message d-flex align-items-center">
                  <strong>See All Messages <i class="fa fa-angle-right"></i></strong>
                </a>
              </div>
            </div>
            <!-- Log out -->
            <div class="list-inline-item logout"> <a id="logout" href="../logout.php" class="nav-link">Logout <i class="icon-logout"></i></a></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="d-flex align-items-stretch">