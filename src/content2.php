<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(! isset($_POST['username'])){
	$_SESSION = array();
	session_destroy();
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
	header("location: {$redirect}/login.php", true);
	die();
}

if(session_status() == PHP_SESSION_ACTIVE){	
	if(isset($_POST['username'])){
		$_SESSION['username'] = $_POST['username'];
	}
	
	if(!isset($_SESSION['visits'])){
		$_SESSION['visits'] = 0;
	}
	$_SESSION['visits']++;
	echo "Hi " . $_SESSION['username'] . ", you have visited this page " . $_SESSION['visits'] . " times. \n";
}
?>

