<?php 
require('config.php');
require('header.php');


require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
require 'PHPMailer-master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


if(isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN']=='yes'){
    ?>
    <script>
    window.location.href='index.php';
    </script>
    <?php
}


 // Declare the variables as global
global  $name, $email, $contactno, $password,$to,$from,$body,$subject,$website_name,$website_url;
global $Message;

// Define $mail_admin and $mail_user as global variables
global $mail_admin, $mail_user;

// Create $mail_admin and $mail_user objects
$mail_admin = new PHPMailer(true);
$mail_user = new PHPMailer(true);




if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$contactno=$_POST['contactnumber'];
$password=md5($_POST['inputuserpwd']);
$sql=mysqli_query($con,"select id from users where email='$email'");
$count=mysqli_num_rows($sql);
if($count==0){
$query=mysqli_query($con,"insert into users(name,email,contactno,password) values('$name','$email','$contactno','$password')");
if($query)
{
    
       // $mail_user = new PHPMailer(true);

    try {
        // SMTP Configuration for Gmail
        $mail_user->isSMTP();
        $mail_user->Host = 'smtp.titan.email';
        $mail_user->Port = 465;
        $mail_user->SMTPAuth = true;
        $mail_user->SMTPSecure = 'ssl';
        $mail_user->Username = 'bhagath.koduri@iiiqbets.com';
        $mail_user->Password = 'Bhagath@123$';
        
        // Email Content
         $website_name = "Grameen E-commerce";
         $website_url = "https://iiiqbets.com/iiiqbets_E_commerce";
        
      
        // Your email sending code here
        $to = $email;
        $from = "bhagath.koduri@iiiqbets.com";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "From: Grameen E-commerce <" . $from . ">" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";

        
                       $subject  = "Your Registration completed succesfully for $website_name - $website_url";
                        $body = "Dear $name,\n\n";
                        $body .= "Thank you for registering on $website_name . We are glad to have you as a member of our community. Our team is here to serve you and provide assistance whenever needed.\n\n";
                        
                        $body .= "Your Registered Details for $website_name : \n\n";
                        $body .= "Name: $name \n";
                        $body .= "Contact No: $contactno \n";
                        $body .= "Email: $email\n\n";
                        
                        //$body .= "Please login using the  link: \n\n";
                        $body .= 'Please <a href="https://iiiqbets.com/iiiqbets_E_commerce/login.php">click here</a> to login.';

                       // $body .= "https://iiiqbets.com/iiiqbets_E_commerce/login.php\n\n";
                        
                        $body .= "If you have any questions or need any help, please feel free to contact us. We look forward to providing you with a great experience on $website_name($website_url).\n\n";
                        $body .= "Best regards,\n";
                        $body .= "The $website_name Team";

                       
                        
                        
        // Sender and recipient details
        $mail_user->setFrom('bhagath.koduri@iiiqbets.com', 'Grameen E-Commerce');
        $mail_user->addAddress($to, $name);

        // Email content
        $mail_user->isHTML(true);
        $mail_user->Subject = $subject ;
        $mail_user->Body = $body;
                  
                  
        // Send the email
        if ($mail_user->send()) {
            
               // Create a new $mail_admin variable for sending email to admin
    //$mail_admin = new PHPMailer(true);
           
        $mail_admin->isSMTP();
                    $mail_admin->Host = 'smtp.titan.email';
                    $mail_admin->Port = 465;
                    $mail_admin->SMTPAuth = true;
                    $mail_admin->SMTPSecure = 'ssl';
                    $mail_admin->Username = 'bhagath.koduri@iiiqbets.com';
                    $mail_admin->Password = 'Bhagath@123$';

                    
                       $subject  = "New User Registration completed succesfully - $website_name";
                    //   $body .= "Dear Admin:\n\n";
                    //     $body .= "New User Registered Details for $website_name : \n\n";
                    //     $body = "User Name: $name,\n\n";
                    //     $body .= "Contact No: $contactno \n";
                    //     $body .= "Email: $email\n\n";
                    //     $body .= "Best regards,\n";
                    //   $body .= "The $website_name Team";
$body = "<html>";
$body .= "<head></head>";
$body .= "<body>";
$body .= "<p>Dear Admin,</p>";
$body .= "<p>New User Registered Details for $website_name:</p>";
$body .= "<table style='border-collapse: collapse;'>";
$body .= "<tr><td style='padding: 5px; border: 1px solid black;'>User Name:</td><td style='padding: 5px; border: 1px solid black;'>$name</td></tr>";
$body .= "<tr><td style='padding: 5px; border: 1px solid black;'>Contact No:</td><td style='padding: 5px; border: 1px solid black;'>$contactno</td></tr>";
$body .= "<tr><td style='padding: 5px; border: 1px solid black;'>Email:</td><td style='padding: 5px; border: 1px solid black;'>$email</td></tr>";
$body .= "</table>";
$body .= "<p>Best regards,<br>The $website_name Team</p>";
$body .= "</body>";
$body .= "</html>";

        
        
             // Sender and recipient details
        $mail_admin->setFrom('bhagath.koduri@iiiqbets.com', 'Grameen E-Commerce');
        $mail_admin->addAddress("manjuprasad@iiiqbets.com", 'Admin');
        //$mail_user->addAddress("ssy.balu@gmail.com", Admin);
        
        // Email content
        $mail_admin->isHTML(true);
        $mail_admin->Subject = $subject ;
        $mail_admin->Body = $body;
        
            if ($mail_admin->send()) {    
           
            echo "<script>alert('You are successfully registered for Grameen E-commerce');</script>";
                echo "<script type='text/javascript'> document.location ='login.php'; </script>";
            }
           
        }
        else
{
echo "<script>alert('Email sending failed: " . $mail_user->ErrorInfo . "');</script>";
echo "<script type='text/javascript'> document.location ='signup.php'; </script>";
 
} 
   
        
        
    } 
    catch (Exception $e) {
       echo "<script>alert('Email sending failed: " . $mail_user->ErrorInfo . "');</script>";
echo "<script type='text/javascript'> document.location ='signup.php'; </script>";

       
    }
}
else
{
 echo "<script>alert('Email id already registered with another accout. Please try  with another email id.');</script>";
    echo "<script type='text/javascript'> document.location ='signup.php'; </script>";   
}    
                
   
}
 
} 


