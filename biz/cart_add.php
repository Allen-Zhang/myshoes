
<!-- For adding cart -->
<?php
	session_start();

    require_once('db.mysql.php');

    $pid = $_POST['pid'];
    $size = $_POST['size'];
    $qty = $_POST['qty'];

    // Determine whether user is logged in
    
    /* User is logged in, use database */
    if(isset($_SESSION['uid'])) {

        $sql_insert = "INSERT INTO carts (uid, pid, size, quantity) 
                       VALUES (".$_SESSION['uid'].", '$pid', \"$size\", '$qty')";

        mysql_query($sql_insert, $conn) or die(mysql_error());

        header('Location: ../cart.php');  // Add to cart successfully, redirect to cart page

    /* User is not logged in, use session */
    } else {

        // Determine whether the cart is empty 
        if(empty($_SESSION['pid']) && empty($_SESSION['size']) && empty($_SESSION['qty'])) {

            $_SESSION['pid'] = $pid;
            $_SESSION['size'] = $size;
            $_SESSION['qty'] = $qty;

            header('Location: ../cart.php');  // Add a new cart successfully, redirect to cart page

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

            // Lengths of three sessions do not match, then go back
            } else {

                $_SESSION['msg'] ="Add to cart failed, please try again.";

                header("Location: ../product_details.php?pid=$pid");  // Add to cart failed, redirect to product detail page

            }

        }

    }

?>