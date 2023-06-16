<?php
include('header.php');
if(!isset($_SESSION['is_Login'])){
    echo"<script>
    alert('Login into your account to donate');
    location.href='user_login/login-user.php'
    </script>";
    }

if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = "SELECT donation.*, ngotable.name  FROM donation JOIN ngotable ON donation.id = ngotable.id WHERE donation.d_id = '$id'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row= $result->fetch_assoc();
        $D_ID= $row['d_id'];
        $D_TITLE= $row['d_title'];
        $D_BY=$row['name'];
        $D_DATE=$row['d_date'];
        $D_DEADLINE=$row['d_deadline'];
        $D_IMG=$row['d_img'];
        $D_DESC=$row['d_desc'];
        $goal=$row['d_goal'];
        $raised=$row['d_raised'];
                // Store variables in session
                $_SESSION['D_ID'] = $D_ID;
                $_SESSION['D_TITLE'] = $D_TITLE;
                $_SESSION['D_BY'] = $D_BY;
                $_SESSION['D_DATE'] = $D_DATE;
                $_SESSION['D_DEADLINE'] = $D_DEADLINE;
                $_SESSION['D_IMG'] = $D_IMG;
                $_SESSION['D_DESC'] = $D_DESC;
                $_SESSION['goal'] = $goal;
                $_SESSION['raised'] = $raised;
    }}
    
?>


<div class="flex-box">
        <div class="left">
            <div class="big-img">
            <img src="<?php echo str_replace('..', '.',$_SESSION['D_IMG']);?>">
            </div><br>
            <div class="progress-container" style="width:65%">
        <div class="progress-bar">
          <div class="progress" ></div>
          <div class="progress-label">0%</div>
        </div>
        <div class="amounts" style="display:flex; justify-content:space-between;">
        <div>raised: <span class="raised-amount"><?php echo $_SESSION['raised']; ?></span> /-</div>
        <div>goal: <span class="goal-amount"><?php echo $_SESSION['goal']; ?></span>/-</div>
        </div>
      </div>
      <script>
// Get all the progress bar elements
var progressBars = document.querySelectorAll('.progress-bar');

// Update progress bar for each element
progressBars.forEach(function(progressBar) {
  var progress = progressBar.querySelector('.progress');
  var progressLabel = progressBar.querySelector('.progress-label');
  var raisedAmount = progressBar.nextElementSibling.querySelector('.raised-amount');
  var goalAmount = progressBar.nextElementSibling.querySelector('.goal-amount');

  var raised = parseFloat(raisedAmount.textContent.replace('Raised: ', ''));
  var goal = parseFloat(goalAmount.textContent.replace('Goal: ', ''));

  var progressValue = (raised / goal) * 100;

  progress.style.width = progressValue + '%';
  progressLabel.textContent = progressValue.toFixed(2) + '%';
});
</script>
        </div>

        <div class="right">
    <form  id="myForm" autocomplete="off" action="checkout-charge.php" method="POST">
        <div class="pname">Donation Cause: <?php echo $_SESSION['D_TITLE']; ?></div><br>

        <div class="quantity">
            <p class="f">Started On:</p>
            <P><?php echo $_SESSION['D_DATE']; ?></P>
        </div>

        <div class="quantity">
            <p class="f">Ends On:</p>
            <P><?php echo $_SESSION['D_DEADLINE']; ?></P>
        </div>
        <br>

        <div class="quantity">
            <p class="f">Donation To:</p>
            <P><?php echo $_SESSION['D_BY']; ?></P>
        </div> 
        <div class="options">
            <button onclick="updateAmount(150); return false;" <?php echo $_SESSION['goal'] - $_SESSION['raised'] < 150 ? 'disabled' : ''; ?>>150/-</button>
            <button onclick="updateAmount(500); return false;" <?php echo $_SESSION['goal'] - $_SESSION['raised'] < 500 ? 'disabled' : ''; ?>>500/-</button>
            <button onclick="updateAmount(1000); return false;" <?php echo $_SESSION['goal'] - $_SESSION['raised'] < 1000 ? 'disabled' : ''; ?>>1000/-</button>
        </div>

        <div class="price">
            <p>Amount:</p>
            <input type="number" name="amount" id="custom-amount" min="150" max="<?php echo $_SESSION['goal'] - $_SESSION['raised']; ?>"  value="150" oninput="validateAmount(this)">
        </div>
        <div class="btn-box">
            <button class="cart-btn" id="customButton" >Donate now</button>
        </div>
        <input type="hidden" id="d_id" name="d_id" value="<?php echo $_SESSION['D_ID']; ?>"/>
        <input type="hidden" id="raised" name="raised" value="<?php echo $_SESSION['raised']; ?>"/>
        <input type="hidden" id="stripeToken" name="stripeToken" />
        <input type="hidden" id="stripeEmail" name="stripeEmail" />
        <input type="hidden" id="stripeTokenType" name="stripeTokenType" />
    </form>


    <script src="https://checkout.stripe.com/checkout.js"></script>

<script>
  $(document).ready(function() {
    var handler = StripeCheckout.configure({
      key: 'pk_test_51NGkFsB04oOr8KKDpKbjLQrwcw5Ne7skNIJu7u34LoT5XczQy6sde1D5j0ERqYDThoVswYAGcjVuRN4eCvAu8W0000iIqZO0gN',
      image: '<?php echo str_replace('..', '.',$_SESSION['D_IMG']); ?>',
      token: function(token) {
        $("#stripeToken").val(token.id);
        $("#stripeEmail").val(token.email);
        $("#stripeTokenType").val(token.type);
        $("#myForm").submit();
      }
    });

    $('#customButton').on('click', function(e) {
      var amount = Math.floor($("#custom-amount").val() * 100);
      var displayAmount = parseFloat(Math.floor($("#custom-amount").val() * 100) / 100).toFixed(2);

      handler.open({
        name: '<?php echo $_SESSION['D_TITLE']?>',
        description: 'Donation Amount (PKR' + displayAmount + ')',
        currency: 'pkr',
        amount: amount,
        email: '<?php echo $_SESSION['email']?>',
      });

      e.preventDefault();
    });

    // Close Checkout on page navigation
    $(window).on('popstate', function() {
      handler.close();
    });
  });
</script>

<script>
  function validateAmount(input) {
    const maxAmount = <?php echo $_SESSION['goal'] - $_SESSION['raised']; ?>;
    const value = parseInt(input.value);
    if (value > maxAmount) {
      input.value = maxAmount;
    }
  }

  function updateAmount(value) {
    document.getElementById("custom-amount").value = value;
  }
</script>

</div>

    </div>




<?php
include('bot.php');
include('footer.php');
    
?>
