<?php 
require_once "../ngo_login/controllerUserData.php"; 
include_once('dbconnection.php');
include('slidebar.php'); 

if(isset($_SESSION['is_ngoLogin'])){
    $email = $_SESSION['email'];
}
$sql = "SELECT * FROM donation WHERE id = (SELECT id FROM ngotable WHERE email = '".$email."') AND d_status = 'in progress'";
$pr_result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($pr_result);


$sql2 = "SELECT * FROM donation WHERE id = (SELECT id FROM ngotable WHERE email = '".$email."') AND d_status = 'Accomplished'";
$pr_result1 = mysqli_query($con, $sql2);
$total_record1 = mysqli_num_rows($pr_result1);


$sql3 = "SELECT d_raised FROM donation WHERE id = (SELECT id FROM ngotable WHERE email = '".$email."')";
$result3 = $conn->query($sql3);
$sum=0;
if($result3){
    while ($row = $result3->fetch_assoc()) {
        $amount = $row['d_raised'];
        $sum += $amount; // Add amount to sum variable
    }

}

?>

<section class="home">
<section class="dashboard">
        <div class="dash-content">
            <div class="overview">
               
                <p class="text p-2 text-center"><i class="bx bx-bar-chart-alt-2"></i> Dashboard</p>
                <div class="boxes">
                    <div class="box box1 col=md-3">
                    <i class='bx bx-donate-heart icon'></i>
                        <span class="text">Active Donations</span>
                        <span class="number"><?php echo $total_record;?></span>
                    </div>
                    <div class="box box2 col=md-3">
                    <i class='bx bx-check-double icon'></i>
                        <span class="text">Completed Donations</span>
                        <span class="number"><?php echo $total_record1;?></span>
                    </div>
                    <div class="box box3 col=md-3">
                    <i class="bx bx-money"></i>
                        <span class="text">Total Money Raised</span>
                        <span class="number"><?php echo $sum; ?> /-</span>
                    </div>

                   
                    
                </div>
            </div>


        <div style="width:70%; margin:50px auto">
        <p class="text p-2 text-center">Current Transactions</p>
<?php
   $sql = "SELECT t.*, DATE(t.t_date) AS transaction_date, TIME(t.t_date) AS transaction_time, u.name as dname, n.name, d.*
   FROM transaction t
   JOIN usertable u ON t.id = u.id
   JOIN donation d ON t.d_id = d.d_id
   JOIN ngotable n ON d.id = n.id 
   WHERE n.id = (SELECT id FROM ngotable WHERE email = '".$email."')
   ORDER BY t.t_date DESC
   LIMIT 4";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<table class="table">
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
       $sno=1;
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

   <a class="viewmore" href="transaction.php">Viewmore</a>

</div>
<?php
}else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}


?>
    </section>

    

</section>
