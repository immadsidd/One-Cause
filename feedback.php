<?php
include('header.php');
include('slidebar.php');
include_once('dbconnection.php');

if(isset($_SESSION['is_Login'])){
  $email = $_SESSION['email'];}

  if(isset($_REQUEST['submit'])){
    if($_REQUEST['feedback'] == ""){
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
        }else{
  
    $f_text=$_REQUEST['feedback'];
    
  
    

$sql ="INSERT INTO feedback (f_feed,id) VALUES('$f_text', (SELECT id FROM usertable where email='".$email."'))";
if ($conn-> query($sql)== TRUE){
    $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> feedback submitted sucessfully</div>';
}
else{
    $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add feedback</div>';
}

  }

  }
?>

<section class="home">

<div class="u_feed">
  <form action="" method="POST">
     <h3 class="text text-center">Write Your Feedback </h3><br>
    <b><label for="feedback">Feedback:</label><b>
    <textarea id="feedback" name="feedback" required></textarea><br><br>
    <input type="submit" value="Submit" name="submit">
  </form>
  <?php if(isset($msg)){echo $msg;
        }?>
</div>


</section>



<?php
include('bot.php');
include('footer.php');
?>