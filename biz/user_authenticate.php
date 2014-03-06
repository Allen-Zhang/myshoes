
<!-- For users login -->
<?php
	session_start();

	require_once('db.mysql.php');

	$email = $_POST['email'];
	$password =  md5($_POST['password']);

	$sql = "SELECT uid FROM users WHERE email = '$email' AND password = '$password'";

	$result = mysql_query($sql, $conn);
	$user_count = mysql_num_rows($result);  // Count the number of rows in the result set  

	// Authenticate the user
	if ($user_count == 1) {

		$row = mysql_fetch_array($result);

		$_SESSION['uid'] = $row['uid'];

		// Determine whether need to integrate the cart in the session into database
		if(!empty($_SESSION['pid']) && !empty($_SESSION['size']) && !empty($_SESSION['qty'])) {

		    $pro_id = explode(",", $_SESSION['pid']);
            $pro_size = explode(",", $_SESSION['size']);
            $pro_qty = explode(",", $_SESSION['qty']);

            // Lengths of three sessions match, then continue
            if(count($pro_id) == count($pro_size) && count($pro_id) == count($pro_qty)) {

            	for($i = 0; $i < count($pro_id); $i++) {

			        $sql_insert = "INSERT INTO carts (uid, pid, size, quantity) 
			                       VALUES (".$_SESSION['uid'].",'".$pro_id[$i]."',\"".$pro_size[$i]."\",".$pro_qty[$i].")";

        			mysql_query($sql_insert, $conn) or die(mysql_error());

            	}

            	unset($_SESSION['pid']);
            	unset($_SESSION['size']);
            	unset($_SESSION['qty']);

            }
		}

		// Determine whether need to continue other operations
		if($_SESSION['continue'] == "Continue to subscribe") {

			$_SESSION['msg'] = "Welcome back to subscribe!";
			
			unset($_SESSION['continue']);

			header('Location: ../subscribe.php');  // Continue to subscribe

		} elseif ($_SESSION['continue'] == "Continue to check out") {

			unset($_SESSION['continue']);

			header('Location: ../cart.php');  // Continue to ch eck out

		} else {

			header('Location: ../index.php');  // Login successfully, redirect to home page

		}

	} else {
		
		$_SESSION['msg'] = "Login failed, please try again.";

		header('Location: ../login.php');  // Login failed, redirect back to login page
	
	}
	
?>

  
  
