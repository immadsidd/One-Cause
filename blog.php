<?php
include('header.php');
?>

<div style="position: relative;">
  <img style="margin-top: 95px;" src="image/assets/blog.png" class="home_image">
  <div class="overlay_blog">
    <h1 class="text_cause">All Blogs</h1>
  </div>
</div>

<div class="con_blog">
  <h1 class="text-center">Latest news & articles</h1><br><br>
  <div class="container">
  <div class="row">
  <?php
        $sql = "SELECT *, SUBSTRING_INDEX(b_content, '.', 1) AS truncated_content FROM blog";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo  '<div class="col-md-4">
              <div class="blog-card blog-card-blog">
                <div class="blog-card-image">
                  <a href="#"> <img class="img" src="'.str_replace('..','.',$row['b_img']).'"> </a>
                  <div class="ripple-cont"></div>
                </div>
                <div class="blog-table">
                  <h6 class="blog-category blog-text-success"><i class="bx bx-news"></i> News</h6>
                  <h4 class="blog-card-caption">
                    '.$row['b_title'].'
                  </h4>
                  <div class="blog_para">'.$row['truncated_content'].'... </div>
                  <div class="ftr">
                    <div class="author">
                      <a href="blogpage.php?id='.$row['b_id'].'" >
                        <span>Read More</span> <span>&rarr;</span></a>
                    </div>
                    <div class="stats"> <i class="far fa-clock"></i>'.$row['b_date'].'</div>
                  </div>
                </div>
              </div>
            </div>';

          }
        }
    ?>

  </div>
</div>
</div>


<?php
include('bot.php');
include('footer.php');
?>