<?php
include('header.php');
if(isset($_GET['id'])){
  $id= $_GET['id'];
  $sql= "SELECT * FROM ngotable WHERE id ='$id'";
  $result = $conn->query($sql);
  if($result->num_rows == 1){
      $row= $result->fetch_assoc();
      $NGO_NAME= $row['name'];
      $NGO_BIO=$row['bio'];
      $NGO_IMG=$row['image'];
      $NGO_WEB=$row['web'];
      $NGO_FB=$row['fb'];
      $NGO_IG=$row['ig'];
      $NGO_MAIL=$row['mail'];
      $NGO_NUM=$row['num'];
  }}
?>

<section id="about-section">

<!-- about left  -->

<div class="about-left">
    <img src="<?php echo str_replace('..', '.', $NGO_IMG);?>">

</div>


<!-- about right  -->

<div class="about-right">

    <h4>Our Story</h4>

    <h1><?php echo $NGO_NAME; ?></h1>

    <p><?php echo $NGO_BIO; ?></p>

    <div class="address">
        <ul>
            <li>
                <span class="address-logo">
                    <i class="fa fa-paper-plane"></i>
                </span>
                <p>Website</p>
                <span class="saprater">:</span>
                <a href="<?php echo$NGO_WEB; ?>" target="blank"><?php echo$NGO_WEB; ?></a>
            </li>
            <li>
                <span class="address-logo">
                    <i class="fa fa-phone"></i>
                </span>
                <p>Phone No</p>
                <span class="saprater">:</span>
                <p><?php echo$NGO_NUM; ?></p>
            </li>
            <li>
                <span class="address-logo">
                    <i class="fa fa-envelope"></i>
                </span>
                <p>Email ID</p>
                <span class="saprater">:</span>
                <p><?php echo$NGO_MAIL; ?></p>
            </li>
            <li>
                <span class="address-logo">
                    <i class="fa fa-facebook"></i>
                </span>
                <p>Facebook</p>
                <span class="saprater">:</span>
                <p><?php echo$NGO_FB; ?></p>
            </li>
            <li>
                <span class="address-logo">
                    <i class="fa fa-linkedin-square"></i>
                </span>
                <p>Instagram</p>
                <span class="saprater">:</span>
                <p><?php echo$NGO_IG; ?></p>
            </li>
        </ul>
    </div>
</div>
</section>

<?php
     if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql="SELECT * FROM gallery WHERE id='$id'";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){?>

<h2 class="p-2 text-center" style="	margin-top: 50px;">Image Gallery</h2>
<section class="gallery min-vh-100">

		<div class="container-lg">
			<div class="row gy-4 row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-md-4">
<?php
          while($row = $result->fetch_assoc()){
            echo  '<div class="col">
              <img src="'.str_replace('..','.',$row['gal_img']).'" class="gallery-item" alt="Gallery">
				</div>';
     }
    ?>
			</div>
		</div>
</section>
<?php
}}
    ?>
<!-- Modal -->
<div class="modal fade" id="gallery-popup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="images/1.jpg" class="modal-img" alt="Modal Image">
      </div>
    </div>
  </div>
</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

	<script type="text/javascript">
		document.addEventListener("click",function (e){
		  if(e.target.classList.contains("gallery-item")){
		  	  const src = e.target.getAttribute("src");
		  	  document.querySelector(".modal-img").src = src;
		  	  const myModal = new bootstrap.Modal(document.getElementById('gallery-popup'));
		  	  myModal.show();
		  }
		})
	</script>
                <?php
     if(isset($_GET['id'])){
        $id= $_GET['id'];
        $sql="SELECT * FROM donation WHERE id='$id' and d_status='in progress'";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){?>
<h2 class="p-2 text-center">Current Donations</h2>
<div class="slide-container swiper">
            <div class="slide-content">
                <div class="card-wrapper swiper-wrapper">
<?php
          while($row = $result->fetch_assoc()){
            echo  '
                <div class="card swiper-slide">
                <div class="image-content">
                    <span class="overlay"></span>
                    <div class="card-image">
                        <img src="'.str_replace('..','.',$row['d_img']).'" class="card-img" alt="loading...">
                    </div>
                </div>

                <div class="card-content text-center">
                    <h2 class="name">'.$row['d_title'].'</h2>
                    <p class="description">'.$row['d_desc'].'</p>
                    <p>Goal: '.$row['d_goal'].'/-</p>
                    <p>Raised: '.$row['d_raised'].'/-</p>
                    <a href="checkout.php?id='.$row['d_id'].'" style="text-decoration:none" class="button">Donate<a>
                </div>
            </div>';
     }
    ?>

                </div>
            </div>

            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
            <div class="swiper-pagination"></div>
        </div>
    <?php
}}
?>
            <!-- Swiper JS -->
    <script src="js/swiper-bundle.min.js"></script>

<!-- JavaScript -->
<script src="js/script.js"></script>

<?php
include('bot.php');
include('footer.php');
?>