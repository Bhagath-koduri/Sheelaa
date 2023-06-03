

<!--Header Start-->
<div class="header-wrap">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-md-12 navbar-light">
        <div class="logo"> <a href="index.php"><img alt="" class="logo-default" src="images/logo.png"></a></div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="navigation-wrap" id="filters">
          <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#">Menu</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>
              <ul class="navbar-nav mr-auto">
                <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="classes.php">Classes</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="classes.php">Classes</a></li>
                    <li><a href="classes-details.php">Classes Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="teachers.php">Teachers</a>
                  <ul class="submenu">
                    <li><a href="teachers.php">Teachers</a></li>
                    <li><a href="teachers-details.php">Teachers Details</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="#.">Pages</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="about.php">About Us</a></li>
                    
                    <li><a href="teachers.php">Our Teachers</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Register</a></li>
                    <li><a href="pricing.php">Our Pricing</a></li>
                    <li><a href="faqs.php">Faqs</a></li>
                    <li><a href="testimonials.php">Testimonials</a></li>
                    <li><a href="typography.php">Typography</a></li>
                    <li><a href="404.php">404</a></li>
                  </ul>
                </li>
                <li class="nav-item"><a class="nav-link" href="blog.php">Blog</a> <i class="fas fa-caret-down"></i>
                  <ul class="submenu">
                    <li><a href="blog.php">Blog</a></li>
                    <li><a href="blog-grid.php">Blog Grid Sidebar</a></li>
                    <li><a href="blog-list.php">Blog List sidebar</a></li>
                    <li><a href="blog-details.php">Blog Details</a></li>
                  </ul>
                </li>

                <li class="nav-item"><a class="nav-link" >
                                                    
                                   <?php if(isset($_SESSION['USER_LOGIN']))
                                   {
                                    ?>
                                    Hi <?php echo $_SESSION['USER_NAME']?>
                                <li class="currency"><a href="#">Hi <?php echo $_SESSION['USER_NAME']?> <i class="ion-chevron-down"></i></a>
                                        <ul class="submenu">
                                          <li><a href="my-account.php">My Account</a></li>
                                            <li><a href="logout.php">Logout</a></li> 
                                        </ul>
                                    </li>
                                   <!-- <li><a href="cart.php">Shopping Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li> -->
                                    <?php
                                }else
                                {

                                ?>
                                <ul>
                                 <!-- <li><a href="login_signup.php">Sign Up/Sign In</a></li> -->
                                <!--<li><a href="login_signup.php">Sign In</a></li>-->
                                <!-- <li><a href="cart.php">Shopping Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li> -->
                                 </ul>
                                <?php
                                }
                                ?>
                                
                              </a></li>
                <li class="nav-item"><a class="nav-link" href="contact.php">
                  
                Contact Us</a></li>
                
              </ul>
            </div>
          </nav>
        </div>
      </div>
      



      <div class="col-lg-3">
      <div class="header_account">
                           
                        </div>
                        <div class="header_top_links">
                             <ul>
                                    
                                   <?php if(isset($_SESSION['USER_LOGIN']))
                                   {
                                    ?>
                                    Hi <?php echo $_SESSION['USER_NAME']?>
                                <li ><a href="#">Hi <?php echo $_SESSION['USER_NAME']?> <i class="ion-chevron-down"></i></a>
                                        <ul >
                                          <li><a href="my-account.php">My Account</a></li>
                                            <li><a href="logout.php">Logout</a></li> 
                                        </ul>
                                    </li>
                                   <!-- <li><a href="cart.php">Shopping Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li> -->
                                    <?php
                                }else
                                {

                                ?>
                                <ul>
                                 <!-- <li><a href="login_signup.php">Sign Up/Sign In</a></li> -->
                                <!--<li><a href="login_signup.php">Sign In</a></li>-->
                                <!-- <li><a href="cart.php">Shopping Cart</a></li>
                                <li><a href="checkout.php">Checkout</a></li> -->
                                 </ul>
                                <?php
                                }
                                ?>
                                </ul>
                        </div>
        <div class="header_info">
          <div class="search"><a href="#"><i class="fas fa-search"></i></a></div>
          <div class="loginwrp"><a href="login.php">Login/Register</a></div>
        </div>
      </div>
      


      


    </div>
  </div>
</div>
<!--Header End--> 
