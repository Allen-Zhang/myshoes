<?php require_once('model/db.mysql.php'); ?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Order</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <!-- Validate user login -->
    <?php include_once('util/validation.php'); ?>

    <?php 
        // Fetch data from orders table
        $orders = null;
        global $db;
        $sql = "SELECT order_num, aid, created_date, estimated_date, total, status  
                FROM orders WHERE uid = :uid";
        try {
            $statement = $db->prepare($sql);
            $statement->bindValue(':uid', $_SESSION['uid']);
            $statement->execute();
            $orders = $statement->fetchAll();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo 'Error Message: '.$e->getMessage();
        }

        // Determine whether order is empty          
        if(empty(count($orders))) {
            echo '<div class="decoration6">
                    <img src="images/decoration/decoration06.jpg">
                </div>';
        }
    ?>

    <div class="my_order">

        <h2>Order History</h2>

        <?php
            // Determine whether order is empty            
            if(empty(count($orders))) {

                echo '<div class="order_empty">';
                    echo '<h2 class="no_order">No Orders Found.</h2>';
                    echo '<span>Click </span><a href="index.php">here</a><span> to continue shopping.</span>';
                echo '</div>';

            }
            else {

                // Display all of the order information
                foreach($orders as $order) {

                    // Fetch data from address table
                    $sql = "SELECT rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country 
                            FROM addresses WHERE aid = :aid";
                    try {
                        $statement = $db->prepare($sql);
                        $statement->bindValue(':aid', $order['aid']);
                        $statement->execute();
                        $address = $statement->fetch();
                        $statement->closeCursor();
                    } catch (PDOException $e) {
                        echo 'Error Message: '.$e->getMessage();
                    }

                    echo '<table>
                            <tr>
                                <td class="info" rowspan="2">
                                    <div><label>ORDER PLACED</label></div>
                                    <div><label class="date">'.date('F j, Y',strtotime($order['created_date'])).'</label></div>
                                    <div><label>ORDER#: '.$order['order_num'].'</label></div>
                                    <div><label>RECIPIENT: '.$address['rec_name'].'</label></div>
                                    <div><label>PHONE NUMBER: '.$address['rec_phone'].'</label></div>
                                    <div><label>DELIVERY ADDRESS:</label></div>
                                    <ul>
                                        <li>'.$address['address_line_one'].'</li>';
                                if(!empty($address['address_line_one'])) {
                                    echo '<li>'.$address['address_line_two'].'</li>'; 
                                }    
                                  echo '<li>'.$address['city'].', '.$address['state'].', '.$address['zip'].',</li>
                                        <li>'.$address['country'].'</li>
                                    </ul>
                                    <label>TOTAL: <span class="total">$'.$order['total'].'</span></label>
                                </td>
                                <td class="status" colspan="2">
                                    <div><label>ESTIMATED DELIVERED ON 
                                       <span class="del_date">'.date('l, F j, Y',strtotime($order['estimated_date'])).'</span>
                                       </label>
                                    </div>
                                    <div><label class="status">'.$order['status'].'</label></div>
                                </td>
                            </tr>';

                    // Fetch data from order_details table
                    $sql = "SELECT pid, size, quantity FROM order_details WHERE order_num = :order_num";
                    try {
                        $statement = $db->prepare($sql);
                        $statement->bindValue(':order_num', $order['order_num']);
                        $statement->execute();
                        $details = $statement->fetchAll();
                        $statement->closeCursor();
                    } catch (PDOException $e) {
                        echo 'Error Message: '.$e->getMessage();
                    }

                    $row = 0;
                    foreach($details as $detail) {

                        $row++;
                        // Fetch data from products table
                        $sql = "SELECT product_name, image FROM products WHERE pid = :pid";
                        try {
                            $statement = $db->prepare($sql);
                            $statement->bindValue(':pid', $detail['pid']);
                            $statement->execute();
                            $product = $statement->fetch();
                            $statement->closeCursor();
                        } catch (PDOException $e) {
                            echo 'Error Message: '.$e->getMessage();
                        }

                        echo '<tr>';
                            // Add a empty td from the second line
                            if($row > 1) { echo '<td class="empty_td"></td>'; }

                                echo '<td class="img">
                                        <a href="controller/ProductsController.php?category=details&pid='.$detail['pid'].'">
                                            <img src="'.$product['image'].'01.jpg">
                                        </a>
                                      </td>
                                    <td class="shoes_info">
                                        <div><label class="name">
                                            <a href="controller/ProductsController.php?category=details&pid='.$detail['pid'].'">'.$product['product_name'].'</a>
                                            </label></div>
                                        <div><label>Sold by MyShoes.com</label></div>
                                        <div><label><strong>Product#: </strong>'.$detail['pid'].'</label></div>
                                        <div><label><strong>Size: </strong>'.$detail['size'].'</label></div>
                                        <div><label><strong>Quantity: </strong>'.$detail['quantity'].'</label></div>
                                    </td>
                                </tr>';
                    }
                    echo '</table>';
                } 
                echo '<div class="order_back"><a href="account_info.php"><input type="button" value="Go back"></a></div>';
            }
        ?>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>
  
 </body>
</html>