<?php
	$host = "127.0.0.1"; 
	$dbname = "myshoes"; 
	$user = "user"; 
	$password = "password"; 
	
	try {
	    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
	} catch (PDOException $e) {
	    echo 'DB Connection Error Message: '.$e->getMessage();
	    exit;
	}
?>
