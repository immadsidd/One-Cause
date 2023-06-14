<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 

if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}

$b_id=$_GET['b_id'];
    $sql="SELECT * FROM blog where b_id='".$b_id."'";
    $result= $conn->query($sql);
    $row = $result ->fetch_assoc()

?>

<section class="home">
    <div class="blog_desc">
    <h3>Blog Title: <?php echo $row['b_title']; ?></h1>
    <h6>Date: <?php echo $row['b_date']; ?></h3><br>
    <img  src="<?php echo$row['b_img'] ?>" alt="loading..." class="b_img"><br><br>
    <h6>Blog Contents:</h6>
    <p><?php echo $row['b_content']; ?></p>
    </div><br>

    <div class="text-center">
        <a href="blog.php" class="btn btn-secondary">Close</a>
</div>
</section>