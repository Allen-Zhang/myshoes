<?php
	$host = "127.0.0.1"; 
	$dbname = "myshoes"; 
	$user = "user"; 
	$pass = "password"; 

	try {
	    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	} catch (PDOException $e) {
	    echo 'Error message: '.$e->getMessage();
	    exit;
	}
?>
