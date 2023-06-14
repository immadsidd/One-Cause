<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 

if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}

?>

<section class="home">
    <div class="blog">
<p class="text p-2 text-center"> All Blogs</p>
<?php
$num_per_page=04;

if(isset($_GET["page"]))
{
    $page=$_GET["page"];
}
else
{
    $page=1;
}

$start_from=($page-1)*04;
$sql =" SELECT * from blog WHERE id=(SELECT id FROM ngotable where email='".$email."')";
$pr_result = mysqli_query($con,$sql);
$total_record = mysqli_num_rows($pr_result );

$total_page = ceil($total_record/$num_per_page);
?>
<div class="pag">
<?php
if($page>1)
{
    echo "<a href='blog.php?page=".($page-1)."' class='btn' style='background-color:#faaa34;'>Previous</a>";
}


for($i=1;$i<$total_page;$i++)
{
    echo "<a href='blog.php?page=".$i."' class='btn b_page'>$i</a>";
}

if($i>$page)
{
    echo "<a href='blog.php?page=".$total_page."' class='btn b_page'>$total_page</a>";
    echo "<a href='blog.php?page=".($page+1)."' class='btn' style='background-color:#faaa34;'>Next</a>";
}
?>
</div>
<?php
    $sql =" SELECT * from blog  WHERE id=(SELECT id FROM ngotable where email='".$email."') limit $start_from,$num_per_page";
    $sno = ($page - 1) * $num_per_page + 1;
    $result = $conn->query($sql);
    if($result -> num_rows >0){
    ?>
    <table class="table"  >
        <thead>
        <tr>
            <th scope='col'> Sno</th>
            <th scope='col'> Info</th>
            <th scope='col'> Blog Image</th>
            <th scope='col'> Blog</th>
            <th scope='col'> Action</th>
        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$sno++.'</th>';
            echo '<th scope="row"><p>Blog Title: '.$row['b_title'].'<br> Date: '.$row['b_date'].'</p></th>';
            echo '<td><img  src="'.$row['b_img'].'" alt="loading..." class="gal_img"></td>';
            echo '<td>';
            echo '<form action="viewblog.php?b_id='.$row["b_id"].'" method="POST" class="d-inline">
            <input type="hidden" name="id" value='.$row["b_id"].'>
            <button
            type="submit" 
            class="btn btn-secondary "
            name="view"
            value="view"
            style="background-color: #1B4A56;  color:white;">
           View
            </button>
            </form>';
            '</td>';
            echo '<td>';

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["b_id"].'>
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
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}

if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM blog WHERE b_id ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
    
    ?>
<div>
    <a class="btn box" href="addblog.php" style="background-color: #1B4A56; color:white">
    <i class="fas fa-plus"></i>
    </a>
</div>
</div>
</section>