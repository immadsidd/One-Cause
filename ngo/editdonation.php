<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 

if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}

if(isset($_REQUEST['submit'])){
    if(($_REQUEST['d_id'] == "")||($_REQUEST['d_deadline'] == "")||($_REQUEST['d_title'] == "")||($_REQUEST['d_desc'] == "")
    ||($_REQUEST['d_goal'] == "")){
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
        }else{
            $d_id=$_REQUEST['d_id'];
            $d_deadline=$_REQUEST['d_deadline'];
            $d_title=$_REQUEST['d_title'];
            $d_desc=$_REQUEST['d_desc'];
            $d_goal=$_REQUEST['d_goal'];
            $d_img= $_FILES['d_img']['name'];
            $d_img_temp=$_FILES['d_img']['tmp_name'];
            $img_folder ='../image/donation/'.$d_img;
            move_uploaded_file($d_img_temp, $img_folder);
    

            $sql ="UPDATE donation SET d_deadline='$d_deadline' , d_title='$d_title',d_desc='$d_desc',d_goal= '$d_goal',d_img='$img_folder' WHERE d_id='$d_id'";
            if ($conn-> query($sql) == TRUE){
                echo"<script>
                alert('Cause updated sucessfully');
                location.href='donation.php'
                </script>"; }
            
        }}
?>


<section class="home">
    <?php
     if(isset($_REQUEST['view'])){
        $sql = "SELECT * FROM donation WHERE d_id ={$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        }

    ?>

<div class="img_form">
        <form action="" method="POST" enctype="multipart/form-data">
        <h3 class="text text-center"> Edit Cause</h3>

        <b><label for="d_deadline">Deadline</label></b>
        <input type="date" class="form-control" id="d_deadline" 
        name="d_deadline" value="<?php if(isset($row['d_deadline'])){echo $row['d_deadline'];} ?>"><br>

        <b><label for="d_title">Cause Title</label></b>
        <input type="text" class="form-control" id="d_title" 
        name="d_title" value="<?php if(isset($row['d_title'])){echo $row['d_title'];} ?>"> <br>

        <b><label for="d_desc">Cause Description</label></b>
        <textarea class="form-group" id="d_desc" name="d_desc" rows="4" style="resize: none;"><?php if(isset($row['d_desc'])){echo $row['d_desc'];} ?></textarea><br><br>
   
        <b><label for="d_goal">Goal</label></b>
        <input type="number" class="form-control" id="d_goal" 
        name="d_goal" value="<?php if(isset($row['d_goal'])){echo $row['d_goal'];} ?>"> <br>
 
        <b><label for="d_img">Cause Image</label></b>
        <img  src="<?php if(isset($row['d_img'])){echo $row['d_img'];} ?>  " alt="" class="image"><br><br>

        <label for="d_img">Replace Image</label>
        <input type="file" class="form-control-file" id="d_img" 
        name="d_img"> 
        <br><br>

<div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="submit" name="submit">Update</button>
        <a href="donation.php" class="btn btn-secondary">Close</a>
</div>
</form>
    </div>
</section>
