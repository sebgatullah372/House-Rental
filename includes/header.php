<?php
session_start();
include './includes/db_connection.php';
// $user_id = $_SESSION['user_id'];
// $sql = "SELECT * FROM user WHERE user_id = '$user_id'";
//     $query = mysqli_query($db, $sql);
//     $result= mysqli_fetch_assoc($query);
//     if($result){
//         $id = $result['user_id'];
//     }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>House Rental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Oswald:400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/mediaelementplayer.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="css/fl-bigmug-line.css">
    
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>

  <body>

  
    
  
  <div class="site-wrap">

    <div class="site-navbar mt-4">
        <div class="container py-1">
          <div class="row align-items-center">
            <div class="col-8 col-md-8 col-lg-4">
              <h1 class="mb-0"><a href="./" class="text-white h2 mb-0"><strong>House Rental<span class="text-primary">.</span></strong></a></h1>
            </div>
            <div class="col-4 col-md-6 col-lg-12">
              <nav class="site-navigation text-right text-md-right" role="navigation">

                <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none d-lg-block">
                  <li class="active">
                    <a href="./">Home</a>
                  </li>
                  <!-- <li><a href="about.php">About</a></li> -->
                  <li class="has-children">
                    <a href="#">Find yor House for Rent</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="houses.php">Houses for Rent</a></li>
                      <?php if(isset($_SESSION['user'])){ ?>
                      
                      <li><a href="my_houses.php">My Houses</a></li>
                      <?php }?>
                      
                    </ul>
                  </li>
                  <!-- <li><a href="news.php">News</a></li>
                  <li><a href="#">Contact</a></li> -->
                  <li><a href="./post_house_for_rent/">Post your House for Rent</a></li>
                  <?php
                  if(isset($_SESSION['user'])){
                  ?>
                  <li><a href="profile.php?user_id=<?php echo $_SESSION['user_id'];?>">My Profile</a></li>
                  <li><a href="./login_form/logout.php">Logout</a></li>
                  <?php
                  }
                  else{
                  ?>

                  <li><a href="./login_form/">Sign in</a></li>

                  <?php
                  }
                  ?>
                </ul>
              </nav>
            </div>
           

          </div>
        </div>
      </div>
    </div>

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    