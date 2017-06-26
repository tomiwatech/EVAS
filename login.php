<?php

require 'connect.php';

global $login_error;

if (isset($_POST['username']) && isset($_POST['password'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT id FROM admin WHERE username = '$username' AND password = '$password'";
  if ($query_run = @mysql_query($query)) {
   $query_num_rows = mysql_num_rows($query_run);
     if ($query_num_rows == 0) {
       $login_error = "Invalid Username and Password combination";
     }else if($query_num_rows == 1){
      $user_id = mysql_result($query_run, 0, 'id');
      $_SESSION['user_id'] = $user_id;
      header('Location:index.php');
     }
  }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Log In &middot; Elephant Template &middot; The fastest way to build modern admin site for any platform, browser, or device</title>
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
    <link rel="stylesheet" href="css/login-2.minf9e3.css?v=1.1">
  </head>
  <body style="font-family:consolas;background:grey">
  <p style="text-align:center;color:white"><?php echo $login_error;?></p>
   <img src="./img/heritageuser3.png" style="margin-left:40pc;height:100px">
    <div class="login">
      <div class="login-body">
      <h2 style="text-align:center">Sign in</h2>
        <div class="login-form">
          <form data-toggle="validator" method="POST" action="<?php echo $current_file;?>">
            <div class="form-group">
              <label for="username">Username</label>
<input class="form-control" type="text" name="username" spellcheck="false" autocomplete="off" data-msg-required="Please enter your username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
<input id="password" class="form-control" type="password" name="password" minlength="6" data-msg-minlength="Password must be 6 characters or more." data-msg-required="Please enter your password." required>
            </div>
            <button class="btn btn-primary btn-block" type="submit" style="margin-top:35px">Sign in</button>
          </form>
        </div>
      </div>
      <div class="login-footer">
       <span style="color:white">Don't have an account? </span> <a href="signup-3.php">Sign Up</a>
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

<!-- Mirrored from demo.naksoid.com/elephant/flaming-red/login-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2017 10:49:09 GMT -->
</html>
