<?php
include('header.php');
include('slidebar.php');
if(isset($_SESSION['is_Login'])){
    $email = $_SESSION['email'];}
?>

<section class="home">
<p class="historyp text p-2 text-center"> Transactions</p>
<div class="blog_con">
<?php
$num_per_page=8;

if(isset($_GET["page"]))
{
    $page=$_GET["page"];
}
else
{
    $page=1;
}

$start_from=($page-1)*8;
$sql ="SELECT * FROM transaction WHERE id=(SELECT id FROM usertable where email='".$email."')";
$pr_result = mysqli_query($con,$sql);
$total_record = mysqli_num_rows($pr_result );

$total_page = ceil($total_record/$num_per_page);
?>
<div class="pag text-center">
<?php
if($page>1)
{
    echo "<a href='history.php?page=".($page-1)."' class='btn' style='background-color:#faaa34;'>Previous</a> ";
}


for($i=1;$i<$total_page;$i++)
{
    echo "<a href='history.php?page=".$i."' class='btn b_page' style='background-color:#1B4A56; color:white;'>$i</a> ";
}

if($i>$page)
{
    echo "<a href='history.php?page=".$total_page."' class='btn b_page' style='background-color:#1B4A56; color:white;' >$total_page</a> ";
    echo "<a href='history.php?page=".($page+1)."' class='btn' style='background-color:#faaa34;'>Next</a> ";
}
?>
 </div><br>
<?php

 
$sql = "SELECT t.*, DATE(t.t_date) AS transaction_date, TIME(t.t_date) AS transaction_time, u.name as dname, n.name, n.num, d.d_title
        FROM transaction t
        JOIN usertable u ON t.id = u.id
        JOIN donation d ON t.d_id = d.d_id
        JOIN ngotable n ON d.id = n.id 
        WHERE t.id = (SELECT id FROM usertable WHERE email = '".$email."')
        ORDER BY t.t_date DESC limit $start_from,$num_per_page";

   

$sno = ($page - 1) * $num_per_page + 1;

$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<table class="table">
   <thead>
       <tr>
           <th scope='col'> Sno</th>
           <th scope='col'> Date</th>
           <th scope='col'> Time</th>
           <th scope='col'> To</th>
           <th scope='col'> Amount</th>
           <th scope='col'> Cause</th>
           <th scope='col'> Action</th>
       </tr>
   </thead>
   <tbody>
       <?php
       while ($row = $result->fetch_assoc()) {
           echo '<tr>';
           echo '<th scope="row">' . $sno++ . '</th>';
           echo '<td>' . $row['transaction_date'] . '</td>';
           echo '<td>' . $row['transaction_time'] . '</td>';
           echo '<td>' . $row['name'] . '</td>';
           echo '<td>' . $row['t_amount'] . '</td>';
           echo '<td>' . $row['d_title'] . '</td>';
           echo '<td><form action="invoice.php" method="POST" class="d-inline" >
           <input type="hidden" name="id" value='.$row["t_id"].'>
           <input type="hidden" name="date" value='.$row['transaction_date'].'>
           <input type="hidden" name="time" value='.$row['transaction_time'].'>
           <input type="hidden" name="to" value="'.$row['name'].'">
           <input type="hidden" name="amount" value='.$row['t_amount'].'>
           <input type="hidden" name="cause" value='. $row['d_title'] .'>
           <input type="hidden" name="number" value='. $row['num'] .'>
           <button
               type="submit" 
               class="btn mr-3"
               name="view"
               value="view"
               style="background-color:#1B4A56; color:white;"
               >view receipt
               </button>
           </form></td>';
           echo '</tr>';
       }
       ?>
   </tbody>
</table>
<?php
} else {
    echo '<div class="text-center" style="margin-top:50px; font-size: 20px"><b>0 results</b></div>';
}



    
    ?>

</div>
</section>



<?php
include('bot.php');
include('footer.php');
?>