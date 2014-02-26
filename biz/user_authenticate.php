
<!-- For users login -->
<?php
	session_start();

	require_once('db.mysql.php');

	$email = $_POST['email'];
	$password =  $_POST['password'];

	$sql = "SELECT uid FROM users WHERE email = '$email' AND password = '$password'";

	$result = mysql_query($sql, $conn);

	// Count the number of rows in the result set
	$user_count = mysql_num_rows($result);

	$row = mysql_fetch_array($result);  

	// Authenticate the user
	if ($user_count == 1) {

		$_SESSION['uid'] = $row['uid'];

		// Determine whether need to continue other operations
		if($_SESSION['continue'] == "Continue to subscribe") {

			$_SESSION['msg'] = "Welcome back to subscribe";
			
			header('Location: ../subscribe.php');  // Continue to subscribe

		} else {

			header('Location: ../index.php');  // Login successfully, redirect to home page

		}

	} else {
		
		$_SESSION['msg'] = "Login failed, please try again.";

		header('Location: ../login.php');  // Login failed, redirect back to login page
	
	}

	
?>

  
  
