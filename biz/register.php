
<!-- For users sign up -->
<?php
	session_start();
  
	require_once('db.mysql.php');

	$email = $_POST['email'];
	$password =  $_POST['password'];
	$username = $_POST['username'];
	$userphone = $_POST['userphone'];

	$sql_check = "SELECT uid FROM users WHERE email = '$email'";

	$result_check = mysql_query($sql_check, $conn);

	// Count the number of rows in the result set
	$email_count = mysql_num_rows($result_check);

	// Email address already exist
	if ($email_count > 0) {

		$_SESSION['msg'] = "Email \"".$email."\" already exists.";

		header('Location: ../sign_up.php');  // Sign up failed, redirect back to sign up page

	} else {

		$sql_insert = "INSERT INTO users (email, password, username, userphone) 
					   VALUES ('$email', '$password', '$username', '$userphone')" or die(mysql_error());

		mysql_query($sql_insert, $conn);

		// Fetch new user's id
		$_SESSION['uid'] = mysql_insert_id($conn);

		header('Location: ../index.php');  // Sign up successfully, redirect to home page
	
	}
  
?>