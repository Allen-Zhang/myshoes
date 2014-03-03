
<!-- For adding delivery address -->
<?php
	session_start();

    require_once('db.mysql.php');

    $page = $_POST['page'];

    $rec_name = $_POST['rec_name'];
    $phone = $_POST['rec_phone'];
    // Format the phone number like (000)000-0000
    $rec_phone = sprintf("(%s)%s-%s",substr($phone, 0, 3),substr($phone, 3, 3),substr($phone, 6));
    $address_line1 = strtoupper($_POST['address_line1']);
    $address_line2 = strtoupper($_POST['address_line2']);
    $city = strtoupper($_POST['city']);
    $state = strtoupper($_POST['state']);
    $zip = $_POST['zip'];
    $country = $_POST['country'];

    $sql_insert = "INSERT INTO addresses (uid, rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country) 
                       VALUES (".$_SESSION['uid'].", '$rec_name', '$rec_phone', '$address_line1', '$address_line2', '$city', '$state', '$zip', '$country')" or die(mysql_error());

    mysql_query($sql_insert, $conn);

    // Determine which page invokes this function
    
    /* Request is from edit_address.php page */
    if($page == "edit_address") {

        $_SESSION['msg'] = "Delivery address add successfully!";

        header('Location: ../account_info.php');  // Delivery address add successfully, redirect to account info page

    /* Request is from address.php page */
    } elseif ($page == "address") {
    
        // Fetch new address id
        $_SESSION['aid'] = mysql_insert_id($conn);

        header('Location: ../payment.php');  // Delivery address add successfully, redirect to payment page

    } else {

        $_SESSION['msg'] = "Delivery address add failed.";

        header('Location: ../account_info.php');  // Delivery address add failed, redirect to account info page

    }

?>