<?php
include('header.php');
?>

<div class="containerd" style="position: relative;">
  <img  src="image/assets/donation.png" class="home_image">
  <div class="overlay_blog">
  <h1 class="text_cause">All Donations</h1>
  </div>
</div><br><br><br>

<div class="header">
    <h1>Let's know about charity causes around the world</h1>
</div>

<div class="products">
<?php
$sql = "SELECT donation.*, ngotable.image FROM donation JOIN ngotable ON donation.id = ngotable.id WHERE d_status = 'in progress' ORDER BY d_id ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="product">
      <div class="image">
          <img src="'.str_replace('..','.',$row['d_img']).'" alt="loading">
          <img src="'.str_replace('..','.',$row['image']).'" class="org" alt="loading">
      </div><br>
      
      <div class="progress-container">
        <div class="progress-bar">
          <div class="progress"></div>
          <div class="progress-label">0%</div>
        </div>
        <div class="amounts">
        <div>raised: <span class="raised-amount">'.$row['d_raised'].'</span> /-</div>
        <div>goal: <span class="goal-amount">'.$row['d_goal'].'</span>/-</div>
        </div>
      </div><br>

      <div class="namePrice">
          <h3>'.$row['d_title'].'</h3>
      </div>
      <p>'.$row['d_desc'].'</p>
      <div class="bay">
      <a href="checkout.php?id='.$row['d_id'].'" ><button> Donate Now </button></a>
      </div>
    </div>';
  }
}
?>
</div>
</div>

<script>
// Function to start progress bar animation when in view
function startProgressBarAnimation(entries, observer) {
  entries.forEach(function(entry) {
    if (entry.isIntersecting) {
      var progress = entry.target.querySelector('.progress');
      var progressLabel = entry.target.querySelector('.progress-label');
      var raisedAmount = entry.target.nextElementSibling.querySelector('.raised-amount');
      var goalAmount = entry.target.nextElementSibling.querySelector('.goal-amount');

      var raised = parseFloat(raisedAmount.textContent);
      var goal = parseFloat(goalAmount.textContent);

      var progressValue = (raised / goal) * 100;

      progress.style.width = progressValue + '%';
      progressLabel.textContent = progressValue.toFixed(2) + '%';

      observer.unobserve(entry.target); // Stop observing once the progress bar animation is triggered
    }
  });
}

// Create an intersection observer
var progressBarObserver = new IntersectionObserver(startProgressBarAnimation, { threshold: 0.2 });

// Get all the progress bar elements
var progressBars = document.querySelectorAll('.progress-bar');

// Observe each progress bar element
progressBars.forEach(function(progressBar) {
  progressBarObserver.observe(progressBar);
});
</script>



<?php
include('bot.php');
include('footer.php');
?>