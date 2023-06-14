<?php
include('header.php');
?>

<div class="con">
  <div class="image-container">
    <img src="image/assets/bg.png" class="home_image" alt="Background Image">
    <div class="text-overlay">
      <h1>Empowering Change through Transparent Donations</h1><br>
      <p>Welcome to One Cause, Pakistan's premier donation eCommerce website, where we empower non-profit organizations, NGOs, and welfare organizations to showcase their causes and make a lasting impact. With our transparent platform, donors can easily contribute to projects they care about, while organizations gain the support they need to create positive change. Together, let's make a difference and build a brighter future for our communities.</p><br>
      <div class="button-container">
        <?php
      if(isset($_SESSION['is_Login'])){
                        echo '
                        <a href="dashboard.php"><button class="donate-now-btn">DashBoard</button></a>';
                      }
      
                      else{
                        echo'<a href="user_login/login-user.php"><button class="get-started-btn">Get Started</button></a>';
                      }
              ?>
        <a href="donation.php"><button class="donate-now-btn">Donate Now</button></a>
      </div>
    </div>
  </div>
</div>


<!-- Service Start -->
<div class="home_div">
<div class="service">
  <div class="container">
    <div class="section-header text-center">
      <h4 class=" home_h4 text-center">What We Do?</h4>
      <h2>We believe that we can save more lives with you</h2><br><br>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="service-item">
          <div class="service-icon">
            <i class="fa fa-cutlery"></i>
          </div>
          <div class="service-text">
            <h3>Healthy Food</h3>
            <p>Promoting well-being through nutritious and wholesome culinary delights</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-item">
          <div class="service-icon">
            <i class="fa fa-tint"></i>
          </div>
          <div class="service-text">
            <h3>Pure Water</h3>
            <p>Delivering pristine and refreshing water for a healthier and hydrated lifestyle.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-item">
          <div class="service-icon">
            <i class="fa fa-heartbeat"></i>
          </div>
          <div class="service-text">
            <h3>Health Care</h3>
            <p>Providing compassionate and comprehensive healthcare solutions to enhance the well-being of individuals</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-item">
          <div class="service-icon">
            <i class="fa fa-book"></i>
          </div>
          <div class="service-text">
            <h3>Primary Education</h3>
            <p>Empowering young minds through quality primary education for a brighter future</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-item">
          <div class="service-icon">
            <i class="fa fa-home"></i>
          </div>
          <div class="service-text">
            <h3>Residence Facilities</h3>
            <p>Providing comfortable and secure residence facilities that foster a nurturing and inclusive community for individuals and families</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="service-item">
          <div class="service-icon">
            <i class="fa fa-users"></i>
          </div>
          <div class="service-text">
            <h3>Social Care</h3>
            <p>Dedicated to enhancing the well-being and quality of life for individuals through comprehensive social care services</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Service End -->


<!-- Facts Start -->
<div class="home_div">
<div class="facts">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6">
        <div class="facts-item">
          <i class="fa fa-home"></i>
          <div class="facts-text">
            <h3 class="facts-plus" data-toggle="counter-up">150</h3>
            <p>Countries</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="facts-item">
          <i class="fa fa-heart"></i>
          <div class="facts-text">
            <h3 class="facts-plus" data-toggle="counter-up">400</h3>
            <p>Volunteers</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="facts-item">
          <i class="fa fa-smile-o"></i>
          <div class="facts-text">
            <h3 class="facts-dollar" data-toggle="counter-up">10000</h3>
            <p>Our Goal</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6">
        <div class="facts-item">
          <i class="fa fa-heartbeat"></i>
          <div class="facts-text">
            <h3 class="facts-dollar" data-toggle="counter-up">5000</h3>
            <p>Raised</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Facts End -->

        <script>
const counterUpElements = document.querySelectorAll('[data-toggle="counter-up"]');

const options = {
  threshold: 0.5, // Adjust the threshold as needed
};

const animateCounter = (element) => {
  const delay = 10;
  const time = 2000;
  
  let currentValue = 0;
  const targetValue = parseInt(element.textContent, 10);

  const increment = targetValue / (time / delay);

  const updateCounter = () => {
    currentValue += increment;
    element.textContent = Math.ceil(currentValue);

    if (currentValue < targetValue) {
      setTimeout(updateCounter, delay);
    } else {
      element.textContent = targetValue;
    }
  };

  updateCounter();
};

const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) {
      const counterElement = entry.target;
      animateCounter(counterElement);
      observer.unobserve(counterElement);
    }
  });
}, options);

counterUpElements.forEach((element) => {
  observer.observe(element);
});

            </script>
</div>


<!-- organization -->
<div class="home_div">
<h4 class=" home_h4 text-center">Popular Organizations</h4>
<h2 class="text-center">We can make a significant difference in the world</h2><br><br>
  <?php
    $sql ="SELECT * FROM ngotable limit 5";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      echo '<div class="home_flex">
