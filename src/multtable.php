<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>';

$bGood2 = 1;
$bGood = 2;

//NEED TO CHECK IF PARAMETERS ARE INTEGERS 

//check if any parameters are missing
if(isset($_GET['min-mand'])){
	$minMand = $_GET["min-mand"];
} else{
	echo "Missing parameter [min-multiplicand]";
	$bGood2 = 0;
}
if(isset($_GET['max-mand'])){
	$maxMand = $_GET["max-mand"];
} else{
	echo "Missing parameter [max-multiplicand]";
	$bGood2 = 0;
}
if(isset($_GET['min-mper'])){
	$minMper = $_GET["min-mper"];
} else{
	echo "Missing parameter [min-multiplier]";
	$bGood2 = 0;
}
if(isset($_GET['max-mper'])){
	$maxMper = $_GET["max-mper"];
} else{
	echo "Missing parameter [max-multiplier]";
	$bGood2 = 0;
}

//check if min values are less than or equal to max values 
function compare ($min1, $max1, $min2, $max2, &$bool) {
	if(($min1 <= $max1) && ($min2 <= $max2)){
		echo "<h5>Minimum is less than or equal to max </h5>";
		$bool = 1;
	}
	else{
		echo "<h5>Your max must be greater than min </h5>";
		$bool = 0;
	}
}
echo "Compare min's and max's: \n";
compare($minMand, $maxMand, $minMper, $maxMper, $bGood);

//if parameters are good, make multiplication table 
if(($bGood === 1) && ($bGood2 === 1)){
$tall = ($maxMand - $minMand + 2);
echo "Table height = " . $tall;

$wide = ($maxMper - $minMper + 2);
echo "Table width = " . $wide;

echo '<table border = "1">';
echo '<tr>' . '<td>' . '' . '</td>';
for ($i = $minMper; $i <= $maxMper; $i++){
	echo '<td>' . $i . '</td>'; 
} 
echo '</tr>';
for ($r = $minMand; $r <= $maxMand; $r++){
	echo '<tr>' . '<td>' . $r . '</td>';
	for($c=$minMper; $c <= $maxMper; $c++){
		echo '<td>' . $c * $r . '</td>';
	}
	echo '</tr>';
}
echo '<table>';
}

//$_GET is an array containing variables passed in the URL

echo '<p><h3>GET Variables</h3>
<p>
<table border="1">
<tr>
<td>Key
<td>value';

foreach($_GET as $key => $value){
	echo '<tr><td>' . $key . '<td>' . $value;
}
echo '<table>';

//$_POST works exactly the same way except for variables sent in via a POST request

echo '</body>
</html>';
?>