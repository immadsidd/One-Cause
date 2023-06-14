<?php 
include_once('../dbconnection.php');
include('slidebar.php'); 


?>
<section class="home">
<p class="text p-2 text-center"> Transactions</p>
<div class="blog_con">
<?php
   $sql = "SELECT t.*, u.name as dname, n.name, d.d_title
   FROM transaction t
   JOIN usertable u ON t.id = u.id
   JOIN donation d ON t.d_id = d.d_id
   JOIN ngotable n ON d.id = n.id
   ORDER BY t.t_date DESC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<table class="table">
   <thead>
       <tr>
           <th scope='col'> Sno</th>
           <th scope='col'> Date</th>
           <th scope='col'> Amount</th>
           <th scope='col'> Donor</th>
           <th scope='col'> Organization</th>
           <th scope='col'> Cause</th>
       </tr>
   </thead>
   <tbody>
       <?php
       $sno = 1;
       while ($row = $result->fetch_assoc()) {
           echo '<tr>';
           echo '<th scope="row">' . $sno++ . '</th>';
           echo '<td>' . $row['t_date'] . '</td>';
           echo '<td>' . $row['t_amount'] . '</td>';
           echo '<td>' . $row['dname'] . '</td>';
           echo '<td>' . $row['name'] . '</td>';
           echo '<td>' . $row['d_title'] . '</td>';
           echo '</tr>';
       }
       ?>
   </tbody>
</table>
<?php
} else {
echo 'No results found.';
}?>
</section>