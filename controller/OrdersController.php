<?php
session_start();
require_once('../model/db.mysql.php');
require_once('../model/Cart.php');
require_once('../model/Product.php');
require_once('../model/Order.php');

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

	case 'order_add':
		$uid = $_SESSION['uid'];
		$aid = $_POST['address'];
	    $name_on_card = $_POST['name_on_card'];
	    $card_num = $_POST['card_number'];
	    $exp_date = $_POST['exp_date'];
	    $total = $_POST['total'];
	    $carts = $_POST['carts'];
	    $order_num = date("Ymd-His").'-'.rand(100000,900000);  // Create a order number
	    $created_date = date("Y-m-d");
	    $estimated_date = date("Y-m-d",strtotime("+5 day"));
	    $status = 'Shipping'; 
	    /* Create a order record */
	    $new_oid = add_order($order_num, $uid, $aid, $created_date, $estimated_date, 
	    			  	    $name_on_card, $card_num, $exp_date, $total, $status);
	    // Validate
	    if(empty($new_oid)) {
			$_SESSION['msg'] = "Failed";
	        header('Location: ../confirmation_result.php?step=next');  // Payment failed, go to confirmation result page
	        exit;
	    }
	    /* 
	    * Create corresponding order details for the order,
	    * delete the corresponding records in carts,
	    * and update corresponding amount in products 
	    */
	    $cart = explode(",", $carts); 
	    for($i = 0; $i < count($cart); $i++) {
	    	$result = get_cart($cart[$i]);
	    	// Create order details
	    	$new_odid = add_order_details($order_num, $result['pid'], $result['size'], $result['quantity']);
	    	// Validate
	    	if(empty($new_odid)) {
		    	$_SESSION['msg'] = "Failed";
		        header('Location: ../confirmation_result.php?step=next');  // Payment failed, go to confirmation result page
		        exit;
	    	}
	        // Update amount in products table
	        $details = get_product_details($result['pid']);
	        $left =  $details['amount'] - $result['quantity'];
	        if($left > 0) {
	        	$flag = update_product_amount($left, $result['pid']);
	        	// Validate
	        	if(!$flag) {
	        		$_SESSION['msg'] = "Failed";
			        header('Location: ../confirmation_result.php?step=next');  // Payment failed, go to confirmation result page
			        exit;
	        	}
	        }
	        // Delete cart items
	        $flag = delete_cart_by_id($cart[$i]);
	        	// Validate
	        	if(!$flag) {
	        		$_SESSION['msg'] = "Failed";
			        header('Location: ../confirmation_result.php?step=next');  // Payment failed, go to confirmation result page
			        exit;
	        	}
	    }
	    // Passing all validations, then
        $_SESSION['msg'] = "Successful";
        header("Location: ../confirmation_result.php?oid=$new_oid&step=next");  // Payment successfully, go to confirmation result page
		break;

	case 'order_display':
		$today = date("Ymd");
		$array = get_order_status();  
		foreach ($array as $result) {
			// Update order status after estimated deliveried date
			if($today > str_replace("-","",$result["estimated_date"])) {
				update_status($result["order_num"]);
			}
		}
		header('Location: ../order.php');
		break;
}

?>