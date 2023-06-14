<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 

if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}


if(isset($_REQUEST['submit'])){
    if(($_POST['b_title'] == "")||($_POST['b_content'] == "")){
            $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Fill all fields</div>';
        }else{
    $b_content = mysqli_real_escape_string($conn, $_POST['b_content']);
    $b_title=$_REQUEST['b_title'];
    $b_img= $_FILES['b_img']['name'];
    $b_img_temp=$_FILES['b_img']['tmp_name'];
    $img_folder ='../image/blog/'.$b_img;
    move_uploaded_file($b_img_temp, $img_folder);
    

$sql ="INSERT INTO blog (b_date, b_title, b_img, b_content,id) VALUES(current_timestamp(), '$b_title','$img_folder', '$b_content', (SELECT id FROM ngotable where email='".$email."'))";
if ($conn-> query($sql)== TRUE){
    $msg='<div class="alert alert-sucess col-sm-6 ml-5 mt-2"> Blog added sucessfully</div>';
}
else{
    $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2"> Unable to add Blog</div>';
}

}  }
?>

<section class="home">
    <div class="blog">
    <p class="text p-2 text-center"> Write a new blog</p>
    <form method="post" enctype="multipart/form-data">

        <label for="b_title">Blog Title</label>
        <input type="text" class="form-control" id="b_title" 
        name="b_title"> <br>

        <label for="b_img">Blog Image</label>
        <input type="file" class="form-control-file" id="b_img" 
        name="b_img"> <br><br>

        <label for="b_content">Blog Contents</label>
        <input type="textarea" id="b_content" class="form-control" name="b_content"><br>

    <div class="text-center">
        <button type="submit" class="btn btn-danger" 
        id="submit" name="submit">Submit</button>
        <a href="blog.php" class="btn btn-secondary">Close</a>
</div><?php if(isset($msg)){echo $msg;
        }?>
    </form>
    </div>
    <script>
    ClassicEditor
        .create( document.querySelector( '#b_content' ) )
        .then( editor => {
            editor.model.document.on('change:data', () => {
                const b_content = editor.getData();
                document.querySelector('#b_content').value = b_content;
            });
        } )
        .catch( error => {
            console.error( error );
        } );
</script>
</section>