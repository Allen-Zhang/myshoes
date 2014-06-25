<?php
session_start();
require_once('../model/db.mysql.php');
require_once('../model/Cart.php');
require_once('../model/User.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'no_action';
}

$action = strtolower($action);

switch ($action) {
	case 'no_action':
		header('Location: ../index.php');
		break;

    case 'user_authenticate':
		$email = $_POST['email'];
		$password =  md5($_POST['password']);
		// Authenticate the user
		if (authenticate_user($email, $password)) {
			$_SESSION['uid'] = get_user_id($email, $password);
			// Determine whether need to integrate the cart in the session into database
			if(!empty($_SESSION['pid']) && !empty($_SESSION['size']) && !empty($_SESSION['qty'])) {
			    $pro_id = explode(",", $_SESSION['pid']);
	            $pro_size = explode(",", $_SESSION['size']);
	            $pro_qty = explode(",", $_SESSION['qty']);
	            // Lengths of three sessions match, then continue
	            if(count($pro_id) == count($pro_size) && count($pro_id) == count($pro_qty)) {
	            	for($i = 0; $i < count($pro_id); $i++) {
	            		$qty = check_cart($_SESSION['uid'], $pro_id[$i], $pro_size[$i]);
	            		// Determine whether exist the same cart
	            		if(!empty($qty)) {
	            			$quantity = $qty + $pro_qty[$i];
	            			update_cart($quantity, $pro_id[$i], $pro_size[$i], $_SESSION['uid']);
	            		} else {
	            			add_cart($_SESSION['uid'], $pro_id[$i], $pro_size[$i], $pro_qty[$i]);
	            		}		
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
				exit;
			} elseif ($_SESSION['continue'] == "Continue to check out") {
				unset($_SESSION['continue']);
				header('Location: ../cart.php');  // Continue to ch eck out
				exit;
			} else {
				header('Location: ../index.php');  // Login successfully, redirect to home page
				exit;
			}
		} else {	
			$_SESSION['msg'] = "Login failed, please try again.";
			header('Location: ../login.php');  // Login failed, redirect back to login page
			exit;
		}
        break;

    case 'user_register':
    	$email = $_POST['email'];
		$password =  md5($_POST['password']);
		$username = $_POST['username'];
		$phone = $_POST['userphone'];
		// Format the phone number like (000)000-0000
		if(!empty($phone))
			$userphone = sprintf("(%s)%s-%s",substr($phone, 0, 3),substr($phone, 3, 3),substr($phone, 6));
		// Check whether email address already exists
		if (check_email($email)) {
			$new_id = add_user($email, $password, $username, $userphone);
			if(!empty($new_id)) {
				$_SESSION['uid'] = $new_id;
				header('Location: ../index.php');  // Sign up successfully, redirect to home page
				exit;
			} else {
				$_SESSION['msg'] = "Sign up failed, please try again.";
				header('Location: ../sign_up.php');  // Sign up failed, redirect back to sign up page
				exit;
			}
		} else {	
			$_SESSION['msg'] = "Email \"".$email."\" already exists.";
			header('Location: ../sign_up.php');  // Email already exists, redirect back to sign up page
			exit;
		}

	case 'user_logout':
		session_start();
		session_unset();
		session_destroy();
		header('Location: ../index.php');
		break;

	case 'user_subscribe':
		// Determine whether user has logined
		if(!isset($_SESSION['uid'])) {
			$_SESSION['msg'] = "Please login first";
			$_SESSION['continue'] = "Continue to subscribe";
			header('Location: ../login.php');
			exit;
		} else {
			$subscribe_email = $_POST['subscribe_email'];
			$uid = $_SESSION['uid'];
			// Check whether subscribe email address already exists
			if (check_subscribe_email($subscribe_email)) {
				$new_id = add_subscribers($uid, $subscribe_email);
				if(!empty($new_id)) {
					$_SESSION['subscriber'] = $subscribe_email;
					header('Location: ../subscribe_result.php?step=next');  // Subscribe successfully, redirect to result page
					exit;
				} else {
					$_SESSION['msg'] = "Subscribe failed, please try again."; // Subscribe failed, redirect back to subscribe page
					header('Location: ../subscribe.php');
					exit;
				}
			} else {
				$_SESSION['msg'] = "\"".$subscribe_email."\" already subscribes.";
				header('Location: ../subscribe.php');  // Email already exists, redirect back to subscribe page
				exit;
			}
		}
		break;
}

?>