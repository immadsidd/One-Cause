<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 
if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}

?>

<section class="home">
<p class="historyp text p-2 text-center"> Transactions</p>
<div class="blog_con">
<?php

 
$sql = "SELECT t.*, DATE(t.t_date) AS transaction_date, TIME(t.t_date) AS transaction_time, u.name as dname, n.name, d.d_title
        FROM transaction t
        JOIN usertable u ON t.id = u.id
        JOIN donation d ON t.d_id = d.d_id
        JOIN ngotable n ON d.id = n.id 
        WHERE n.id = (SELECT id FROM ngotable WHERE email = '".$email."')
        ORDER BY t.t_date DESC";

   

$sno = 1;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<table class="table" style="width: 80%";>
   <thead>
       <tr>
           <th scope='col'> Sno</th>
           <th scope='col'> Date</th>
           <th scope='col'> Time</th>
           <th scope='col'> From</th>
           <th scope='col'> Amount</th>
           <th scope='col'> Cause</th>
       </tr>
   </thead>
   <tbody>
       <?php
       while ($row = $result->fetch_assoc()) {
           echo '<tr>';
           echo '<th scope="row">' . $sno++ . '</th>';
           echo '<td>' . $row['transaction_date'] . '</td>';
           echo '<td>' . $row['transaction_time'] . '</td>';
           echo '<td>' . $row['dname'] . '</td>';
           echo '<td>' . $row['t_amount'] . '</td>';
           echo '<td>' . $row['d_title'] . '</td>';
           echo '</tr>';
       }
       ?>
   </tbody>
</table>
<?php
} else {
echo 'No results found.';
}



    
    ?>

</div>
</section>