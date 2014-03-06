
<!-- For submitting cart -->
<?php
	session_start();

    require_once('db.mysql.php');

    // Determine whether user has logined
    if(!isset($_SESSION['uid'])) {

        $_SESSION['msg'] = "Please login first";
        $_SESSION['continue'] = "Continue to check out";

        header('Location: ../login.php');

    } else {

        $_SESSION['cart'] = $_POST['carts'];  // Record all carts information in session carts

        header('Location: ../address.php?step=next');  // User is logged in, redirect to address page

    }


?>