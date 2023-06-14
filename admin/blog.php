<?php 
include_once('../dbconnection.php');
include('slidebar.php'); 


?>

<section class="home">

<p class="text p-2 text-center"> All Blogs</p>
<div class="blog_con">
<?php
    //$sql =" SELECT * from blog";
    $sql="SELECT blog.*, ngotable.name FROM blog JOIN ngotable ON blog.id = ngotable.id";
    $sno=1;
    
    $result = $conn->query($sql);
    if($result -> num_rows >0){
    ?>
    <table class="table"  >
        <thead>
        <tr>
            <th scope='col'> Sno</th>
            <th scope='col'> Info</th>
            <th scope='col'> Blog Image</th>
            <th scope='col'>Organized By</th>
            <th scope='col'> Action</th>
        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$sno++.'</th>';
            echo '<th scope="row"><p>Blog Title: '.$row['b_title'].'<br> Date: '.$row['b_date'].'</p></th>';
            echo '<td><img  src="'.$row['b_img'].'" alt="loading..." class="gal_img"></td>';
            echo '<th scope="row">'.$row['name'].'</th>';
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

</div>
</section>