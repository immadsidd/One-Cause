<?php
include('header.php');
?>

    <style>
        .success-container {
            width:50%;
            margin:200px auto;  
            background-color:#C4D1D3; 
            padding:50px; 
            border-radius: 12px; 
            min-height:300px;
            text-align:center;

        }
        .video4{
            width: 70%;
        }
        .success-container .goback{
        
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
    transition:0.3s;

        }
    .goback:hover{
        transform: translateY(-5px)

    }

    </style>



      <div class="success-container">
        <?php
           if(isset($_GET["amount"]) && !empty($_GET["amount"])){
            $sql = "SELECT * FROM donation WHERE d_id = '{$_GET['id']}'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            if( $row['d_raised'] == $row['d_goal']){
                $sql = "UPDATE donation SET d_status='Accomplished' WHERE d_id='{$_GET['id']}'";
                $result = $conn->query($sql);                
            };
            ?>
            <h3>Thankyou for your Donation!</h3>
            <div >
                 <video class="video4" playsinline autoplay muted loop>
                       <source src="image/assets/success1.mp4">
                </video>
            </div>
            <a  href="home.php" class=" goback btn-link">Back to Home</a>
          <?php
           }
        ?>
      </div>  

      <?php
include('bot.php');
include('footer.php');
?>