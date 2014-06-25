<?php
session_start();
require_once('../model/db.mysql.php');
require_once('../model/Account.php');

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

	case 'account_display':
		$uid =$_SESSION['uid'];
		$array = get_user_info($uid);
		$_SESSION['account'] = $array;
		header('Location: ../account_info.php');
		break;

	case 'username_display':
		$uid =$_SESSION['uid'];
		$array = get_user_info($uid);
		$_SESSION['username'] = $array['username'];
		header('Location: ../edit_name.php');
		break;

	case 'username_update':
		$uid =$_SESSION['uid'];
		$edit_name = $_POST['edit_name'];
		if(update_username($uid, $edit_name)) {
			$_SESSION['msg'] = "Username edit successfully!";
			$array = get_user_info($uid);
			$_SESSION['account'] = $array;
		    header('Location: ../account_info.php');  // Edit username successfully, go to account info page
		    exit;
		} else {
    		$_SESSION['msg'] = "Username edit failed, please try again.";
       		header('Location: ../account_info.php');  // Username edit failed, go back to account info page
       		exit;
		}
		break;

	case 'userphone_display':
		$uid =$_SESSION['uid'];
		$array = get_user_info($uid);
		$_SESSION['userphone'] = $array['userphone'];
		header('Location: ../edit_phone.php');
		break;

	case 'userphone_update':		
		$uid =$_SESSION['uid'];
		$phone = $_POST['edit_phone'];
		// Format the phone number
		$edit_phone = sprintf("(%s)%s-%s",substr($phone, 0, 3),substr($phone, 3, 3),substr($phone, 6));
		if(update_userphone($uid, $edit_phone)) {
			$_SESSION['msg'] = "User phone number edit successfully!";
			$array = get_user_info($uid);
			$_SESSION['account'] = $array;
		    header('Location: ../account_info.php');  // Edit phone number successfully, go to account info page
		    exit;	
		} else {
    		$_SESSION['msg'] = "Userphone edit failed, please try again.";
        	header('Location: ../account_info.php');  // Userphone edit failed, go back to account info page
        	exit;
		}		
		break;

	case 'login_display':
		$uid =$_SESSION['uid'];
		$array = get_user_info($uid);
		$_SESSION['email'] = $array['email'];
		header('Location: ../edit_login.php');
		break;

	case 'login_update':
		$uid = $_SESSION['uid'];
		$current_pwd = md5($_POST['current_pwd']);
		// Authenticate the account
		if (authenticate_account($uid, $current_pwd)) {
			$new_email = $_POST['new_email'];
			// Check whether the new email address has already been used by other users
			if(check_new_email($new_email, $uid)) {
				// If user also try to update the password
                if(!empty($_POST['password'])) {
 					$new_pwd = md5($_POST['password']);
                	if(update_email_password($new_email, $new_pwd, $uid)) {
						$_SESSION['msg'] = "Email and password edit successfully!";
						$array = get_user_info($uid);
						$_SESSION['account'] = $array;
                		header('Location: ../account_info.php');  // Edit email and password successfully, go to account info page
                		exit;
                	} else {
                		$_SESSION['msg'] = "Email and password edit failed.";
                		header('Location: ../account_info.php');  // Edit email and password failed, go to account info page
                		exit;
                	}
                // If user only try to update the email
                } else {
                	if(update_email($new_email, $uid)) {
                		$_SESSION['msg'] = "Email edit successfully!";
                		$array = get_user_info($uid);
						$_SESSION['account'] = $array;
                		header('Location: ../account_info.php');  // Edit email successfully, go to account info page
                		exit;
                	} else {
                		$_SESSION['msg'] = "Email edit failed.";
                		header('Location: ../account_info.php');  // Edit email failed, go to account info page
                		exit;
                	}
                }
			} else {
                $_SESSION['msg'] = "Email address \"".$new_email."\" has already been used.";
                header('Location: ../edit_login.php');  // Edit email failed, go back to edit login page
                exit;
			}
		} else {
			$_SESSION['msg'] = "Wrong current password, please try again.";
            header('Location: ../edit_login.php');  // Wrong password, go back to login page
            exit;
		}
		break;

}

?>