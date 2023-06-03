

<?php
session_start();
//error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
// $username=$_POST['username'];

// $password=md5($_POST['inputPassword']);

// $ret=mysqli_query($con,"SELECT id FROM tbladmin WHERE username='$username' and password='$password'");
// $num=mysqli_fetch_array($ret);


echo "Checking username and password...\n"; // Alert for the start of the code

$username = $_POST['username'];
echo "Username: $username\n"; // Alert for the username

$password = md5($_POST['inputPassword']);
echo "Hashed Password: $password\n"; // Alert for the hashed password

$query = "SELECT id FROM tbladmin WHERE username='$username' AND password='$password'";
echo "Executing query: $query\n"; // Alert for the query

$ret = mysqli_query($con, $query);
echo "Query executed\n"; // Alert for the query execution

$num = mysqli_fetch_array($ret);
echo "Number of rows fetched: " . count($num) . "\n"; // Alert for the fetched rows

if($num>0)
{
$_SESSION['alogin']=$_POST['username'];
$_SESSION['aid']=$num['id'];
header("location:welcome.php");
}else{
echo "<script>alert('Invalid username or password');</script>";
//header("location:index.php");
}
}
?>





<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Fav Icon -->
<link rel="shortcut icon" href="favicon.ico">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.min.css">
<link href="css/all.css" rel="stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="css/switcher.css"> -->
<link rel="stylesheet" href="rs-plugin/css/settings.css">
<!-- Jquery Fancybox CSS -->
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.min.css" media="screen" />
<link href="css/animate.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet"  id="colors">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<title>International School System</title>
</head>
<body>

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
        
      
        
        <div class="contact-form loginWrp">
          <h3>Admin Login </h3>
         
          <form id="contactForm" novalidate="" method="post">
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                <!-- <label for="username">Username</label> -->
                <input class="form-control" id="username" name="username" type="text" placeholder="Username" required />
                                                
                                            </div>
                                          
                                               
                  <!-- <input type="email" name="email" class="form-control" placeholder="Email"> -->
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                <!-- <label for="inputPassword">Password</label> -->
                <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Password" required />
                                               
                </div>
              </div>
              <div class="col-lg-12 col-md-12">
                <div class="form-group">
                  <button type="submit" class="default-btn btn send_btn"> Log in to my account <span></span></button>
                </div>
                <div class="form-group">
                  <!-- <div class="forgot_password"><a href="#">Reset My Password</a></div> -->
                </div>
              </div>
            
          </form>
        </div>
      </div>
    </div>
    <!-- Login End --> 
    
  </div>
</div>





<!-- Inner Content Start --> 

<!--Newsletter Start-->

<!--Newsletter End--> 

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