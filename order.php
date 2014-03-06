<?php
    require_once('biz/db.mysql.php');
?>
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
    <?php include_once('biz/validation.php'); ?>

    <?php 
        // Fetch data from orders table
        $sql_order = "SELECT order_num, aid, created_date, estimated_date, total, status  
                      FROM orders WHERE uid = ".$_SESSION['uid'];
        $result_order = mysql_query($sql_order, $conn);
        $order_count = mysql_num_rows($result_order);
          
        // Determine whether order is empty          
        if(empty($order_count)) {
            echo '<div class="decoration6">
                    <img src="images/decoration/decoration06.jpg">
                </div>';
        }
    ?>

    <div class="my_order">

        <h2>Order History</h2>

        <?php
            // Determine whether order is empty            
            if(empty($order_count)) {

                echo '<div class="order_empty">';
                    echo '<h2 class="no_order">No Orders Found.</h2>';
                    echo '<span>Click </span><a href="index.php">here</a><span> to continue shopping.</span>';
                echo '</div>';

            }
            else {

                // Display all of the order information
                while ($order = mysql_fetch_array($result_order)) {

                    // Fetch data from address table
                    $sql_address = "SELECT rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country 
                                    FROM addresses WHERE aid = '".$order['aid']."'";
                    $result_address = mysql_query($sql_address, $conn);
                    $address = mysql_fetch_array($result_address);

                    echo '<table>
                            <tr>
                                <td class="info" rowspan="2">
                                    <p><label>ORDER PLACED</label></p>
                                    <p><label class="date">'.date('F j, Y',strtotime($order['created_date'])).'</label></p>
                                    <p><label>ORDER#: '.$order['order_num'].'</label></p>
                                    <p><label>RECIPIENT: '.$address['rec_name'].'</label></p>
                                    <p><label>PHONE NUMBER: '.$address['rec_phone'].'</label></p>
                                    <p><label>DELIVERY ADDRESS:</label></p>
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
                                    <p><label>ESTIMATED DELIVERED ON 
                                       <span class="del_date">'.date('l, F j, Y',strtotime($order['estimated_date'])).'</span>
                                       </label>
                                    </p>
                                    <p><label class="status">'.$order['status'].'</label></p>
                                </td>
                            </tr>';

                    // Fetch data from order_details table
                    $sql_detail = "SELECT pid, size, quantity 
                                   FROM order_details WHERE order_num = '".$order['order_num']."'";
                    $result_detail = mysql_query($sql_detail, $conn);

                    $row = 0;

                    while ($detail = mysql_fetch_array($result_detail)) {

                        $row++;
                        // Fetch data from products table
                        $sql_product = "SELECT product_name, image 
                                       FROM products WHERE pid = '".$detail['pid']."'";
                        $result_product = mysql_query($sql_product, $conn);
                        $product = mysql_fetch_array($result_product);

                        echo '<tr>';
                            // Add a empty td from the second line
                            if($row > 1) { echo '<td class="empty_td"></td>'; }

                                echo '<td class="img">
                                        <a href="product_details.php?pid='.$detail['pid'].'">
                                            <img src="'.$product['image'].'">
                                        </a>
                                      </td>
                                    <td class="shoes_info">

                                        <p><label class="name">
                                            <a href="product_details.php?pid='.$detail['pid'].'">'.$product['product_name'].'</a>
                                            </label></p>
                                        <p><label>Sold by MyShoes.com</label></p>
                                        <p><label><strong>Product#: </strong>'.$detail['pid'].'</label></p>
                                        <p><label><strong>Size: </strong>'.$detail['size'].'</label></p>
                                        <p><label><strong>Quantity: </strong>'.$detail['quantity'].'</label></p>
                                        
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