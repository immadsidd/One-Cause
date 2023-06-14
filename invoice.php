<?php
include('header.php');
if(isset($_SESSION['is_Login'])){
    $email = $_SESSION['email'];}
?>

<style>
    .container_invoice{
        background-color:white;
        width: 30%;
        margin: 190px auto;
        padding: 20px;
        text-align: center;
        background-color: #fff;
        border-top:2.5px dashed black ;
        border-bottom:2.5px dashed black ;
        box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.2), 0 1px 5px 0 rgba(0, 0, 0, 0.12);
        margin-bottom:50px;
    }
    .flex1{
        display: flex;
        justify-content: space-between;
        padding: 2px 5px;
        width: 80%;
        margin: auto;
        align-items: center;
    }
    
    .rightbox{
        text-align: right;
        line-height: 5px;
        font-size: 18px;
    }
    .flex2{
        align-items: center;
        display: flex;
        justify-content: center;
        width: 100%;
        background-color: #f7f6f9;
        border-radius: 10px;
    }
    .simg{
        width: 80px;
        height: 30px;
        margin-left: 10px;
    }
    .hr-container {
  display: flex;
  justify-content: center;
}

.centered-hr {
  width: 90%;
}

    .left_n{
        color: #828385;
        font-size: 20px;
    }
   
    .container_button {
  display: flex;
  justify-content: center;
  align-items: center;
}

.download {
  padding: 15px 40px;
  border-radius:8px;
  font-size: 18px;
  background: #1B4A56;
  color: #fff;
  border: none;
  cursor: pointer;
}

.hover-effect {
  transition: 0.3s;
}

.hover-effect:hover {
  background-color: #14798F;
}

    @media (max-width: 1000px) {
          
            .rightbox{
        text-align: right;
        line-height: 5px;
        font-size: 14px;
    }
    .left_n{
        color: #828385;
        font-size: 16px;
    }
        }
        @media (min-width: 1000px) and (max-width: 1400px) {
            .rightbox {
                text-align: right;
                line-height: 5px;
                font-size: 18px;
            }
            .left {
                color: #828385;
                font-size: 16px;
            }
        }
</style>

<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script>
 function saveDivAsImage() {
  // Get the div element
  var div = document.getElementById('container_invoice');

  // Use html2canvas to capture the div as an image
  html2canvas(div).then(function(canvas) {
    // Convert the canvas to a base64-encoded JPEG image
    var imageData = canvas.toDataURL('image/jpeg');

    // Create a temporary anchor element
    var link = document.createElement('a');
    link.href = imageData;
    link.download = 'donation_receipt.jpeg';
    link.style.display = 'none';

    // Append the anchor element to the document body
    document.body.appendChild(link);

    // Simulate a click event to trigger the download
    link.click();

    // Remove the anchor element from the document body
    document.body.removeChild(link);
  });
}
</script>
<div class="container_invoice" id="container_invoice" >
        <h2>Transaction Successful</h2>
        <p style="color: rgb(78, 73, 73);">TID: TC-<?php echo $_POST['id']; ?></p>
        <P style="color: #828385;">On <?php echo $_POST['date']; ?>, at <?php echo $_POST['time']; ?></P>
        <div class="hr-container">
  <hr class="centered-hr">
</div>

        <h2>Rs. <?php echo $_POST['amount']; ?>.</h2>
        <div class="hr-container">
  <hr class="centered-hr">
</div>

        <div class="flex1">
            <p class="left_n">To</p>
            <div class="rightbox">
                <p><?php echo  htmlspecialchars($_POST['to']); ?></p>
                <p><?php echo $_POST['number']; ?></p>
            </div>
        </div>
        <div class="hr-container">
  <hr class="centered-hr">
</div>
        <div class="flex1">
            <p class="left_n">For</p>
            <div class="rightbox">
                <p><?php echo $_POST['cause']; ?></p>
            </div>
        </div>
        <div class="hr-container">
  <hr class="centered-hr">
</div>
        <div class="flex1">
            <p class="left_n">From</p>
            <div class="rightbox">
                <?php $sql="SELECT name FROM usertable WHERE email = '".$email."'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                ?>
                <p style="text-transform:capitalize;"><?php echo $row['name']; ?></p>
                <p style="font-size:14px;"><?php echo $email; ?></p>
            </div>
        </div><br>
        <div class="flex2">
            <p>Securely paid via</p>
            <img src="image/assets/stripe.png" class="simg"alt="">
        </div>
    </div>
    <div class="container_button">
  <button class="download hover-effect" onclick="saveDivAsImage()">Download</button>
</div>



<?php
include('bot.php');
include('footer.php');
?>