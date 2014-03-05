
<!-- For users subscribe-->
<?php
	session_start();
  
	require_once('db.mysql.php');

	// Determine whether user has logined
	if(!isset($_SESSION['uid'])) {

		$_SESSION['msg'] = "Please login first";
		$_SESSION['continue'] = "Continue to subscribe";

		header('Location: ../login.php');

	} else {
		$subscribe_email = $_POST['subscribe_email'];

		$sql_check = "SELECT id FROM subscribers WHERE subscribe_email = '$subscribe_email'";

		$result_check = mysql_query($sql_check, $conn);

		// Count the number of rows in the result set
		$subscribe_email_count = mysql_num_rows($result_check);

		// Email address already exist
		if ($subscribe_email_count > 0) {

			$_SESSION['msg'] = "\"".$subscribe_email."\" already subscribes.";

			header('Location: ../subscribe.php');  // Subscribe failed, redirect back to subscribe page

		} else {

			$sql_insert = "INSERT INTO subscribers (uid, subscribe_email) 
						   VALUES (".$_SESSION['uid'].", '$subscribe_email')";

			mysql_query($sql_insert, $conn) or die(mysql_error());

			$_SESSION['subscriber'] = $subscribe_email;

			header('Location: ../subscribe_result.php');  // Subscribe successfully, redirect to result page
		
		}
	}
  
?>