';
      while ($row = $result->fetch_assoc()) {
        echo '<div>	<a href="causedetails.php?id='.$row['id'].'" ><div class="circle-container">
                <img src="'.str_replace('..','.',$row['image']).'" alt="Circle Image">
              </div></a>
              <p class="pp">'.$row['name'].'</p></div>
              ';
      }
      echo '</div>';
    }
  ?>
  <a style="text-decoration:none" href="causes.php"><button class="view-all-btn">View All</button></a>
</div>


<!-- popular causes -->
<div class="home_div">
<h4 class=" home_h4 text-center">Popular Causes</h4>
<h2 class="text-center">Let's know about charity causes around the world</h2><br><br>

<div class="products p1">
<div class=" cl1" style=" width:90%; overflow: hidden; ">
<?php
$sql = "SELECT donation.*, ngotable.image FROM donation JOIN ngotable ON donation.id = ngotable.id WHERE d_status = 'in progress' ORDER BY d_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="product">
      <div class="image">
          <img src="'.str_replace('..','.',$row['d_img']).'" class="im" alt="loading">
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
</div></div>
</div><br>
<a style="text-decoration:none" href="donation.php"><button class="view-all-btn ">View All</button></a>
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
<script>
      $('.cl1' ,).slick({
        speed: 500,
        slidesToShow: 3, // Adjust this value based on the width of the carousel and desired number of visible slides
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        responsive: [{
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        }, {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
          }
        }]
      });
  </script>

<!-- donation Start -->
<div class="home_div">
  <div class="facts_1">
    <div class="container">
      <div class="row">
        <div class="content">
          <h1><i class='bx bxs-donate-heart'></i> Let's donate to needy people for better lives</h1>
          <a href="donation.php"><button class="d_B">Donate Now</button></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- donation End -->

        <!-- Team Start -->
        <div class="home_div">
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <h4 class=" home_h4 text-center">Meet Our Team</h4>
                    <h2>Awesome guys behind the mission</h2>
                </div><br>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-4">
                        <div class="team-item t1">
                            <div class="team-img">
                                <img src="image/assets/immad.jpeg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Immad Siddiqui</h2>
                                <p>Founder & CEO</p>
                                <div class="team-social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook-f"></i></a>
                                    <a href=""><i class="fa fa-linkedin-square"></i></a>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="team-item t2">
                            <div class="team-img">
                                <img src="image/assets/shan.jpeg" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2>Muhammad Shah Shan</h2>
                                <p>Co-Founder</p>
                                <div class="team-social">
                                    <a href=""><i class="fa fa-twitter"></i></a>
                                    <a href=""><i class="fa fa-facebook-f"></i></a>
                                    <a href=""><i class="fa fa-linkedin-square"></i></a>
                                    <a href=""><i class="fa fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
        <!-- Team End -->


<!-- blog  -->
<div class="home_div">
<div class="con_blog">
  <h4 class=" home_h4 text-center">Our Blog</h4>
  <h2 class="text-center">Latest news & articles</h2><br><br>
  <div class="container">
  <div class="row">
  <?php
        $sql = "SELECT *, SUBSTRING_INDEX(b_content, '.', 1) AS truncated_content FROM blog ORDER BY b_date DESC LIMIT 3";
        $result=$conn->query($sql);
        if($result-> num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo  '<div class="col-md-4">
              <div class="blog-card blog-card-blog bc">
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
<a style="text-decoration:none" href="blog.php"><button class="view-all-btn">View All</button></a>
</div>

<!-- testimonials -->
<?php
$sql = "SELECT feedback.*, usertable.name FROM feedback JOIN usertable ON feedback.id = usertable.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>

  <div class="home_div">
    <div class="wrapper">
      <h4 class="home_h4 text-center">Testimonial</h4>
      <h2>What people are talking about our charity activities</h2><br>
      <div class="carousel">
          <?php while ($row = $result->fetch_assoc()) { ?>
            <div>
            <div class="card">
              <div class="card-header">
                <i class="fa fa-quote-left"></i>
              </div>
              <div class="card-body">
                <div class="card-content">
                  <div class="card-title"><?php echo $row['name']; ?></div>
                  <div class="card-text">
                    <p><?php echo $row['f_feed']; ?></p>
                  </div>
                </div>
              </div>
            </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  
<?php
}
?>
  <script>
    $(document).ready(function() {
      $('.carousel' ,).slick({
        speed: 500,
        slidesToShow: 3, // Adjust this value based on the width of the carousel and desired number of visible slides
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        responsive: [{
          breakpoint: 800,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          }
        }, {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1000,
          }
        }]
      });
    });
  </script>
<?php
include('bot.php');
include('footer.php');
?>