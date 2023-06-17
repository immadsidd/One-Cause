<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 

if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}

?>

<section class="home">
<?php
if(isset($_REQUEST['submit'])){
    if(($_REQUEST['d_deadline'] == "")||($_REQUEST['d_title'] == "")||($_REQUEST['d_desc'] == "")
    ||($_REQUEST['d_goal'] == "")){
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
        }else{
    $d_title=$_REQUEST['d_title'];
    $d_deadline=$_REQUEST['d_deadline'];
    $d_desc=$_REQUEST['d_desc'];
    $d_goal=$_REQUEST['d_goal'];
    $d_img= $_FILES['d_img']['name'];
    $d_img_temp=$_FILES['d_img']['tmp_name'];
    $img_folder ='../image/donation/'.$d_img;
    move_uploaded_file($d_img_temp, $img_folder);

$sql ="INSERT INTO donation (d_date, d_deadline, d_title, d_desc, d_goal, d_img, d_status, id) VALUES(current_timestamp(), '$d_deadline', '$d_title', '$d_desc', '$d_goal', '$img_folder','in progress' ,(SELECT id FROM ngotable where email='".$email."'))";
if ($conn-> query($sql)== TRUE){
    $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Cause added sucessfully</div>';
}
else{
    $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add Cause</div>';
}

}  }
?>
<div class="img_form">
        <form action="" method="POST" enctype="multipart/form-data">
        <h3 class="text text-center"> Add New Cause</h3><br>

        <label for="d_deadline">Deadline</label> <span id="error" style="color: red; font-size:14px;"></span>
        <input type="date" class="form-control" id="d_deadline" onchange="validateDeadline()"
        name="d_deadline"><br>

        <label for="d_title">Cause Title</label>
        <input type="text" class="form-control" id="d_title" 
        name="d_title"> <br>

        <label for="d_desc">Cause Description</label>
        <textarea class="form-group" id="d_desc" name="d_desc" rows="4" style="resize: none;"></textarea><br><br>
   
        <label for="d_goal">Goal</label>
        <input type="number" class="form-control" id="d_goal" 
        name="d_goal"> <br>
 
        <label for="d_img">Cause Image</label>
        <input type="file" class="form-control-file" id="d_img" 
        name="d_img"> 
        <br><br>

<div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="submit" name="submit">Submit</button>
        <a href="donation.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)){echo $msg;
        }?>
</form>
</div>
</section>

<script>
  function validateDeadline() {
    var deadlineInput = document.getElementById('d_deadline');
    var deadlineDate = new Date(deadlineInput.value);
    var currentDate = new Date();

    var submitButton = document.getElementById('submit');
    var errorSpan = document.getElementById('error');
    
    if (deadlineDate < currentDate) {
      submitButton.disabled = true;
      errorSpan.textContent = " Please enter a future date.";
    } else {
      submitButton.disabled = false;
      errorSpan.textContent = "";
    }
  }
</script>
