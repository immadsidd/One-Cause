<?php 
include_once('dbconnection.php');
$activePage = basename($_SERVER['PHP_SELF'], ".php"); 
if(isset($_SESSION['is_Login'])){
        $sql = "SELECT * FROM usertable WHERE email='" . $_SESSION['email'] . "'";
        $run_Sql = mysqli_query($con, $sql);
        if($run_Sql){
            $fetch_info = mysqli_fetch_assoc($run_Sql);
            $name= $fetch_info['name'];
        
    }
    }
    else{
        header('Location: login-user.php');
    }
?>

<div class="s_con">
<div class="sidebar">
    <div class="name" style="margin-top:10px">
    <p style="color:black; text-align:center; font-size:20px; text-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);"><i class="bx bx-user" style="color:black; text-align:center; font-size:20px; text-shadow: 0px 8px 15px rgba(0, 0, 0, 0.5);">: <?php echo $name;?></i><p>

    </div>
        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link <?= ($activePage == 'dashboard') ? 'active':''; ?>">
                        <a href="dashboard.php">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text ">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link <?= ($activePage == 'history') ? 'active':''; ?>">
                        <a href="history.php">
                        <i class="bx bx-history icon"></i>
                            <span class="text nav-text">History</span>
                        </a>
                    </li>


                    <li class="nav-link <?= ($activePage == 'feedback') ? 'active':''; ?>">
                        <a href="feedback.php">
                        <i class="bx bx-message-square icon"></i>
                            <span class="text nav-text">feedback</span>
                        </a>
                    </li>

                </ul>
            </div>

        </div>

</div>
</div>