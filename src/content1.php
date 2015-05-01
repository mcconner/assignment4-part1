<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
if(! isset($_SESSION['loggedin']) && ! isset($_POST['username'])){
	//$_SESSION = array();
	//session_destroy();
	//echo "A username must be entered. Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/login.php'>here</a> to return to the login screen";
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
	header("location: {$redirect}/login.php", true);
	die();
}

if(session_status() == PHP_SESSION_ACTIVE){	
	//user entered null username and is not logged in
	if(($_POST['username'] == null) && !isset($_SESSION['username'])){
		echo "A username must be entered. Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/login.php'>here</a> to return to the login screen";
	//user is already logged in 
	} elseif (isset($_POST['username']) && isset($_SESSION['username'])){
		echo "Hi " . $_SESSION['username'] . ", you have visited this page " . $_SESSION['visits'] . " times. \n";
	} else {
		//username is not set 
		if(!isset($_SESSION(['username'])){
			$_SESSION['username'] = htmlspecialchars($_POST['username']);
		}
		if(!isset($_SESSION['visits'])){
			$_SESSION['visits'] = 0;
		}else{
			$_SESSION['visits']++;
		}
		if(! isset($_SESSION['loggedin'])){
			$_SESSION['loggedin'] = TRUE;
		}
	echo "Hi " . $_SESSION['username'] . ", you have visited this page " . $_SESSION['visits'] . " times. \n";
	}
}
?>

