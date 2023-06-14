<?php
include('header.php');
?>
<div class="video">
  <video class="video3" playsinline autoplay muted loop>
    <source src="image/assets/cause.mp4">
  </video>
  <div class="overlay_cause">
    <h1 class="text_cause">All Causes</h1>
</div>
</div>

<div class="org_con">
<div class="header">
    <h1>We believe that we can save more lifes with you</h1>
</div><br>
<section class="org">
            <?php
        $sql =" SELECT * FROM ngotable ";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo  '<figure>
            <div class="box">
            <img src="'.str_replace('..','.',$row['image']).'">
            <div class="text-sec">
					<h5>'.$row['name'].'</h5>
					<p>
                   
					</p>
					<a href="causedetails.php?id='.$row['id'].'" >Visit <span>&rarr;</span></a>
				</div>
                </figure>';

          }
        }
    ?>
		</section>
        </div>


<?php
include('bot.php');
include('footer.php');
?>