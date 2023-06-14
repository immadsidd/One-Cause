<?php 
include_once('../dbconnection.php');
include('slidebar.php');

?>

<section class="home">
<p class="text p-2 text-center"> All Users</p>
<div class="user_con">
<?php
    $sql =" SELECT * from usertable";
    $result = $conn->query($sql);
    $sno=1;
    if($result -> num_rows >0){
    ?>
    
    <table class="table"  >
        <thead>
        <tr>
            <th scope='col'> Sno</th>
            <th scope='col'> Name</th>
            <th scope='col'> Email</th>
            <th scope='col'> Status</th>
            <th scope='col'> Action</th>
        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$sno++.'</th>';
            echo '<th scope="row">'.$row['name'].'</th>';
            echo '<th scope="row">'.$row['email'].'</th>';
            echo '<th scope="row">'.$row['status'].'</th>';
            echo '<td>';

            echo '<form action="" method="POST" class="d-inline">
                <input type="hidden" name="id" value='.$row["id"].'>
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
    $sql = "DELETE FROM usertable WHERE id ={$_REQUEST['id']}";
    if($conn->query($sql) == TRUE){
        echo'<meta http-equiv ="refresh" content = "0"; URL?deleted"/>';
    } else{
        echo 'Unable to Delete Data';
    }

}
?>
</div>
</section>