
<!-- For adding delivery address -->
<?php
	session_start();

    require_once('db.mysql.php');

    $aid = $_POST['address'];
    $name_on_card = $_POST['name_on_card'];
    $card_number = $_POST['card_number'];
    $exp_date = $_POST['exp_date'];
    $total = $_POST['total'];
    $carts = $_POST['carts'];

    $order_num = date("Ymd-His").'-'.rand(100000,900000);  // Create a order number
    $created_date = date("Y-m-d");
    $estimated_date = date("Y-m-d",strtotime("+5 day"));
    
    /* Create a order record */
    $insert_order = "INSERT INTO orders (order_num, uid, aid, created_date, estimated_date, name_on_card, card_num, exp_date, total, status) VALUES ('$order_num', ".$_SESSION['uid'].", '$aid', '$created_date', '$estimated_date', '$name_on_card', '$card_number', '$exp_date', '$total', 'Shipping')";

    mysql_query($insert_order, $conn) or die(mysql_error());
    $oid = mysql_insert_id($conn);

    /* 
    * Create corresponding order details for the order
    * and delete the corresponding records in carts 
    */
    $cart = explode(",", $carts); 

    for($i = 0; $i < count($cart); $i++) {

        $select_cart = "SELECT pid, size, quantity FROM carts WHERE cid = ".$cart[$i];
        $result = mysql_query($select_cart, $conn);
        $row = mysql_fetch_array($result);

        // Create order details
        $insert_order_detail = "INSERT INTO order_details (order_num, pid, size, quantity) 
                                VALUES ('$order_num', '$row[0]', \"$row[1]\", '$row[2]')";
        mysql_query($insert_order_detail, $conn) or die(mysql_error());

        // Delete cart items
        $delete_cart = "DELETE FROM carts WHERE cid = ".$cart[$i];
        mysql_query($delete_cart, $conn) or die(mysql_error());

    }

    /* Check the result of payment operation */
    $check = mysql_query("SELECT * FROM order_details WHERE order_num = '$order_num'", $conn);
    $detials_count = mysql_num_rows($check);

    if(!empty($oid) && $detials_count == count($cart)) {

        $_SESSION['msg'] = "Successful";

        header("Location: ../confirmation_result.php?oid=$oid");  // Payment successfully, redirect to confirmation result page

    } else {

        $_SESSION['msg'] = "Failed";

        header('Location: ../confirmation_result.php');  // Payment failed, redirect to confirmation result page

    }

?>