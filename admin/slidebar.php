<?php 
include_once('../dbconnection.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php"); 
$pageTitle = getPageTitle($activePage);

function getPageTitle($active) {
  switch ($active) {
      case "user":
          return "User";
      case "blog":
          return "Blog";
      case "organization":
          return "Organization";
      case "donation":
          return "Donation";
      case "admindashboard":
          return "Dashboard";
      case "transaction":
            return "transaction";
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
    <link rel="stylesheet" href="style8.css">
    
    <!----===== Boxicons CSS ===== -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/ckeditor5/37.1.0/classic/ckeditor.js"></script>

    <title><?php echo $pageTitle; ?></title> 
</head>
<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../image/assets/logo.png" alt="logo">
                </span>

                <div class="text logo-text">
                    <span class="name">Admin Area</span>
                </div>
            </div>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link <?= ($activePage == 'admindashboard') ? 'active':''; ?>">
                        <a href="admindashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text ">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'organization') ? 'active':''; ?>">
                        <a href="organization.php">
                        <i class="bx bx-building icon"></i>
                            <span class="text nav-text">Organizations</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'user') ? 'active':''; ?>">
                        <a href="user.php">
                        <i class="bx bx-user icon"></i>
                            <span class="text nav-text">User</span>
                        </a>
                    </li>


                    <li class="nav-link <?= ($activePage == 'blog') ? 'active':''; ?>">
                        <a href="blog.php">
                        <i class="bx bx-news icon"></i>
                            <span class="text nav-text">Blog</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'transaction') ? 'active':''; ?>">
                        <a href="transaction.php">
                        <i class="bx bx-credit-card icon"></i>
                            <span class="text nav-text">Transaction</span>
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

</body>
</html>