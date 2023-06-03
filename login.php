

<?php include('head_links.php');?>
<body>
<?php include('header.php');
if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes')
{
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}
?>
<!-- Inner Heading Start -->
<div class="innerHeading-wrap">
  <div class="container">
    <h1>Login</h1>
  </div>
</div>
<!-- Inner Heading End --> 

<!-- Inner Content Start -->
<div class="innerContent-wrap">
  <div class="container"> 
    
    <!-- Logn Start -->
    <div class="login-wrap ">
      <div class="contact-info login_box">
        <h3>New Customers</h3>
        <p>If you don't have an account, please proceed by clicking the following button to continue first-time registration.</p>
        <div class="form-group">
          <button type="submit" class="default-btn btn send_btn">Create Account <span></span></button>
        </div>
        <div class="contact-form loginWrp">
          <h3>Login Customers</h3>
        
          <form id="login-form" method="post" >
          <div class="row">
          <div class="col-lg-12 col-md-12">
                <div class="form-group">
                <input type="email" class="form-control"  name="login_email" id="login_email">
                      <span class="field_error" id="login_email_error"></span>
                 
                </div>
              </div>   
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                <input type="password" class="form-control" name="login_password" id="login_password" >
                <span class="field_error" id="login_password_error"></span>
                </div>
              </div>   
                      <p> <small><a href="forgot_password.php">Forgot Password?</a></small>
                       </p>   
                                                  <!-- <div><p style="font-weight: bold;">New User ? <a href="signup.php" style="color:blue;">Click here to Register</a></p></div> -->
                        
                           

          
            
             
              
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                      <!--  <label for="remember"> 
                                    <input id="remember" type="checkbox">Remember me
                                   </label> -->
                  <button type="submit"  name="login" id="login"  class="default-btn btn send_btn"> Log in to my account <span></span></button>
                  
                </div>
                <!-- <div class="form-group">
                  <div class="forgot_password"><a href="#">Reset My Password</a></div>
                </div> -->
              </div>
            </div>  
            </form> 
            </div>
          
        </div>
      </div>
    </div>
    <!-- Login End --> 
    
  </div>
</div>
<!-- Inner Content Start --> 



<?php
require('config.php');
//require('functions.inc.php');
if(isset($_POST['login']))
{

$login_email = $_POST['login_email'];
$login_password = md5($_POST['login_password']);

// echo $login_password;
// echo $login_email;
$res=mysqli_query($con,"select * from users where email='$login_email' and password='$login_password'");

$check_user=mysqli_num_rows($res);

if($check_user >0){
    session_start();
	$row=mysqli_fetch_assoc($res);
	
	$_SESSION['USER_LOGIN']='yes';

    
    $_SESSION['USER_ID']=$row['id'];
	$_SESSION['USER_NAME']=$row['name'];
	
	$_SESSION['USER_MOBILE']=$row['contactno']; 
	$_SESSION['USER_CONTACTNO']=$row['contactno']; 
    $_SESSION['USER_EMAIL']=$login_email;
    
	echo '<script>alert("You are Succesfully logged in.");</script>';
	echo "<script>window.location.href = 'index.php';</script>";
	//echo "valid";
	
}else{
	
	//echo "wrong";
	echo '<script>alert("Invalid Credentials.");</script>';
}
}
?>



<!--Newsletter Start-->
<div class="newsletter-wrap ">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class="title">
          <h1>Newsletter</h1>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur.</p>
      </div>
      <div class="col-lg-6">
        <div class="news-info">
          <form>
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Email Address">
              <div class="form_icon"><i class="fas fa-envelope"></i></div>
            </div>
            <button class="sigup">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Newsletter End--> 

<!-- Footer Start -->
<div class="footer-wrap">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="footer_logo"><img alt="" class="footer-default" src="images/logo.png"></div>
        <p>Lorem ipsum dolor sit amet, adipiscing elit. Sed tempor, urna eu scelerisque maximus, urna nibh semper lectus, ut interdum nunc ligula et magna. In ac mauris vehicula, vulputate sem at, placerat nisl. Etiam laoreet erat magna, at hendrerit lorem vulputate non. Nam facilisis congue convallis.</p>
      </div>
      <div class="col-lg-2 col-md-3">
        <h3>Quick links</h3>
        <ul class="footer-links">
          <li> <a href="index.php">Home</a></li>
          <li> <a href="about.php">About</a></li>
          <li> <a href="classes.php">Classes</a></li>
          <li> <a href="teachers.php">Teachers</a></li>
          <li> <a href="testimonials.php">Testimonials</a></li>
          <li> <a href="blog.php">Blog</a></li>
          <li> <a href="contact.php">Contact Us</a></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4">
        <h3>Opening Hours</h3>
        <ul class="unorderList hourswrp">
          <li>Monday <span>08:00 - 02:00</span></li>
          <li>Tuesday <span>08:00 - 02:00</span></li>
          <li>Wednesday <span>08:00 - 02:00</span></li>
          <li>Thursday <span>08:00 - 02:00</span></li>
          <li>Friday <span>08:00 - 02:00</span></li>
          <li>Saturday <span>08:00 - 02:00</span></li>
          <li>Sunday <span>Closed</span></li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-4">
        <div class="footer_info">
          <h3>Get in Touch</h3>
          <ul class="footer-adress">
            <li class="footer_address"> <i class="fas fa-map-signs"></i> <span>123 Lorem Ipsum, 32 sit Atlanta</span> </li>
            <li class="footer_email"> <i class="fas fa-envelope" aria-hidden="true"></i> <span><a href="mailto:info@example.com"> info@example.com </a></span> </li>
            <li class="footer_phone"> <i class="fas fa-phone-alt"></i> <span><a href="tel:7704282433"> 770-123-4567</a></span> </li>
          </ul>
          <div class="social-icons footer_icon">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
              <li><a href="#"><i class="fab fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End --> 

<!--Copyright Start-->
<div class="footer-bottom text-center">
  <div class="container">
    <div class="copyright-text">Copyright © International School System 2020. All Rights Reserved</div>
  </div>
</div>
<!--Copyright End--> 

<!-- Js --> 
<script src="js/jquery.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
<script src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script> 
<!-- Jquery Fancybox --> 
<script src="js/jquery.fancybox.min.js"></script> 
<!-- Animate js --> 
<script src="js/animate.js"></script> 
<script>
  new WOW().init();
</script> 
<!-- WOW file --> 
<script src="js/wow.js"></script> 
<!-- general script file --> 
<script src="js/owl.carousel.js"></script> 
<script src="js/script.js"></script>
</body>
</html>