    <footer>
        <div class="footer-content">
            <h3>One Cause</h3>
            <p>Donate to make world a better place! Together, we can make a difference.</p>
            <ul class="socials">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                <li><a href="https://www.linkedin.com/company/one-cause-social-bridge/" target="blank"><i class="fa fa-linkedin-square"></i></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2023 One Cause. <span>All rights reserved</span></p>
        </div>
        <?php
         if(!isset($_SESSION['is_Login'])){
            echo '<div class="footer-admin">
                    <p><button type="button" class="adb1" data-bs-toggle="modal" data-bs-target="#admin-login">admin-login</button></p>
                  </div>';}
        ?>
    </footer>


     <!--admin login page-->
 <div class="modal fade" id="admin-login" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Admin Login Area</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body admin">
      <div class="admin" id="ad">
            <form >
              <label for="email">E-mail</label>
              <input type="email" id="ademail" name="email" placeholder="Your Email..">
              <label for="password">Password</label>
              <input type="password" id="adpass" name="password" placeholder="Your password..">
              <input type="button" value="Login" class="sub" onclick="adlogin()">
              <small id="admsg"></small>
            </form>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
 <!--admin login page end-->

 <script src="js/adminajaxreq.js"></script> 
 <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
 <script src="js/index5.js"></script> 
</body>
</html>