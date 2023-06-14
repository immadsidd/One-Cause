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

    $fileCount = count ($_FILES['gal_img']['name']);
for ($i=0;$i<$fileCount; $i++){
    $fileName = $_FILES['gal_img']['name'][$i];
    $img_folder ='../image/gallery/'.$fileName;
    move_uploaded_file($_FILES['gal_img']['tmp_name'][$i], $img_folder);
$sql = "INSERT INTO gallery (gal_img,id) VALUES('$img_folder' ,(SELECT id FROM ngotable where email='".$email."'))";
if ($conn-> query($sql)== TRUE){
    $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Images added sucessfully</div>';
}
else{
    $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add Images</div>';
}
}
}  
?>
<div class="img_form">
        <form action="" method="POST" enctype="multipart/form-data">
        <h3 class="text text-center"> Add Multiple Images</h3><br>
        <label for="gal_img">Choose files:</label>
        <input type="file" class="form-control-file" id="gal_img" name="gal_img[]" multiple="multiple"> 
        <br><br><br><br>
<div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="submit" name="submit">Submit</button>
        <a href="imagegallery.php" class="btn btn-secondary">Close</a>
</div>
<?php if(isset($msg)){echo $msg;
        }?>
</form>
</div>
</section>