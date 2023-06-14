<?php
include('header.php');

 // Set the error reporting to include fatal errors
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);

try {
  require_once "stripe-php-master/init.php";

  $stripeDetails = array(
      "secretKey" => "sk_test_51NGkFsB04oOr8KKDIp4GSru9a33eR5x50eT6lg4pms5mNhIUmtm8YMkJKFRoOZdqjIbxURK7rWzQkJueRdd86Lmh00yuh0O6jl",
      "publishableKey" => "pk_test_51NGkFsB04oOr8KKDpKbjLQrwcw5Ne7skNIJu7u34LoT5XczQy6sde1D5j0ERqYDThoVswYAGcjVuRN4eCvAu8W0000iIqZO0gN"
  );

\Stripe\Stripe::setApiKey($stripeDetails["secretKey"]);
$token = $_POST["stripeToken"];
$token_card_type = $_POST["stripeTokenType"];
$email           = $_POST["stripeEmail"];
$amount          = $_POST["amount"]; 
$d_id            = $_POST["d_id"]; 
$desc            = $_SESSION['D_TITLE'];
$raise           = $_POST["raised"];
$charge = \Stripe\Charge::create([
"amount" => $amount* 100,
"currency" => 'pkr',
"description"=>$desc,
"source"=> $token,
]);
if(isset($_SESSION['is_Login'])){
  $email = $_SESSION['email'];
}
// database transaction
$sql = "INSERT INTO transaction (t_date, t_amount, d_id, id) VALUES (CURRENT_TIMESTAMP(), '$amount', '$d_id', (SELECT id FROM usertable WHERE email='$email'))";

if ($conn->query($sql) == true) {
  $new_raise = intval($raise) + intval($amount);
  $sql = "UPDATE donation SET d_raised='$new_raise' WHERE d_id='$d_id'";
  $conn->query($sql);
}


if($charge){
  header("Location: success.php?amount=$amount&id=$d_id");

}
    throw new Exception("Your card was declined.");
} catch (Exception $e) {
    // Handle the exception/error
    $ResponseMessage = $e->getMessage();

    // Execute the code for the fatal error
    echo '<div style="margin:200px auto; width:50%; background-color:#C4D1D3; padding:50px; border-radius: 12px; min-height:300px;">';
    echo '<div>';
    echo '<h1 class="error"><i class="bx bx-error-circle"></i> Your Payment has Failed</h1><br>';
    echo '<p><b>Message: </b>' . $ResponseMessage . '</p>';
    echo '</div>';
    echo ' <a  href="home.php" class="goback btn-link">Back to Home</a>';
    echo '</div>';
}

?>

<style>
  .goback{
        
padding: 10px 20px;
border-radius: 7px;
border: none;
background-color: #1B4A56;
color: #f7f6f9;
font-size: 14px;
text-transform: capitalize;
cursor: pointer;
display: inline-block;
width: 150px;
text-decoration: none;
text-align:center;

    }

  </style>
<?php
include('bot.php');
include('footer.php');
?>