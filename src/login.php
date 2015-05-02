<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

$strAction = '';
if(isset($_GET['action']))
	$strAction = $_GET['action'];

//if user wants to end the session (this code is from lecture video)
if($strAction == 'logout'){
	$_SESSION = array();
	session_destroy();
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
	header("location: {$redirect}/login.php", true);
	die();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<h3>Welcome, please login </h2>   
<form  name='login' action='content1.php' method='POST'> 
<label>Username: </label>
<input type='text' name='username'>
<input type='submit' name='login' value='login'>
</form>

</body>
</html>


