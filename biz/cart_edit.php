
<!-- For editing cart quantity -->
<?php
	session_start();

    require_once('db.mysql.php');

    $pid = $_GET['pid'];
    $size = str_replace("b"," US",str_replace("a","Men's ",$_GET['size']));
    $qty = $_GET['qty'];

    // Determine whether user is logged in

    /* User is logged in, use database */
    if(isset($_SESSION['uid'])) {

        $sql_update = "UPDATE carts SET quantity = '$qty' 
                       WHERE pid = '$pid' AND size = \"$size\" AND uid = ".$_SESSION['uid']; 

        mysql_query($sql_update, $conn) or die(mysql_error());

        header('Location: ../cart.php');  // Edit a cart quantity successfully, redirect to cart page

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
                }

        // Lengths of three sessions do not match, then go back
        } else {

            $_SESSION['msg'] ="Edit cart quantity failed, please try again.";

            header('Location: ../cart.php');  // Edit a cart quantity failed, redirect to product detail page

        }

    }

?>