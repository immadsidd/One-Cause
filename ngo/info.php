<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php');

if(isset($_SESSION['is_ngoLogin'])){
$email = $_SESSION['email'];
$sql= "SELECT * FROM ngotable WHERE email ='$email'";
$result = $conn->query($sql);
if($result->num_rows == 1){
    $row= $result->fetch_assoc();
    $NGO_ID= $row['id'];
    $NGO_NAME= $row['name'];
    $NGO_BIO=$row['bio'];
    $NGO_IMG=$row['image'];
}}

if(isset($_REQUEST['uStubtn'])){
$NGO_NAME=$_REQUEST['NGO_NAME'];
$NGO_BIO=$_REQUEST['NGO_BIO'];
$NGO_WEB=$_REQUEST['NGO_WEB'];
$NGO_FB=$_REQUEST['NGO_FB'];
$NGO_IG=$_REQUEST['NGO_IG'];
$NGO_MAIL=$_REQUEST['NGO_MAIL'];
$NGO_NUM=$_REQUEST['NGO_NUM'];
$NGO_IMG=$_FILES['NGO_IMG']['name'];
$NGO_IMG_TEMP=$_FILES['NGO_IMG']['tmp_name'];
$img_folder ='../image/ngo/'.$NGO_IMG;
move_uploaded_file( $NGO_IMG_TEMP, $img_folder);
$sql ="UPDATE ngotable SET name=' $NGO_NAME', image= '$img_folder' , bio='$NGO_BIO', web='$NGO_WEB', ig='$NGO_IG', fb='$NGO_FB', mail='$NGO_MAIL', num='$NGO_NUM' WHERE email='$email'";
if($conn->query($sql)== TRUE){
    header('Location: info.php');
    
}}

?>

<section class="home">
    <div class="ngo_form">
        <form action="" method="POST" enctype="multipart/form-data">

            <label for="NGO_ID"><b>Organization ID:</b></label>
            <input type="tel" class="form-control" id="NGO_ID" name="NGO_ID"
                value="<?php if(isset($row['id'])){echo trim($row['id']);} ?>" readonly>

            <div class="logo">
                <img src="<?php if(isset($row['image'])){echo $row['image'];} ?>" alt="loading..." class="img"><br>
            </div>
            <br>

            <label for="NGO_NAME"><b>organization Name:</b></label>
            <input type="text" class="form-control" id="NGO_NAME" name="NGO_NAME"
                value="<?php if(isset($row['name'])) {echo ltrim($row['name'],' '); }?>" readonly> <br>

            <label for="NGO_BIO"><b>Bio:</b></label>
            <textarea readonly id="NGO_BIO" name="NGO_BIO" placeholder="Write something.." spellcheck="false"
                maxlength="500"> <?php if(isset($row['bio'])){echo ltrim($row['bio'],' '); } ?></textarea>
            <span class="counter">500</span><br><br>

            <label for="NGO_NAME"><b>Social links:</b></label>
            <input type="text" class="form-control so" id="NGO_WEB" name="NGO_WEB" placeholder="Website"
                value="<?php if(isset($row['web'])) {echo ltrim($row['web'],' '); }?>" readonly>
            <input type="text" class="form-control so" id="NGO_FB" name="NGO_FB" placeholder="Facebook"
                value="<?php if(isset($row['fb'])) {echo ltrim($row['fb'],' '); }?>" readonly>
            <input type="text" class="form-control so" id="NGO_IG" name="NGO_IG" placeholder="Instagram"
                value="<?php if(isset($row['ig'])) {echo ltrim($row['ig'],' '); }?>" readonly>
            <br>

            <label for="NGO_NAME"><b>Contact:</b></label>
            <input type="text" class="form-control so" id="NGO_NUM" name="NGO_NUM" placeholder="Number"
                value="<?php if(isset($row['num'])) {echo ltrim($row['num'],' '); }?>" readonly>
            <input type="text" class="form-control so" id="NGO_MAIL" name="NGO_MAIL" placeholder="Mail"
                value="<?php if(isset($row['mail'])) {echo ltrim($row['mail'],' '); }?>" readonly>
            <br>

            <div>
                <label for="NGO_IMG"> <b> Upload new Logo</b></label><br>
                <input type="file" class="form-control-file" id="NGO_IMG" name="NGO_IMG" disabled>
            </div>
            <br>



            <input type="submit" id="uStubtn" class="ngo_button" name="uStubtn" value="submit">
            <input type="button" id="edit" class="ngo_button" name="edit" value="edit">
            <?php if(isset($msg)){echo $msg;
        }?>
        </form>
    </div>
    <script>
        var readonly = true;
        $('.ngo_form input[type="button"]').on('click', function () {
            $('.ngo_form input[type="text"], .ngo_form textarea ').attr('readonly', !readonly);

            readonly = !readonly;
            $('.ngo_form input[type="file"]').attr("disabled", false);
            document.getElementById("edit").style.display = "none";
            document.getElementById("uStubtn").style.display = "block";
            return false;
        });
    </script>
    <script>
        const input = document.querySelector("form #NGO_BIO"),
            counter = document.querySelector("form .counter"),
            maxLength = input.getAttribute("maxlength");

        input.onkeyup = () => {
            counter.innerText = maxLength - input.value.length;
        }
    </script>
</section>


</body>

</html>