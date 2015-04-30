<?php
echo '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title></title>
</head>
<body>';

//declare boolean variables 
$bGood2 = 1;
$bGood = 2;
$bGood3 = 1;

//check if any parameters are missing
if(isset($_GET['min-multiplicand'])){
	$minMand = $_GET["min-multiplicand"];
} else{
	echo "Missing parameter [min-multiplicand].<br>";
	$bGood2 = 0;
}
if(isset($_GET['max-multiplicand'])){
	$maxMand = $_GET["max-multiplicand"];
} else{
	echo "Missing parameter [max-multiplicand].<br>";
	$bGood2 = 0;
}
if(isset($_GET['min-multiplier'])){
	$minMper = $_GET["min-multiplier"];
} else{
	echo "Missing parameter [min-multiplier].<br>";
	$bGood2 = 0;
}
if(isset($_GET['max-multiplier'])){
	$maxMper = $_GET["max-multiplier"];
} else{
	echo "Missing parameter [max-multiplier].<br>";
	$bGood2 = 0;
}

//check if min values are less than or equal to max values 
function compare ($min1, $max1, $min2, $max2, &$bool) {
	if(($min1 <= $max1) && ($min2 <= $max2)){
		$bool = 1;
	}
	else{
		echo "<h5>Minimum larger than maximum.</h5>";
		$bool = 0;
	}
}
//call function to compare minimum's and maximums 
compare($minMand, $maxMand, $minMper, $maxMper, $bGood);

//check if parameters are integers 
if(!(ctype_digit($minMand) == 1)){
	$bGood3 = 0;
	echo "Min-multiplicand must be an integer.<br>";
}
if(!(ctype_digit($maxMand) == 1)){
	$bGood3 = 0;
	echo "Max-multiplicand must be an integer.<br>";
}
if(!(ctype_digit($minMper) == 1)){
	$bGood3 = 0;
	echo "Min-multiplier must be an integer.<br>";
}
if(!(ctype_digit($maxMper) == 1)){
	$bGood3 = 0;
	echo "Max-multiplier must be an integer.<br>";
}

//if parameters are good, make multiplication table 
if(($bGood === 1) && ($bGood2 === 1) && ($bGood3 === 1)){
$tall = ($maxMand - $minMand + 2);

$wide = ($maxMper - $minMper + 2);

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

echo '</body>
</html>';
?>