<?php
session_start();
require_once('../model/db.mysql.php');
require_once('../model/Product.php');
require_once('../model/Address.php');
require_once('../model/Cart.php');

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

	case 'cart_add':
		$pid = $_POST['pid'];
	    $size = $_POST['size'];
	    $qty = $_POST['qty'];
	    // Determine whether user is logged in
	    /* User is logged in, use database */
	    if(isset($_SESSION['uid'])) {
	    	$check_qty = check_cart($_SESSION['uid'], $pid, $size);
    		// Determine whether exist the same cart
    		if(!empty($check_qty)) {
    			$quantity = $qty + $check_qty;
    			update_cart($quantity, $pid, $size, $_SESSION['uid']);
    			header('Location: ../cart.php');  // Update cart successfully, redirect to cart page
			    exit;
    		} else {
				$new_id = add_cart($_SESSION['uid'], $pid, $size, $qty);
				if(!empty($new_id)) {
			        header('Location: ../cart.php');  // Add to cart successfully, redirect to cart page
			        exit;
			    } else {
			    	$array = get_product_details($pid);
					$_SESSION['details'] = $array;
			    	$_SESSION['msg'] = "Add to cart failed, please try again";
			        header('Location: ../product_details.php');  // Add to cart failed, redirect to product details page
			        exit;
			    }
			}
	    /* User is not logged in, use session */
	    } else {
	        // Determine whether the cart is empty 
	        if(empty($_SESSION['pid']) && empty($_SESSION['size']) && empty($_SESSION['qty'])) {
	            $_SESSION['pid'] = $pid;
	            $_SESSION['size'] = $size;
	            $_SESSION['qty'] = $qty;
	            header('Location: ../cart.php');  // Add a new cart successfully, redirect to cart page
	            exit;
	        } else {
	            $pro_id = explode(",", $_SESSION['pid']);
	            $pro_size = explode(",", $_SESSION['size']);
	            $pro_qty = explode(",", $_SESSION['qty']);
	            // Lengths of three sessions match, then continue
	            if(count($pro_id) == count($pro_size) && count($pro_id) == count($pro_qty)) {
	                // If user added a same cart (same product and size), combine them
	                for($i = 0; $i < count($pro_id); $i++)                        
	                    if($pro_id[$i] == $pid && $pro_size[$i] == $size) {          
	                        $pro_qty[$i] += $qty;  // Update product quantity in the cart   
	                        // Update the session of product quantity
	                        $_SESSION['qty'] = implode(",", $pro_qty);
	                        header('Location: ../cart.php');  // Add a same cart successfully, redirect to cart page
	                        exit;
	                    }
	                // Otherwise add a new cart record
	                $_SESSION['pid'] = $_SESSION['pid'].",".$pid;
	                $_SESSION['size'] = $_SESSION['size'].",".$size;
	                $_SESSION['qty'] = $_SESSION['qty'].",".$qty;
	                header('Location: ../cart.php');  // Add a new cart successfully, redirect to cart page
	                exit;
	            // Lengths of three sessions do not match, then go back
	            } else {
	                $_SESSION['msg'] ="Add to cart failed, please try again.";
	                header("Location: ../product_details.php?pid=$pid");  // Add to cart failed, redirect to product detail page
	                exit;
	            }
	        }
	    }
		break;

	case 'cart_update':
		$pid = $_GET['pid'];
	    $size = str_replace("b"," US",str_replace("a","Men's ",$_GET['size']));
	    $qty = $_GET['qty'];
	    // Determine whether user is logged in
	    /* User is logged in, use database */
	    if(isset($_SESSION['uid'])) {
	        update_cart($qty, $pid, $size, $_SESSION['uid']);
	        header('Location: ../cart.php');  // Edit a cart quantity successfully, redirect to cart page
	        exit;
	    /* User is not logged in, use session */
	    } else {
	        $pro_id = explode(",", $_SESSION['pid']);
	        $pro_size = explode(",", $_SESSION['size']);
	        $pro_qty = explode(",", $_SESSION['qty']);
	        // Lengths of three sessions match, then continue
	        if(count($pro_id) == count($pro_size) && count($pro_id) == count($pro_qty)) {
	            for($i = 0; $i < count($pro_id); $i++)	                      
	                if($pro_id[$i] == $pid && $pro_size[$i] == $size) {	            
	                    $pro_qty[$i] = $qty;  // Update product quantity in the cart   
	                    // Update the session of product quantity
	                    $_SESSION['qty'] = implode(",", $pro_qty);
	                    header('Location: ../cart.php');  // Edit a cart quantity successfully, redirect to cart page
	                    exit;
	                }
	        // Lengths of three sessions do not match, then go back
	        } else {
	            $_SESSION['msg'] ="Edit cart quantity failed, please try again.";
	            header('Location: ../cart.php');  // Edit a cart quantity failed, redirect to product detail page
	            exit;
	        }
	    }
		break;

	case 'cart_delete':
		$pid = $_GET['pid'];
	    $size = $_GET['size'];	    
	    // Determine whether user is logged in
	    /* User is logged in, use database */
	    if(isset($_SESSION['uid'])) {
			delete_cart($_SESSION['uid'], $pid, $size);
			header('Location: ../cart.php');  // Delete a cart successfully, redirect to cart page
			exit;
	    /* User is not logged in, use session */
	    } else {      
	        $pro_id = explode(",", $_SESSION['pid']);
	        $pro_size = explode(",", $_SESSION['size']);
	        $pro_qty = explode(",", $_SESSION['qty']);
	        // Lengths of three sessions match, then continue
	        if(count($pro_id) == count($pro_size) && count($pro_id) == count($pro_qty)) {
	            for($i = 0; $i < count($pro_id); $i++)	                       
	                if($pro_id[$i] != $pid || $pro_size[$i] != $size) {	            
	                    $new_id[] = $pro_id[$i];
	                    $new_size[] = $pro_size[$i];
	                    $new_qty[] = $pro_qty[$i];
	                }	                
	            $_SESSION['pid'] = implode(",", $new_id);
	            $_SESSION['size'] = implode(",", $new_size);
	            $_SESSION['qty'] = implode(",", $new_qty);
	            header('Location: ../cart.php');  // Delete a cart successfully, redirect to cart page
	            exit;
	        // Lengths of three sessions do not match, then go back
	        } else {
	            $_SESSION['msg'] ="Delete cart failed, please try again.";
	            header('Location: ../cart.php');  // Delete a cart failed, redirect to product detail page
	            exit;
	        }
	    }
		break;

	case 'cart_submit':
		// Determine whether user has logined
	    if(!isset($_SESSION['uid'])) {
	        $_SESSION['msg'] = "Please login first";
	        $_SESSION['continue'] = "Continue to check out";
	        header('Location: ../login.php');
	        exit;
	    } else {
	    	$array = get_address($_SESSION['uid']);
			$_SESSION['address'] = $array;
	        $_SESSION['cart'] = $_POST['carts'];  // Record all carts information in session carts
	        header('Location: ../address.php?step=next');  // User is logged in, redirect to address page
	        exit;
	    }
		break;

}

?>