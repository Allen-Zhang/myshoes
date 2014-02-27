
<!-- For account information edit -->
<?php
	session_start();

    require_once('db.mysql.php');

    // Determine which account information user chooses to edit
    
    /* For edit_name.php */
    if(isset($_POST['edit_name'])) {

        $edit_name = $_POST['edit_name'];

        $sql_update = "UPDATE users SET username = '$edit_name' WHERE uid = ".$_SESSION['uid']; 

        mysql_query($sql_update, $conn) or die(mysql_error());

        $_SESSION['msg'] = "Username edit successfully!";

        header('Location: ../account_info.php');  // Edit username successfully, go to account info page

    /* For edit_phone.php */            
    } elseif (isset($_POST['edit_phone'])) {

        $phone = $_POST['edit_phone'];

        // Format the phone number
        $edit_phone = sprintf("(%s)%s-%s",substr($phone, 0, 3),substr($phone, 3, 3),substr($phone, 6));

        $sql_update = "UPDATE users SET userphone = '$edit_phone' WHERE uid = ".$_SESSION['uid']; 

        mysql_query($sql_update, $conn) or die(mysql_error());

        $_SESSION['msg'] = "User phone number edit successfully!";

        header('Location: ../account_info.php');  // Edit phone number successfully, go to account info page

    /* For edit_login.php */
    } elseif (isset($_POST['new_email']) && isset($_POST['current_pwd'])) {

        $current_pwd = $_POST['current_pwd'];

        // Authenticate current user by his/her password
        $user_authenticate = mysql_query("SELECT * FROM users 
            WHERE password = '$current_pwd' AND uid = ".$_SESSION['uid'], $conn); 

        $user_count = mysql_num_rows($user_authenticate);

        // The password is correct
        if($user_count == 1) {

            $new_email = $_POST['new_email'];

            // Check whether the new email address has already been used by other users
            $email_check = mysql_query("SELECT uid FROM users WHERE email = '$new_email'", $conn);
            $row_check = mysql_fetch_array($email_check);
            $email_count = mysql_num_rows($email_check);

            //var_dump($email_count); var_dump($row_check['uid']); var_dump($_SESSION['uid']);exit;
            
            // New email address has already been used by other users
            if($email_count > 0 && $row_check['uid'] != $_SESSION['uid']) {

                $_SESSION['msg'] = "Email address \"".$new_email."\" has already been used.";

                header('Location: ../edit_login.php');  // Edit email failed, go back to edit login page

            // New email address has not been used, then update it
            } else {

                // If user also try to update the password
                if(!empty($_POST['password'])) {

                    $new_pwd = $_POST['password'];

                    $sql_update = "UPDATE users SET email = '$new_email', password = '$new_pwd' WHERE uid = ".$_SESSION['uid']; 
                
                } else {

                    $sql_update = "UPDATE users SET email = '$new_email' WHERE uid = ".$_SESSION['uid'];  

                }

                mysql_query($sql_update, $conn) or die(mysql_error());  

                $_SESSION['msg'] = "Login information edit successfully!";

                header('Location: ../account_info.php');  // Edit login info successfully, go to account info page

            }

        // The password is wrong
        } else {

            $_SESSION['msg'] = "Wrong password, please try again.";

            header('Location: ../edit_login.php');  // Wrong password, go back to login page

        }

    } else {

    	$_SESSION['msg'] = "Information edit failed, please try again.";
        
        header('Location: ../account_info.php');  // Information does not match, go back to account info page

    }

?>