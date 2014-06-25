<?php
session_start();
require_once('../model/db.mysql.php');
require_once('../model/Address.php');

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

	case 'address_diaplay':
		$uid = $_SESSION['uid'];
		$array = get_address($uid);
		$_SESSION['address'] = $array;
		header('Location: ../edit_address.php');
		break;

	case 'address_add':
	    $page = $_POST['page'];
	    $uid = $_SESSION['uid'];
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
	    $new_id = add_address($uid, $rec_name, $rec_phone, $address_line1, 
        				      $address_line2, $city, $state, $zip, $country);
    	if(!empty($new_id)) {
    		// Determine which page invokes this function    
		    /* Request is from edit_address.php page */
		    if($page == "edit_address") {
		        $_SESSION['msg'] = "New delivery address add successfully!";
		        header('Location: ../account_info.php');  // Delivery address add successfully, redirect to account info page
		        exit;
		    /* Request is from address.php page */
		    } elseif ($page == "address") {
		        // Fetch new address id
		        $_SESSION['aid'] = $new_id;
		        header('Location: ../payment.php?step=next');  // Delivery address add successfully, redirect to payment page
		        exit;
		    }
		} else {
			$_SESSION['msg'] = "New delivery address add failed.";
	        header('Location: ../account_info.php');  // Delivery address add failed, redirect to account info page
	        exit;
		}
		break;

	case 'address_update':
	    $page = $_POST['page'];
	    $uid = $_SESSION['uid'];
	    $aid = $_POST['aid'];
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
	    if(update_address($uid, $aid, $rec_name, $rec_phone, $address_line1, 
                          $address_line2, $city, $state, $zip, $country)) {
		    // Determine which page should go after updating		    
		    /* Go to account_info.php page */
		    if($page == "edit_address") {
		        $_SESSION['msg'] = "Delivery address edit successfully!";
		        header('Location: ../account_info.php');  // Delivery address edit successfully, redirect to account info page
		        exit;
		    /* Go to payment.php page to continue the payment */
		    } elseif ($page == "address") {		    
		        $_SESSION['aid'] = $aid;
		        header('Location: ../payment.php?step=next');  // Delivery address edit successfully, redirect to payment page
		        exit;
		    }
		} else {
	        $_SESSION['msg'] = "Delivery address edit failed.";
	        header('Location: ../account_info.php');  // Delivery address edit failed, redirect to account info page
	        exit;
		}
		break;

	case 'address_delete':
		$uid = $_SESSION['uid'];
		$aid = $_GET['aid'];
    	$page = $_GET['page'];
    	if(delete_address($aid)) {
    		// Determine which page should go after deleting
			if($page == "address") {
				$array = get_address($uid);
				$_SESSION['address'] = $array;
	            header('Location: ../address.php?step=next');  // Delivery address delete successfully, redirect to address page
	            exit;
	        } else {
	            $_SESSION['msg'] = "Delivery address delete successfully!";
	            header('Location: ../account_info.php');  // Delivery address delete successfully, redirect to account info page
	            exit;
	        }
    	} else {
	        $_SESSION['msg'] = "Delivery address delete failed.";
	        header('Location: ../account_info.php');  // Delivery address delete failed, redirect to account info page
	        exit;
    	}
		break;

}

?>