?>


<style>

    #Numbererror {
        font-size: 20px;
    }
    .error{
        color:red;
    }
</style>
<body>
 <!--breadcrumbs area start-->
    <div class="breadcrumbs_area">
        <div class="container">   
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb_content">
                        <ul>
                            <li><a href="index.php">home</a></li>
                            <li>My account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>         
    </div>
    <!--breadcrumbs area end-->
    

    <section class="py-5">
            <div class="container px-4  mt-5">
     

<form method="post" name="signup">
     <div class="row">
         <div class="col-2">Full Name</div>
         <div class="col-6"><input type="text" name="fullname" class="form-control" required ></div>
     </div>
       <div class="row mt-3">
         <div class="col-2">Email Id</div>
         <div class="col-6"><input type="email" name="emailid" id="emailid" class="form-control" onBlur="emailAvailability()" required>
 <span id="user-email-status" style="font-size:12px;"></span>
         </div>
          
     </div>

       <div class="row mt-3">
         <div class="col-2">Contact Number</div>
         <div class="col-6"><input type="text" name="contactnumber" pattern="[0-9]{10}" title="10 numeric characters only" class="form-control" required></div>
     </div>

          <div class="row mt-3">
         <div class="col-2">Password</div>
         <div class="col-6"><input type="password" name="inputuserpwd" class="form-control" required></div>
     </div>

               <div class="row mt-3">
                 <div class="col-4">&nbsp;</div>
         <div class="col-6"><input type="submit" name="submit" id="submit" class="btn btn-primary" required></div>
     </div>
 </form>
              
            </div>

 
</div>
        </section> 







   
<script>
  // Redirect to forgot_password.php when the "Forgot Password?" link is clicked
 // document.getElementById("forgot-password-link").addEventListener('click', function() {
   // window.location.href = "forgot_password.php";
 // });
</script>




 
    
    <!-- customer login start -->
    
    
    <!-- customer login end -->

    <script>
        // Get form elements
    
        const nameInput = document.getElementById("name");
        const emailInput = document.getElementById("email");
        const phoneInput = document.getElementById("phoneno");
        const passwordInput = document.getElementById("password");
  
        // Add event listeners for form elements
        nameInput.addEventListener("input", validateName);
        emailInput.addEventListener("input", validateEmail);
        phoneInput.addEventListener("input", validatePhone);
        passwordInput.addEventListener("input", validatePassword);

  // Define validation functions
function validateName() {
  const regex = /^[a-zA-Z\s' -]+$/; // regular expression to allow only alphabets, spaces, apostrophes, and hyphens

  if (nameInput.value.length < 3 || nameInput.value.length > 20) {
    nameInput.classList.add("is-invalid");
    document.getElementById("nameError").innerHTML = "Please enter a name between 3 and 20 characters";
  } else if (!regex.test(nameInput.value.trim())) {
    nameInput.classList.add("is-invalid");
    document.getElementById("nameError").innerHTML = "Please enter a valid name";
  } else {
    nameInput.classList.remove("is-invalid");
    document.getElementById("nameError").innerHTML = "";
  }
}


        function validateEmail() {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailInput.value)) {
                emailInput.classList.add("is-invalid");
                document.getElementById("emailError").innerHTML = "Please enter a valid email address";
            } else {
                emailInput.classList.remove("is-invalid");
                document.getElementById("emailError").innerHTML = "";
            }
        }

        function validatePhone() {
            const phoneRegex = /^[0-9]{10}$/;
            if (!phoneRegex.test(phoneInput.value)) {
               phoneInput.classList.add("is-invalid");
                document.getElementById("NumberError").innerHTML = "<h6>Please enter a valid 10-digit mobile number</h6>";
            } else {
                phoneInput.classList.remove("is-invalid");
                document.getElementById("NumberError").innerHTML = "";
            }
        }
function validatePassword() {
  if (passwordInput.value.length < 8 || passwordInput.value.length > 12) {
    passwordInput.classList.add("is-invalid");
    document.getElementById("passwordError").innerHTML = "Password should be between 8 and 12 characters";
  } else {
    passwordInput.classList.remove("is-invalid");
    document.getElementById("passwordError").innerHTML = "";
  }
}
    </script>
    
    
    
      <!--footer area start-->
      <?php include 'footer.php'; ?>
    <!--footer area end-->

<!-- JS
============================================ -->

<!-- Plugins JS -->
<script src="assets/js/plugins.js"></script>

<!-- Main JS -->
<script src="assets/js/main.js"></script>

   <script>
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-email-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

</body>
</html>
