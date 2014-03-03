
<!-- For deleting cart -->
<?php
	session_start();

    require_once('db.mysql.php');

    $pid = $_GET['pid'];
    $size = $_GET['size'];
    
    // Determine whether user is logged in

    /* User is logged in, use database */
    if(isset($_SESSION['uid'])) {

        $sql_delete = "DELETE FROM carts  WHERE uid = ".$_SESSION['uid']." AND pid = '$pid' AND size = \"$size\"";

        mysql_query($sql_delete, $conn) or die(mysql_error());

        header('Location: ../cart.php');  // Delete a cart successfully, redirect to cart page

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

        // Lengths of three sessions do not match, then go back
        } else {

            $_SESSION['msg'] ="Delete cart failed, please try again.";

            header('Location: ../cart.php');  // Delete a cart failed, redirect to product detail page

        }

    }

?>