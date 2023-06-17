<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 

if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}
$sql = "SELECT * FROM donation WHERE id=(SELECT id FROM ngotable WHERE email = '".$email."') AND  d_status='in progress'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $d_id = $row['d_id']; // Add the missing semicolon here

        $currentDateTime = new DateTime();
        $deadlineDateTime = new DateTime($row['d_deadline']);

        if ($currentDateTime >= $deadlineDateTime) {
            $sql = "UPDATE donation SET d_status='Deadline met' WHERE d_id='$d_id'";
            $conn->query($sql);
        }
    }
}


?>

<section class="home">
<div>
<div class="img_con">
<p class="text p-2 text-center"> All Donation Causes</p>

<!-- dropdown -->
<form method="POST" action="" class="status">
    <select name="status" onchange="this.form.submit()">
        <option value="">select status</option>
        <option value="in progress">in progress</option>
	<option value="Accomplished">Accomplished</option>
        <option value="Deadline met">Deadlline met</option>
    </select>
</form>
    <?php
       if(isset($_REQUEST["status"])){
        $status=$_REQUEST["status"];
        $sql =" SELECT * from donation  WHERE id=(SELECT id FROM ngotable where email='".$email."') AND d_status='".$status."'";
        $sno=1;
        $result = $conn->query($sql);
        if($result -> num_rows >0){
    
    ?>


    <table class="table" style="text-align:left" >
        <thead>
        <tr>
            <th scope='col'> Sno</th>
            <th scope='col'> Title</th>
            <th scope='col'> Goal</th>
            <th scope='col'> Raised</th>
            <th scope='col'> Description</th>
            <th scope='col'> Deadline</th>
            <th scope='col'> Image</th>
            <th scope='col'> Action</th>
            <th scope='col'> Status</th>
        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$sno++.'</th>';
            echo '<th scope="row">'.$row['d_title'].'</th>';
            echo '<td>'.$row['d_goal'].'/-</td>';
            echo '<td>'.$row['d_raised'].'/-</td>';
            echo '<td>'.$row['d_desc'].'</td>';
            echo '<td>'.$row['d_deadline'].'</td>';
            echo '<td><img  src="'.$row['d_img'].'" alt="loading..." class="gal_img"></td>';
            echo '<td>';
            if($row['d_status']=="in progress"){
            echo '<form action="editdonation.php" method="POST" class="d-inline" >
            <input type="hidden" name="id" value='.$row["d_id"].'>
            <button
                type="submit" 
                class="btn  mr-3"
                name="view"
                value="view"
                style="background-color:#1B4A56; color:white;"
                >
                <i class="bx bx-edit icon"></i>
                </button>
            </form><br><br>';}

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["d_id"].'>
                <button
                type="submit" 
                class="btn btn-secondary "
                name="delete"
                value="Delete"
                onclick="return confirm(\'Are you sure?\');"
                style="background-color:#850027;">
                <i class="bx bx-trash icon"></i>
                </button>
                </form>';
                
            '</td>';
            echo '<th scope="row">'.$row['d_status'].'</th>';
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php }else {
    echo '<div class="text-center" style="margin-top:100px; font-size: 20px"><b>0 results</b></div>';
}} else {
    $sql = "SELECT * FROM donation WHERE id=(SELECT id FROM ngotable WHERE email = '".$email."') ";

    $result = $conn->query($sql);
    $sno=1;
    if($result -> num_rows >0){
    ?>
    <table class="table" style="text-align:left" >
        <thead>
        <tr>
        <th scope='col'> Sno</th>
            <th scope='col'> Title</th>
            <th scope='col'> Goal</th>
            <th scope='col'> Raised</th>
            <th scope='col'> Description</th>
            <th scope='col'> Deadline</th>
            <th scope='col'> Image</th>
            <th scope='col'> Action</th>
            <th scope='col'> Status</th>
        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$sno++.'</th>';
            echo '<th scope="row">'.$row['d_title'].'</th>';
            echo '<td>'.$row['d_goal'].'/-</td>';
            echo '<td>'.$row['d_raised'].'/-</td>';
            echo '<td>'.$row['d_desc'].'</td>';
            echo '<td>'.$row['d_deadline'].'</td>';
            echo '<td><img  src="'.$row['d_img'].'" alt="loading..." class="gal_img"></td>';
            echo '<td>';
            if($row['d_status']=="in progress"){
                echo '<form action="editdonation.php" method="POST" class="d-inline" >
                <input type="hidden" name="id" value='.$row["d_id"].'>
                <button
                    type="submit" 
                    class="btn  mr-3"
                    name="view"
                    value="view"
                    style="background-color:#1B4A56; color:white;"
                    >
                    <i class="bx bx-edit icon"></i>
                    </button>
                </form><br><br>';}

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["d_id"].'>
                <button
                type="submit" 
                class="btn btn-secondary "
                name="delete"
                value="Delete"
                onclick="return confirm(\'Are you sure?\');"
                style="background-color:#850027;">
                <i class="bx bx-trash icon"></i>
                </button>
                </form>';
               
                
            '</td>';
            echo '<th scope="row">'.$row['d_status'].'</th>';
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
    echo '<div class="text-center" style="margin-top:100px; font-size: 20px"><b>0 results</b></div>';
}
}


if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM donation WHERE d_id ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
    
    ?>

<div>
    <a class="btn box" href="adddonation.php" style="background-color: #1B4A56; color:white; margin-bottom:50px">
    <i class="fas fa-plus"></i>
    </a>
</div>
</div>
</div>
</section>

