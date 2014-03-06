
<!-- MySQL Database Connection -->
<?php

	$host = "127.0.0.1"; 
	$user = "user"; 
	$password = "password"; 
	$dbname = "myshoes"; 

	$conn = mysql_connect($host, $user, $password) or die("Unable to connect" . mysql_error());

	mysql_select_db($dbname, $conn) or die("Unable to connect to myshoes database");

?>



