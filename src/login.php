<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'On');

<form id= 'login' action='content1.php' method='post'> 
<input type='text' name='username' id='username'>
<input type='submit' name='submit' value='Login'>
</form>

if(session_status() == PHP_SESSION_ACTIVE ){
	if(isset($_POST['username'])){
		$_SESSION['username'] = $_POST['username'];
	}
	if(!isset($_SESSION['visits'])){
		$_SESSION['visits'] = 0;
	}
	$_SESSION['visits']++;
	echo "Hi $_SESSION[username], you have visited this page $_SESSION[visits] times \n";
}

?>