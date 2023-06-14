<?php
include('header.php');
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $sql = "SELECT blog.*, ngotable.name  FROM blog JOIN ngotable ON blog.id = ngotable.id WHERE blog.b_id = '$id'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
        $row= $result->fetch_assoc();
        $BLOG_TITLE= $row['b_title'];
        $BLOG_CONTENT=$row['b_content'];
        $BLOG_DATE=$row['b_date'];
        $BLOG_IMG=$row['b_img'];
        $BLOG_AUTHOR=$row['name'];
    }}
?>

<main>
<div class="triangle"></div>
<div class="triangle-2"></div>
<div class="triangle-3"></div><br><br>
<div class="container_blog">
 
  <article>
  <h1><?php echo $BLOG_TITLE ?></h1>
  <div class="metadata">
    <span class="author"><?php echo $BLOG_AUTHOR ?></span>
    <span class="date"><?php echo $BLOG_DATE; ?></span>
  </div>
  <img src="<?php echo str_replace('..', '.', $BLOG_IMG);?>"  class="blog_img"><br><br>
   <div><?php echo $BLOG_CONTENT; ?></div><br><br>
</article>
</div>
</main>



<?php
include('bot.php');
include('footer.php');
?>