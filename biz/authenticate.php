<?php
	session_start();

	require_once('db.mysql.php');

	$email = $_POST['email'];
	$password =  $_POST['password'];

	$sql = "select count(0) userCount, uid from users where email = '$email' and password = '$password'";

	$result = mysql_query($sql, $conn);

	$row = mysql_fetch_assoc($result);  

	// Authenticate the user
	if ($row['userCount'] == 1) {

		$_SESSION['uid'] = $row['uid'];

		header('Location: ../index.php');  // Login successfully, redirect to home page

	} else {
		
		$_SESSION['msg'] = "Login failed, please try again.";

		header('Location: ../sign_in.php');  // Login failed, redirect back to sign in page
	
	}

	
?>

  
  
