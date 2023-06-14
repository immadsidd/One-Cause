<?php
include('header.php');
include('slidebar.php');
$sql3 = "SELECT t_amount  FROM transaction  WHERE id = (SELECT id FROM usertable WHERE email = '".$email."')";
$result3 = $conn->query($sql3);
$sum=0;
if($result3){
  $sno=0;
    while ($row = $result3->fetch_assoc()) {
      $sno++;
        $amount = $row['t_amount'];
        $sum += $amount; // Add amount to sum variable
    }

}
?>

<section class="home">
<div class="dash-content" style="margin-top:100px">
            <div class="overview">   
                <p class="text p-2 text-center"> Dashboard</p>
                <div class="boxes">
                    <div class="box box1">
                        <i class="uil uil-thumbs-up"></i>
                        <span class="text">donation involvement count</span>
                        <span class="number"><?php echo $sno;?> </span>
                    </div>

                    <div class="box box3">
                        <i class="uil uil-share"></i>
                        <span class="text">Total Amount Donated</span>
                        <span class="number"><?php echo $sum;?> /-</span>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="donor-section">

        <?php
         $sql = "SELECT * FROM usertable WHERE email='" . $_SESSION['email'] . "'";
        $result = $conn->query($sql);
        if ($result== true) {
          $row = $result->fetch_assoc();
          $name=$row['name'];
          $email=$row['email'];
          $status=$row['status'];
        } 
        ?>
  <div class="donor-info">
  <i class="bx bx-user icon"></i>
    <input type="text" id="donor-name" placeholder="Donor Name" value="<?php echo $name;?>" readonly>
  </div>
  <div class="donor-info">
    <i class="bx bx-envelope icon"></i>
    <input type="email" id="donor-email" placeholder="Donor Email" value="<?php echo $email;?>" readonly>
  </div>
  <div class="donor-info">
  <i class="bx bx-check-circle icon"></i>
    <input type="email" id="donor-email" placeholder="Donor Email" value="<?php echo $status;?>" readonly>
  </div>
</div>

</section>
</section>



<?php
include('bot.php');
include('footer.php');
?>