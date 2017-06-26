<?php

require 'connect.php';
require 'core.inc.php';


if(loggedin()){
	require 'dashboard.php';
	// echo 'You are logged in <a href="logout.php">Log out</a>';
}else{
	require 'login.php';
}


?>
