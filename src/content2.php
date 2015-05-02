<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

//if user is trying to access this page and is not logged in- redirect to login page 
if(!isset($_SESSION['username'])){
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
	header("location: {$redirect}/login.php", true);
}

echo "<h2>Content2.php</h2>";
echo "Click <a href = 'http://web.engr.oregonstate.edu/~mcconner/content1.php'> here</a> to go to content1.php.";
?>

