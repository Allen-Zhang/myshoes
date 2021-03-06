<?php require_once('model/db.mysql.php'); ?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8"/>
  <title>Cart</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css">
  <script type="text/javascript" src="js/utility.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <?php 
        $rows = null;
        // If user is logged in
        if(isset($_SESSION['uid'])) {
            global $db;
            $sql = "SELECT carts.pid, size, quantity, product_name, price, image, cid 
                    FROM carts, products 
                    WHERE carts.pid = products.pid AND uid = :uid";
            try {
                $statement = $db->prepare($sql);
                $statement->bindValue(':uid', $_SESSION['uid']);
                $statement->execute();
                $rows = $statement->fetchAll();
                $statement->closeCursor();
            } catch (PDOException $e) {
                echo 'Error Message: '.$e->getMessage();
            }
        }
        // Determine whether cart is empty        
        if(empty(count($rows)) && empty($_SESSION['pid'])) {
            echo '<div class="decoration5">
                    <img src="images/decoration/decoration05.jpg">
                  </div>';
        }
    ?>

    <div class="cart">

        <h2>My Shopping Cart</h2>

        <?php
            $subtotal = 0.00;
            $i = 0;

            // Determine whether cart is empty 
            
            /* For logged-in user */
            if(!empty(count($rows))) {

              $cid_record = "";  // If cart is not empty, initiate a variable to record all cids

              echo '<form action="controller/CartsController.php" method="post">
                      <table rules=rows>
                        <tr class="cart_th">
                          <th colspan="2">SHOES</th>
                          <th>QUANTITY</th>
                          <th>UNIT PRICE</th>
                          <th>TOTAL</th>
                          <th>ACTION</th>
                        </tr>';

              foreach($rows as $row) {

                // Record all cids in cid_record variable
                if($cid_record == "")
                  $cid_record = $row['cid'];
                else 
                  $cid_record = $cid_record.','.$row['cid'];  

                $total = sprintf("%.2f", ($row[4] * $row[2]));
                $subtotal = sprintf("%.2f", ($subtotal + $total)); 
                $shipping = 8.75;
                $tax = sprintf("%.2f", ($subtotal * 0.0635));
                $order_total = sprintf("%.2f", ($subtotal + $shipping + $tax));
                $i++;

                echo '<tr>
                        <td class="cart_td_img">
                          <a href="controller/ProductsController.php?category=details&pid='.$row[0].'"><img src="'.$row[5].'01.jpg"></a>
                        </td>
                        <td class="cart_td_name">
                          <label class="name">
                            <a href="controller/ProductsController.php?category=details&pid='.$row[0].'">'.$row[0].'</a>
                          </label><br/>
                          <label><strong>Product#: </strong>'.$row[0].'</label><br/>
                          <label><strong>Size: </strong>'.$row[1].'</label>
                        </td>
                        <td class="cart_quantity">
                          <input type="text" id="count'.$i.'" value="'.$row[2].'" maxlength="2" required 
                            onblur="checkCartQty(\'count'.$i.'\', '.$row[2].')">&nbsp;
                          <a href="javascript:redirect(\''.$row[0].'\',\''.str_replace(" US","b",str_replace("Men's ","a",$row[1])).'\','.$i.')">
                            <input type="button" value="Update">
                          </a>
                        </td>
                        <td class="cart_td">$'.$row[4].'</td>
                        <td class="cart_td">$'.$total.'</td>
                        <td class="cart_td">
                          <a href="controller/CartsController.php?pid='.$row[0].'&size='.$row[1].'&action=cart_delete" onclick="return comfirmDelCart()">
                            <input type="button" value="Remove">
                          </a>
                        </td>
                      </tr>';

              }

              echo '</table>
                    <div class="cart_bottom">
                      <table>
                        <tr>
                          <td><label>Subtotal:</label></td>
                          <td><label>$'.$subtotal.'</label></td>
                        </tr>
                        <tr>
                          <td><label>Shipping:</label></td>
                          <td><label>$'.$shipping.'</label></td>
                        </tr>
                        <tr>
                          <td><label>Tax:</label></td>
                          <td><label>$'.$tax.'</label></td>
                        </tr>
                        <tr>
                          <td><label>Order Total:</label></td>
                          <td><label class="order_total">$'.$order_total.'</label></td>
                        </tr>
                      </table>
                      <input type="hidden" name="carts" value="'.$cid_record.'">
                      <input type="hidden" name="action" value="cart_submit">
                      <input type="submit" value="Checkout">
                      <a href="index.php"><input type="button" value="Continue Shopping"></a>  
                    </div>   
                    </form>';

            /* For non-logged-in user */
            } elseif (!empty($_SESSION['pid'])) {
              
                echo '<form action="controller/CartsController.php" method="post">
                        <table rules=rows>
                          <tr class="cart_th">
                            <th colspan="2">SHOES</th>
                            <th>QUANTITY</th>
                            <th>UNIT PRICE</th>
                            <th>TOTAL</th>
                            <th>ACTION</th>
                          </tr>';

                $pro_id = explode(",", $_SESSION['pid']);
                $pro_size = explode(",", $_SESSION['size']);
                $pro_qty = explode(",", $_SESSION['qty']);

                for($i = 0; $i < count($pro_id); $i++) {

                  $sql = "SELECT product_name, price, image FROM products WHERE pid = :pid";
                  try {
                      $statement = $db->prepare($sql);
                      $statement->bindValue(':pid', $pro_id[$i]);
                      $statement->execute();
                      $row = $statement->fetch();
                      $statement->closeCursor();
                  } catch (PDOException $e) {
                      echo 'Error Message: '.$e->getMessage();
                  }

                  $total = sprintf("%.2f", ($row[1] * $pro_qty[$i]));
                  $subtotal = sprintf("%.2f", ($subtotal + $total)); 
                  $shipping = 8.75;
                  $tax = sprintf("%.2f", ($subtotal * 0.0635));
                  $order_total = sprintf("%.2f", ($subtotal + $shipping + $tax));

                  echo '<tr>
                          <td class="cart_td_img">
                            <a href="controller/ProductsController.php?category=details&pid='.$pro_id[$i].'"><img src="'.$row[2].'01.jpg"></a>
                          </td>
                          <td class="cart_td_name">
                            <label class="name">
                              <a href="controller/ProductsController.php?category=details&pid='.$pro_id[$i].'">'.$row[0].'</a>
                            </label><br/>
                            <label><strong>Product#: </strong>'.$pro_id[$i].'</label><br/>
                            <label><strong>Size: </strong>'.$pro_size[$i].'</label>
                          </td>
                          <td class="cart_quantity">
                            <input type="text" id="count'.$i.'" value="'.$pro_qty[$i].'" maxlength="2" required 
                              onblur="checkCartQty(\'count'.$i.'\', '.$pro_qty[$i].')">&nbsp;
                            <a href="javascript:redirect(\''.$pro_id[$i].'\',\''.str_replace(" US","b",str_replace("Men's ","a",$pro_size[$i])).'\','.$i.')">
                              <input type="button" value="Update">
                            </a>
                          </td>
                          <td class="cart_td">$'.$row[1].'</td>
                          <td class="cart_td">$'.$total.'</td>
                          <td class="cart_td">
                            <a href="controller/CartsController.php?pid='.$pro_id[$i].'&size='.$pro_size[$i].'&action=cart_delete" onclick="return comfirmDelCart()">
                              <input type="button" value="Remove">
                            </a>
                          </td>
                        </tr>';
                }

                echo '</table>
                      <div class="cart_bottom">
                        <table>
                          <tr>
                            <td><label>Subtotal:</label></td>
                            <td><label>$'.$subtotal.'</label></td>
                          </tr>
                          <tr>
                            <td><label>Shipping:</label></td>
                            <td><label>$'.$shipping.'</label></td>
                          </tr>
                          <tr>
                            <td><label>Tax:</label></td>
                            <td><label>$'.$tax.'</label></td>
                          </tr>
                          <tr>
                            <td><label>Order Total:</label></td>
                            <td><label class="order_total">$'.$order_total.'</label></td>
                          </tr>
                        </table>
                        <input type="hidden" name="action" value="cart_submit">
                        <input type="submit" value="Checkout">
                        <a href="index.php"><input type="button" value="Continue Shopping"></a>  
                      </div>   
                      </form>';

            } else {

                echo '<div class="cart_empty"> 
                        <h2 class="no_cart">Your Cart is Empty</h2> 
                        <span>You have no items in your current cart.<span><br/><br/> 
                        <span>Click </span><a href="index.php">here</a><span> to continue shopping.</span>';
                echo '</div>';
                
            }
        ?>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

 </body>
</html>