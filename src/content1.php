<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if(!isset($_SESSION['count']))
	$_SESSION['count'] = 0;
$strAction = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){
	if($_POST['username'] == '')
		$strAction = 'noname';
	else{
		if(session_status() !== PHP_SESSION_ACTIVE){
			//$_SESSION['count'] = 0;
		}
		$_SESSION['username'] = $_POST['username'];
		$strAction = 'welcome';
	}
	
//}else if(session_status() !== PHP_SESSION_ACTIVE || $_SESSION['username'] == ''){
}else if(!isset($_SESSION['username'])){
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
	header("location: {$redirect}/login.php", true);
}

echo "<h2>Content1.php</h2>";
//echo "strAction = " . $strAction;
if(($strAction === 'welcome') || ($strAction === '')){
	if(isset($_SESSION['count']))
		$_SESSION['count']++;
	echo "Hello $_SESSION[username], you have visited this page $_SESSION[count] times. <br>";
	echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/login.php?action=logout'> here</a> to logout.<br>";
	echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/content2.php'> here</a> to go to content2.php.";
}else{
	echo "A username must be entered.<br>";
	echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/login.php'> here</a> to login.";
}





//if(isset($_GET['action']) && $_GET['action'] == 'logout'){
//	$_SESSION = array();
//	session_destroy();
//	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
//	$filePath = implode('/', $filePath);
//	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
//	header("location: {$redirect}/login.php", true);
//	die();
//}

//session_start();
//if(session_status() == PHP_SESSION_ACTIVE){	
//	if(isset($_POST['username'])){
//		$_SESSION['username'] = $_POST['username'];
//		$_SESSION['loggedIn'] = true;
//	}
	
//	if(!isset($_SESSION['count'])){
//		$_SESSION['count'] = 0;
//	}
//	$_SESSION['count']++;
	
//	echo "<h3>Content1.php</h3>";
	
//	if($_SESSION['username'] == ''){
//		echo "A username must be entered. Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/login.php'>here</a> to return to the login screen";
//	}else{
//		echo "Hello $_SESSION[username], you have visited this page $_SESSION[count] times. <br>";
//		echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/content1.php?action=logout'> here</a> to logout.<br>";
//		echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/content2.php'> here</a> to go to content2.php.";
//	}
//}else{
//	if(isset($_POST['username'])){
//		session_start();
//		$_SESSION['username'] = $_POST['username'];
//		$_SESSION['loggedIn'] = true;
//	}
	//
//	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
//	$filePath = implode('/', $filePath);
//	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
//	header("location: {$redirect}/login.php", true);
//}
?>

