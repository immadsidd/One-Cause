<?php 
include_once('../dbconnection.php');
include('slidebar.php');
$sql = "SELECT * FROM ngotable";
$result = $conn->query($sql);
if ($result) {
    // Fetch the number of rows
    $row_count = $result->num_rows;
} else {
    echo "Query failed";
}

$sql2 = "SELECT * FROM usertable";
$result2 = $conn->query($sql2);
if ($result2) {
    // Fetch the number of rows
    $row_countuser = $result2->num_rows;
} else {
    echo "Query failed";
}

$sql3 = "SELECT d_raised  FROM donation";
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
                    <div class="box box1">
                    <i class="bx bx-building-house"></i>
                        <span class="text">Active Organizations</span>
                        <span class="number"><?php echo $row_count; ?></span>
                    </div>
                    <div class="box box2">
                    <i class="bx bx-user-circle"></i>
                        <span class="text">Active User</span>
                        <span class="number"><?php echo $row_countuser; ?></span>
                    </div>
                    <div class="box box3">
                        <i class="bx bx-money"></i>
                        <span class="text">Total Amount Raised</span>
                        <span class="number"><?php echo $sum; ?> /-</span>
                    </div>
                    
                </div>
            </div>

        </div>


<div class="d_flex">
  <div class="d_table">
    <p class="text p-2 text-center">Current Transactions</p>

      <?php
      $sql = "SELECT t.*, u.name as dname, n.name, d.*
      FROM transaction t
      JOIN usertable u ON t.id = u.id
      JOIN donation d ON t.d_id = d.d_id
      JOIN ngotable n ON d.id = n.id
      ORDER BY t.t_date DESC
      LIMIT 4";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
      ?>
      <table class="table" style="width:100%">
        <thead>
          <tr>
            <th scope="col">Sno</th>
            <th scope="col">Date</th>
            <th scope="col">Amount</th>
            <th scope="col">Donor</th>
            <th scope="col">Organization</th>
            <th scope="col">Cause</th>
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
      }
      ?>
      <a class="viewmore" href="transaction.php">View more</a>

  </div>


  <div class="d_chart">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="Chart" style="width:100%"></canvas>
  </div>

  <script>
    var config = {
      type: "bar",
      data: {
        labels: ["Users", "NGOs"],
        datasets: [
          {
            barPercentage: 0.3,
            label: "Number of active Users & Organizations",
            data: [<?php echo $row_countuser; ?>, <?php echo $row_count; ?>],
            backgroundColor: ["hsl(36, 95%, 59%,0.8)"],
          },
        ],
      },
    };

    var c = document.getElementById("Chart");
    var cookieChart = new Chart(c, config);
  </script>
</div>

    </section>
</section>