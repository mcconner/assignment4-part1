<?php

if($_SERVER['REQUEST_METHOD'] === 'GET'){
	echo "Type: GET <br>";
	echo "parameters: ";
	if(count($_GET) > 0){
	foreach($_GET as $key => $value){
		if($value === '')
			$value = undefined;
		print "{$key}: {$value}<br>";
	}
	}else{
		echo "null";
	}
}
elseif($_SERVER['REQUEST_METHOD'] === 'POST'){
	echo "Type: POST<br>";
	echo "parameters: ";
	if(count($_POST) > 0 ){
	foreach($_POST as $key => $value){
		if($value === '')
			$value = undefined;
		print "{$key}: {$value}<br>";
	}
	}else{
		echo "null";
	}
}else{
	echo "Your request is invalid.";
}

?>
