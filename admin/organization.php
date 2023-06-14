<?php 
include_once('../dbconnection.php');
include('slidebar.php');

?>

<section class="home">

<p class="text p-2 text-center"> All Organizatons</p>
<div class="org_con">
<?php
    $sql =" SELECT * from ngotable";
    $result = $conn->query($sql);
    if($result -> num_rows >0){
    ?>
    <table class="table"  >
        <thead>
        <tr>
            <th scope='col'> ID</th>
            <th scope='col'> Name</th>
            <th scope='col'> Image</th>
            <th scope='col'> Status</th>
            <th scope='col'> Number</th>
        </tr>
        </thead>
        <tbody>
            <?php while($row = $result ->fetch_assoc()){ 
            echo '<tr>';
            echo '<th scope="row">'.$row['id'].'</th>';
            echo '<th scope="row">'.$row['name'].'</th>';
            echo '<td><img  src="'.$row['image'].'" alt="loading..." class="gal_img"></td>';
            echo '<th scope="row">'.$row['status'].'</th>';
            echo '<th scope="row">'.$row['num'].'</th>';
        
        '</tr>';
    } ?>
    </tbody>
    </table> 
<?php } else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}?>
</div>

</section>