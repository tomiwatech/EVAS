<!-- 
// ///option two
// require 'PHPMailerAutoload.php';

// $mail = new PHPMailer;

// //$mail->SMTPDebug = 3;                               // Enable verbose debug output

// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'smtp1.example.com;smtp2.example.com';  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = 'user@example.com';                 // SMTP username
// $mail->Password = 'secret';                           // SMTP password
// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                    // TCP port to connect to

// $mail->setFrom('from@example.com', 'Mailer');
// $mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
// $mail->isHTML(true);                                  // Set email format to HTML

// $mail->Subject = 'Here is the subject';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

// if(!$mail->send()) {
//     echo 'Message could not be sent.';
//     echo 'Mailer Error: ' . $mail->ErrorInfo;
// } else {
//     echo 'Message has been sent';
// }

//option two

 -->

<?php

       	  
require("PHPMailer_5.2.4/class.phpmailer.php");

require 'connect.php';

 global $repo;

if (isset($_POST['subject']) && isset($_POST['range'])) {
    if (isset($_POST['header']) && isset($_POST['class'])) {
       
       $subject = $_POST['subject'];
       $range = $_POST['range'];
       $header = $_POST['header'];
       $class = $_POST['class'];

$query = "SELECT * FROM allocate WHERE seat = '$range' ";
       $result = mysql_query($query);
       while ($row = mysql_fetch_assoc($result)) {
       	       $course = $row['course'];
       	       $range = $row['seat'];
       	       $time = $row['timer'];
       	       $venue = $row['location'];
       	       $size = $row['size'];
       	       $duration = $row['duration'];

   $repo = "Course:".$course."<br>"."Number of classmates in hall: ".$range."<br>"."Time: ".$time."<br>"."Exam Venue: ".$venue."<br>"."Size of Hall: ".$size."<br>"."Duration of Exam: ".$duration;
       }

       $sql = "SELECT * FROM students WHERE class = '$class' LIMIT $range";
       $result = mysql_query($sql);
       while ($row = mysql_fetch_assoc($result)) {
       	  $email = $row['email'];

$mail = new PHPMailer();

$mail->IsSMTP();
$mail->From = "sannimichaeltomiwa@gmail.com";
$mail->FromName = "Exam Board - Yaba College of Technolgy";
$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = "ssl";
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "sannimichaeltomiwa@gmail.com";
$mail->Password = "programming";

$mail->AddReplyTo("sannimichaeltomiwa@gmail.com","YCT");
$mail->WordWrap = 200;
//mail part

       	 $exploder = explode(',', $email);

foreach($exploder as $exploding){
    $mail->AddAddress($exploding);
}
//
$mail->IsHTML(true);
$mail->Subject = $subject;
$mail->Body = $repo;

$description = "Email sent";

if ($mail->Send()) {
	$successMsg = "Your Mail has been sent";
	$query = "INSERT INTO tracker(description) VALUES('$description')";
	$query_run = mysql_query($query);
}else{
	$errorMsg = "Your Mail could not be sent";
}

       }

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mailer</title>
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
    <link rel="stylesheet" href="css/application.minf9e3.css?v=1.1">
  </head>
  <body class="layout layout-header-fixed" style="font-family:consolas">
    <div class="layout-header">
      <div class="navbar navbar-default">
        <div class="navbar-header">
          <a class="navbar-brand navbar-brand-center" href="index.html">
            <img class="navbar-brand-logo" src="img/logo-inverse.svg" alt="Elephant">
          </a>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#sidenav">
            <span class="sr-only">Toggle navigation</span>
            <span class="bars">
              <span class="bar-line bar-line-1 out"></span>
              <span class="bar-line bar-line-2 out"></span>
              <span class="bar-line bar-line-3 out"></span>
            </span>
            <span class="bars bars-x">
              <span class="bar-line bar-line-4"></span>
              <span class="bar-line bar-line-5"></span>
            </span>
          </button>
          <button class="navbar-toggler visible-xs-block collapsed" type="button" data-toggle="collapse" data-target="#navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="arrow-up"></span>
            <span class="ellipsis ellipsis-vertical">
              <img class="ellipsis-object" width="32" height="32" src="img/0180441436.jpg" alt="Teddy Wilson">
            </span>
          </button>
        </div>
        <div class="navbar-toggleable">
          <nav id="navbar" class="navbar-collapse collapse">
            <button class="sidenav-toggler hidden-xs" title="Collapse sidenav ( [ )" aria-expanded="true" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="bars">
                <span class="bar-line bar-line-1 out"></span>
                <span class="bar-line bar-line-2 out"></span>
                <span class="bar-line bar-line-3 out"></span>
                <span class="bar-line bar-line-4 in"></span>
                <span class="bar-line bar-line-5 in"></span>
                <span class="bar-line bar-line-6 in"></span>
              </span>
            </button>
           <h4 style="text-align:center;padding-top:6px;font-weight:lighter;">EXAM AND VENUE ALLOCATION APP</h4>
          </nav>
        </div>
      </div>
    </div>
    <div class="layout-main">
      <div class="layout-sidebar">
        <div class="layout-sidebar-backdrop"></div>
        <div class="layout-sidebar-body">
          <div class="custom-scrollbar">
            <nav id="sidenav" class="sidenav-collapse collapse">
              <ul class="sidenav">
                <li class="sidenav-search hidden-md hidden-lg">
                  <form class="sidenav-form" action="http://demo.naksoid.com/">
                    <div class="form-group form-group-sm">
                      <div class="input-with-icon">
                        <input class="form-control" type="text" placeholder="Search…">
                        <span class="icon icon-search input-icon"></span>
                      </div>
                    </div>
                  </form>
                </li>
                <li class="sidenav-heading">Navigation</li>
                <li class="sidenav-item has-subnav active">
                  <a href="dashboard.php" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-home"></span>
                    <span class="sidenav-label">Dashboards</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li class="sidenav-subheading">Dashboards</li>
                    <li class="active"><a href="dashboard.php">Home</a></li>
                  </ul>
                </li>
               
                <li class="sidenav-heading">Components</li>
               
               
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-location-arrow"></span>
                    <span class="sidenav-label">Venues</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li class="sidenav-subheading">Venue</li>
                    <li><a href="venue.php">Add venue</a></li>
                    <li><a href="allVenue.php">All venue</a></li>
                  </ul>
                </li>
                <li class="sidenav-item has-subnav">
                  <a href="#" aria-haspopup="true">
                    <span class="sidenav-icon icon icon-graduation-cap"></span>
                    <span class="sidenav-label">Students</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li class="sidenav-subheading">Students</li>
                    <li><a href="stud.php">Add new record</a></li>
                    <li><a href="allStud.php">All students</a></li>
                  </ul>
                </li>
                 <li class="sidenav-item has-subnav">
                  <a href="#">
                    <span class="sidenav-icon icon icon-sort"></span>
                    <span class="sidenav-label">Arrangement</span>
                  </a>
                  <ul class="sidenav-subnav collapse">
                    <li class="sidenav-subheading">Arrange Students</li>
                    <li><a href="arrange.php">Arrange Students</a></li>
                  </ul>
                </li>
                <li class="sidenav-heading">Core</li>

                <li class="sidenav-item">
                  <a href="allo.php">
                    <span class="sidenav-icon icon icon-random"></span>
                    <span class="sidenav-label">Allocation</span>
                  </a>
                </li>
              
                <li class="sidenav-item">
                  <a href="mail.php" target="_blank">
                    <span class="sidenav-icon icon icon-envelope"></span>
                    <span class="sidenav-label">Send Mail</span>
                  </a>
                </li>
               
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <div class="layout-content">
        <div class="layout-content-body">
          <div class="title-bar">
          <br>
            <h3 class="title-bar-title" style="font-weight:lighter;text-align: center">
             SEND MAILS TO STUDENTS
            </h3>
          </div>
          <br>
      


              <?php if(isset($errorMsg)){

                   ?>
                 <div class="alert alert-danger" style="width:60%;margin-left: 14pc;background:#d9230f">
                   <span class="glyphicon glyphicon-info">
                     <strong><?php echo $errorMsg?></strong>
                   </span>
                 </div>
                   <?php

                       }

                   ?>


        <?php if(isset($successMsg)){
                    
                   ?>
                 <div class="alert alert-success" style="width:60%; margin-left: 14pc">
                   <span class="glyphicon glyphicon-info">
                     <strong ><?php echo $successMsg?></strong>
                   </span>
                 </div>
                   <?php

                       }

                   ?>
<form class="form-horizontal" role="form" style="width: 80%;color: grey" method="post" action="mail.php">
                                <div class="form-body">
                                
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Subject</label>
                                        <div class="col-md-9">
                                            <div class="input-inline input-medium">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                <input type="text" name="subject" class="form-control" placeholder="Enter email Subject" required> </div>
                                            </div>
                                           
                                        </div>
                                    </div>


                                         <br>
                      
                                     <div class="form-group">
                                        <label class="col-md-3 control-label">Range</label>
                                        <div class="col-md-9" class="form-control">
                                         <select class="form-control" name="range" required>
						                      <option></option>
						                      <option value="10">1 - 10</option>
						                      <option value="30">11 - 40</option>
						                      <option value="40">41 - 80</option>
						                      <option value="45">81 - 120</option>
                                         </select>
                                        </div>
                                    </div>

                                         <br>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Header</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                     <input type="text" name="header" class="form-control" placeholder="Enter email header" required> </div>
                                        </div>
                                    </div>

                                         <br>

                                        <div class="form-group">
                                        <label class="col-md-3 control-label">Class</label>
                                        <div class="col-md-9">
                                            <select class="form-control" name="class" required>
                                                <option></option>
                                                <option>ndone</option>
                                                <option>ndtwo</option>
                                                <option>hndone</option>
                                                <option>hndtwo</option>
                                            </select>
                                        </div>
                                        </div>

                                             <br>

                                 <!--    <div class="form-group">h
                                        <label class="col-md-3 control-label">Email Address</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required> </div>
                                        </div>
                                    </div>

                                         <div class="form-group">
                                        <label class="col-md-3 control-label">Phone Number</label>
                                        <div class="col-md-9">
                                            <div class="input-inline input-medium">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-user"></i>
                                                    </span>
                            <input type="text"  name="phone" class="form-control" placeholder="Enter phone number" required> </div>
                                            </div>
                                           
                                        </div>
                                    </div>


                                      <div class="form-group">
                                                <label class="col-md-3 control-label">Place of birth</label>
                                                <div class="col-md-9">
                          <input type="text" name="pob" class="form-control" placeholder="Enter Place of birth" required> </div>
                                            </div>


                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Address</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="fa fa-envelope"></i>
                                                </span>
                      <input type="text" name="address" class="form-control" placeholder="Enter Address" required> </div>
                                        </div>
                                    </div> -->

                                                    <div class="form-actions">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
    <button type="submit" style="color: white;width: 100px;margin-right: 17pc;margin-top: 5px" class="btn btn-primary pull-right" >Submit</button>
                                        </div>
                                    </div>
                                </div>

                                  </form>
        
        </div>
      </div>
      <div class="layout-footer">
        <div class="layout-footer-body">
          <small class="version">Version 1.1</small>
          <small class="copyright">2016 &copy; Elephant By <a href="http://naksoid.com/">Naksoid</a></small>
        </div>
      </div>



    </div>
    <div class="theme">
      <div class="theme-panel theme-panel-collapsed">
      
        <div class="theme-panel-body">
          <div class="custom-scrollbar">
            <div class="custom-scrollbar-inner">
              <h5 class="theme-heading">
                <a href="http://demo.naksoid.com/elephant/buy" class="btn btn-primary btn-block">Buy Elephant Now!</a>
              </h5>
              <ul class="theme-settings">
                <li class="theme-settings-heading">
                  <div class="divider">
                    <div class="divider-content">Theme Settings</div>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Header fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-header-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar sticky*</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-sticky" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Sidebar collapsed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-sidebar-collapsed" data-sync="false">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-item">
                  <div class="theme-settings-label">Footer fixed</div>
                  <div class="theme-settings-switch">
                    <label class="switch switch-primary">
                      <input class="switch-input" type="checkbox" name="layout-footer-fixed" data-sync="true">
                      <span class="switch-track"></span>
                      <span class="switch-thumb"></span>
                    </label>
                  </div>
                </li>
                <li class="theme-settings-description">
                  <span>
                    <strong>Sidebar sticky*</strong> - by scrolling up and down the page, the menu placed on the sidebar moves along with the content until the bottom of the menu is reached. <a href="page-layouts.html">Learn more</a></span>
                </li>
              </ul>
              <hr class="theme-divider">
              <ul class="theme-variants">
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="index-2.html" title="Flaming Red (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/9722110524.jpg" alt="Flaming Red Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/flaming-red-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/flaming-red-inverse/" title="Flaming Red (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/9870681590.jpg" alt="Flaming Red Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/flaming-red-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/flatistic-green/" title="Flatistic Green (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/9964167452.jpg" alt="Flatistic Green Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/flatistic-green-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/flatistic-green-inverse/" title="Flatistic Green (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1007517980.jpg" alt="Flatistic Green Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/flatistic-green-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/midnight-blue/" title="Midnight Blue (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1015664515.jpg" alt="Midnight Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/midnight-blue-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/midnight-blue-inverse/" title="Midnight Blue (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1025453682.jpg" alt="Midnight Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/midnight-blue-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/materialistic-blue/" title="Materialistic Blue (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1033422797.jpg" alt="Materialistic Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/materialistic-blue-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/materialistic-blue-inverse/" title="Materialistic Blue (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1044368407.jpg" alt="Materialistic Blue Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/materialistic-blue-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/eerie-black/" title="Eerie Black (default)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1050099119.jpg" alt="Eerie Black Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/eerie-black-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
                <li class="theme-variants-item">
                  <a class="theme-variants-link" href="http://demo.naksoid.com/elephant/eerie-black-inverse/" title="Eerie Black (inverse)" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">
                    <img class="img-responsive" src="img/1067123558.jpg" alt="Eerie Black Theme">
                  </a>
                  <a class="theme-variants-alt" href="http://demo.naksoid.com/elephant/eerie-black-inverse-rounded/" title="Rounded Corners Version" data-container="body" data-trigger="hover" data-placement="top" data-toggle="tooltip">Rounded</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="theme-panel-footer">
          <a class="rounded sq-36 bg-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;t=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device" title="Share on Facebook" target="_blank">
            <span class="icon icon-facebook"></span>
          </a>
          <a class="rounded sq-36 bg-twitter" href="https://twitter.com/intent/tweet?source=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;text=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device:%20http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;via=naksoid" title="Tweet" target="_blank">
            <span class="icon icon-twitter"></span>
          </a>
          <a class="rounded sq-36 bg-googleplus" href="https://plus.google.com/share?url=http%3A%2F%2Fdemo.naksoid.com%2Felephant" title="Share on Google+" target="_blank">
            <span class="icon icon-google-plus"></span>
          </a>
          <a class="rounded sq-36 bg-linkedin" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;title=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device&amp;summary=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner.&amp;source=http%3A%2F%2Fdemo.naksoid.com%2Felephant" title="Share on LinkedIn" target="_blank">
            <span class="icon icon-linkedin"></span>
          </a>
          <a class="rounded sq-36 bg-pinterest" href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fdemo.naksoid.com%2Felephant&amp;media=http://demo.naksoid.com/elephant/img/ae165ef33d137d3f18b7707466aa774d.jpg&amp;description=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner." title="Pin it" target="_blank">
            <span class="icon icon-pinterest-p"></span>
          </a>
          <a class="rounded sq-36 bg-default" href="mailto:?subject=The%20fastest%20way%20to%20build%20modern%20admin%20site%20for%20any%20platform%2C%20browser%2C%20or%20device&body=Elephant%20is%20a%20front-end%20template%20created%20to%20help%20you%20build%20modern%20web%20applications%2C%20fast%20and%20in%20a%20professional%20manner.:%20http%3A%2F%2Fdemo.naksoid.com%2Felephant" title="Send email" target="_blank">
            <span class="icon icon-envelope-o"></span>
          </a>
        </div>
      </div>
    </div>
    <script src="js/vendor.minf9e3.js?v=1.1"></script>
    <script src="js/elephant.minf9e3.js?v=1.1"></script>
    <script src="js/application.minf9e3.js?v=1.1"></script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','../../../www.google-analytics.com/analytics.js','ga');
      ga('create', 'UA-83990101-1', 'auto');
      ga('send', 'pageview');
    </script>
  </body>

<!-- Mirrored from demo.naksoid.com/elephant/flaming-red/dashboard-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Apr 2017 10:46:22 GMT -->
</html>