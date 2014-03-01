
<!-- For editing delivery address -->
<?php
    session_start();

    require_once('db.mysql.php');

    $aid = $_POST['aid'];
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

     $sql_update = "UPDATE addresses 
                    SET rec_name = '$rec_name', rec_phone = '$rec_phone', address_line_one = '$address_line1', 
                        address_line_two = '$address_line2', city = '$city', state = '$state', zip = '$zip', country = '$country' 
                    WHERE aid = '$aid' AND uid = ".$_SESSION['uid'] or die(mysql_error()); 
 
    mysql_query($sql_update, $conn);

    // Determine which page should go after updating
    
    /* Go to account_info.php page */
    if($page == "edit_address") {

        $_SESSION['msg'] = "Delivery address edit successfully!";

        header('Location: ../account_info.php');  // Delivery address edit successfully, redirect to account info page

    /* Go to payment.php page to continue the payment */
    } elseif ($page == "address") {
    
        // Fetch new address id
        $_SESSION['aid'] = $aid;

        header('Location: ../payment.php');  // Delivery address edit successfully, redirect to payment page

    } else {

        $_SESSION['msg'] = "Delivery address edit failed.";

        header('Location: ../account_info.php');  // Delivery address edit failed, redirect to account info page

    }

?>