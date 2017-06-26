<?php

require 'connect.php';

if (isset($_POST['firstname']) && isset($_POST['lastname'])) {
  if (isset($_POST['email']) && isset($_POST['username'])) {
    if (isset($_POST['password'])) {
      # code...
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];

$query = "INSERT INTO admin(firstname,lastname,email,username,password) VALUES('$firstname','$lastname','$email','$username','$password')";
$query_run = @mysql_query($query);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up &middot; Elephant Template &middot; The fastest way to build modern admin site for any platform, browser, or device</title>
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
    <meta name="description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:url" content="http://demo.naksoid.com/elephant">
    <meta property="og:type" content="website">
    <meta property="og:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta property="og:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta property="og:image" content="../img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@naksoid">
    <meta name="twitter:creator" content="@naksoid">
    <meta name="twitter:title" content="The fastest way to build modern admin site for any platform, browser, or device">
    <meta name="twitter:description" content="Elephant is a front-end template created to help you build modern web applications, fast and in a professional manner.">
    <meta name="twitter:image" content="../img/ae165ef33d137d3f18b7707466aa774d.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="manifest.json">
    <link rel="mask-icon" href="safari-pinned-tab.svg" color="#d9230f">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,700">
    <link rel="stylesheet" href="css/vendor.minf9e3.css?v=1.1">
    <link rel="stylesheet" href="css/elephant.minf9e3.css?v=1.1">
    <link rel="stylesheet" href="css/signup-3.minf9e3.css?v=1.1">
  </head>
  <body style="font-family:consolas;background: grey">
  <br>
  <br>
  <br>
   <img src="./img/heritageuser3.png" style="margin-left:40pc;height:100px">
    <div class="signup">
      <div class="signup-body">
        <h3 class="signup-heading">Sign up</h3>
        <div class="signup-form">
     <form data-toggle="md-validator" method="POST" action="signup-3.php">
            <div class="row">
              <div class="col-sm-6">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="text" name="firstname" spellcheck="false" data-msg-required="Please enter your fullname." required>
                  <label class="md-control-label">First name</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="text" name="lastname" spellcheck="false" data-msg-required="Please enter your lastname." required>
                  <label class="md-control-label">Last name</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="email" name="email" spellcheck="false" autocomplete="off" data-msg-required="Please enter your email address." required>
                  <label class="md-control-label">Email</label>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
<input class="md-form-control" type="text" name="username" spellcheck="false" autocomplete="off" data-msg-required="Please enter your User name address." required>
                  <label class="md-control-label">Username</label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="md-form-group md-label-floating">
                  <input class="md-form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
                  <label class="md-control-label">Password</label>
                </div>
              </div>
            </div>

            <marquee>Endeavour to remember your Username and password to login</marquee>

            <button class="btn btn-primary btn-block" type="submit">Sign up</button>
          </form>
        </div>
      </div>
      <div class="signup-footer">
        <span style="color:white">Already have an account?</span> <a href="index.php">Log in</a>
      </div>
    </div>
    <script src="js/vendor.minf9e3.js?v=1.1"></script>
    <script src="js/elephant.minf9e3.js?v=1.1"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>

<!-- Mirrored from demo.naksoid.com/elephant/flaming-red/signup-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2017 10:49:09 GMT -->
</html>
