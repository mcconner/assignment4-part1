<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>

<?php 
$nameErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["name"])) {
     $nameErr = "Name is required";
   } else {
     $name = test_input($_POST["name"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
       $nameErr = "Only letters and white space allowed";
     }
   }
}
?>
   
<form id= 'login' action='content1.php' method='post'> 
Username: <input type='text' name='username' id='username' value="<?php echo $name;?>">
<input type='submit' name='submit' value='Login'>
</form>


</body>
</html>
