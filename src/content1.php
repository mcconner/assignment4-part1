<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

//if not already set, set session count variable 
if(!isset($_SESSION['count']))
	$_SESSION['count'] = 0;
$strAction = '';

//check if user is coming from the login form 
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	//if user did not enter a username 
	if($_POST['username'] == '')
		$strAction = 'noname';
	else{
		//if user entered a username- set session username variable 
		$_SESSION['username'] = $_POST['username'];
		$strAction = 'welcome';
	}
//if user is trying to access this page and is not logged in- redirect to login page 
}else if(!isset($_SESSION['username'])){
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
	header("location: {$redirect}/login.php", true);
}

echo "<h2>Content1.php</h2>";

//if user is logged in and has valid username 
if(($strAction === 'welcome') || ($strAction === '')){
	if(isset($_SESSION['count']))
		$_SESSION['count']++;
	echo "Hello $_SESSION[username], you have visited this page $_SESSION[count] times. <br>";
	echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/login.php?action=logout'> here</a> to logout.<br>";
	echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/content2.php'> here</a> to go to content2.php.";
}else{
	//if user did not enter a username 
	echo "A username must be entered.<br>";
	echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/login.php'> here</a> to login.";
}
?>

