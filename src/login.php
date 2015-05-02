<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

//$loggedIn = 1;
$strAction = '';
if(isset($_GET['action']))
	$strAction = $_GET['action'];

//if(isset($_GET['action']) && $_GET['action'] == 'logout'){
if($strAction == 'logout'){
	$_SESSION = array();
	session_destroy();
	//$loggedIn = 0;
	$filePath = explode('/', $_SERVER['PHP_SELF'], -1);
	$filePath = implode('/', $filePath);
	$redirect = "//" . $_SERVER['HTTP_HOST'] . $filePath;
	header("location: {$redirect}/login.php", true);
	die();
}
//echo "Logged in= " . $loggedIn;
echo "strAction = " . $strAction;

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


