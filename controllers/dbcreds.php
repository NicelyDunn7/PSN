<?php
	if (!isset($_SERVER['HTTPS']) || !$_SERVER['HTTPS']) { // if request is not secure, redirect to secure url
	   $url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	   header('Location: ' . $url);
	}

	session_start();
	
	if(strcmp($_SESSION['type'],'user') === 0){

	} else if(strcmp($_SESSION['type'], 'business') === 0){
	 
	}else{
	  header('Location: ../index.php');
	}

	//Connect to the MySQL Account on Azure Server
	$hostname = "";
	$username = "";
	$password = "";
	$dbname = "";
	$link = new mysqli($hostname, $username, $password, $dbname);
	if ($link->connect_error) {
		die("Connection failed: " . $link->connect_error);
	}
?>
