<?php require_once "user_login/controllerUserData.php"; 
$active = basename($_SERVER['PHP_SELF'], ".php"); 
$pageTitle = getPageTitle($active);
include_once('dbconnection.php');
if(isset($_SESSION['is_Login'])){
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
    }
}
}

?>

<?php
function getPageTitle($active) {
  switch ($active) {
      case "about":
          return "About Us";
      case "blog":
          return "Blog";
      case "blogpage":
          return "Blog Page";
      case "causedetails":
          return "Cause Details";
      case "causes":
          return "Causes";
      case "checkout":
          return "Checkout";
      case "checkout-charge":
            return "Checkout charge";
      case "success":
            return "Success";
      case "donation":
          return "Donation";
      case "dashboard":
          return "Dashboard";
      case "feedback":
          return "Feedback";
      case "history":
          return "History";
      case "home":
          return "Home";
          case "invoice":
            return "Receipt";
      default:
          return "Page Title";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <title><?php echo $pageTitle; ?></title>
    <link rel="icon" type="image/png" href="image/assets/logo.png" />
    <link rel="stylesheet" href="css/chat2.css">
    <link rel="stylesheet" href="css/styles22.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper-bundle.min.css">
    <link rel="stylesheet" href="css/swipe4.css">
      <!----===== Boxicons CSS ===== -->
      <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--testimonals -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css"/>
    
</head>
<body>

      <!-- header start bootstrap/responsive-->
  <nav class="navbar fixed-top navbar-expand-xl">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img  src="image/assets/logo.png" width="80px" height="80px" style="margin-right:50px" /></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link <?= ($active == 'home') ? 'active1':'';?>"  href="home.php">Home</a>
              <a class="nav-link <?= ($active == 'causes'|| $active == "causedetails") ? 'active1':'';?>"  href="causes.php">Causes</a>
              <a class="nav-link <?= ($active == 'donation'||  $active == "checkout") ? 'active1':'';?>" href="donation.php">Donation</a>
              <a class="nav-link <?= ($active == 'about') ? 'active1':'';?>" href="about.php">About Us</a>
              <a class="nav-link <?= ($active == 'blog') ? 'active1':'';?>" href="blog.php">Blog</a>
              
              <?php 
                    if(isset($_SESSION['is_Login'])){
                      echo '<a class="nav-link ' . (($active == "dashboard" || $active == "history" || $active == "feedback") ? 'active1' : '') . '" href="dashboard.php">Donor Corner</a>
                        <a href="user_login/logout-user.php"><button type="button" style="width:160px; height:40px" class="btn btn-light">Logout</button></a>';
                      }
      
                      else{
                        echo'<a href="user_login/login-user.php"><button type="button" style="width:160px; height:40px" class="btn btn-light">Login / Register</button></a>';
                      }
              ?>

            </div>
          </div>
        </div>
      </nav>
    <!--header ends --->

    
