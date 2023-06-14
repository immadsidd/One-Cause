<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');

$activePage = basename($_SERVER['PHP_SELF'], ".php"); 
$pageTitle = getPageTitle($activePage);
if(isset($_SESSION['is_ngoLogin'])){
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM ngotable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        $name= $fetch_info['name'];
    }
}
}

?>
<?php
function getPageTitle($active) {
  switch ($active) {
      case "info":
          return "Info";
      case "blog":
          return "Blog";
      case "addblog":
          return "Add Blog Page";
      case "imagegallery":
          return "Image Gallery";
      case "addimage":
          return "Add Image";
      case "adddonation":
          return "Add Donation";
      case "donation":
          return "Donation";
      case "dashboard":
          return "Dashboard";
      case "editdonation":
          return "Edit Donation";
      case "viewblog":
          return "View Blog";
      case "transaction":
            return "Transaction";
      default:
          return "Page Title";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="../image/assets/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style12.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title><?php echo $pageTitle; ?></title> 
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../image/assets/logo.png" alt="logo">
                </span>

                <div class="text logo-text">
                    <span class="name">NGO Area</span>
                    <span class="profession"><?php echo $name;?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link <?= ($activePage == 'dashboard') ? 'active':''; ?>">
                        <a href="dashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text ">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'info') ? 'active':''; ?>">
                        <a href="info.php">
                        <i class='bx bx-info-circle icon'></i>
                            <span class="text nav-text">info</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'imagegallery') ? 'active':''; ?>">
                        <a href="imagegallery.php">
                        <i class='bx bx-images icon'></i>
                            <span class="text nav-text">Image Gallery</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'donation' ||$activePage == 'editdonation'  ||$activePage == 'adddonation' ) ? 'active':''; ?>">
                        <a href="donation.php">
                        <i class='bx bx-donate-heart icon'></i>
                            <span class="text nav-text">Donation</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'blog') ? 'active':''; ?>">
                        <a href="blog.php">
                        <i class='bx bx-pencil icon'></i>
                            <span class="text nav-text">Blog</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'transaction') ? 'active':''; ?>">
                        <a href="transaction.php">
                        <i class="bx bx-credit-card icon"></i>
                            <span class="text nav-text">Transactions</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="../ngo_login/logout-ngo.php">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
                
            </div>
        </div>

    </nav>



    <script src="script.js"></script>

</body>
</html>