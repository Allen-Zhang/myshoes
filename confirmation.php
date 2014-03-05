<?php
    require_once('biz/db.mysql.php');
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Confirmation</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>
    
    <?php
        $name_on_card = $_POST['name_on_card'];
        $card_number = $_POST['card_number'];
        $exp_date = $_POST['month'].'/'.$_POST['year'];

        if(isset($_SESSION['aid'])) {
            $aid = $_SESSION['aid'];
            unset($_SESSION['aid']);
        } else {
            header('Location: ../address.php');  // aid session is not set, redirect to address page
            exit;
        }

        if(isset($_SESSION['cart'])) {
            $carts = $_SESSION['cart'];
            unset($_SESSION['cart']);
        } else {
            header('Location: ../cart.php');  // cart session is not set, redirect to cart page
            exit;
        }
                        
        $cart = explode(",", $carts);
        $subtotal = 0.00;

        $sql_1 = "SELECT rec_name, address_line_one, address_line_two, city, state, zip, country 
                  FROM addresses 
                  WHERE aid = ".$aid;
        $result_1 = mysql_query($sql_1, $conn);
        $row_1 = mysql_fetch_array($result_1);        
    ?>

    <div class="confirmation">

        <h2>Your Order Confirmation</h2>

        <form action="biz/order_payment.php" method="post">

            <div class="con_info">
                <ul>
                    <li><label>Shipping from:&nbsp;&nbsp;</label>MyShoes.com</li>
                    <li><label>Shipping to:&nbsp;&nbsp;</label><?php echo $row_1[0].', '.$row_1[1].', '.$row_1[2];?></li>
                    <li class="desc"><?php echo $row_1[3].', '.$row_1[4].', '.$row_1[5].', '.$row_1[6];?></li>
                    <li><label>Card number:&nbsp;&nbsp;</label><?php echo $card_number;?></li>
                    <li><label>Name on card:&nbsp;&nbsp;</label><?php echo $name_on_card;?></li>
                </ul>
            </div>

            <table class="order" rules=rows>

            <?php            
                for($i = 0; $i < count($cart); $i++) {

                $sql_2 = "SELECT carts.pid, size, quantity, product_name, price, image 
                          FROM carts, products 
                          WHERE carts.pid = products.pid AND cid = ".$cart[$i];
                $result_2 = mysql_query($sql_2, $conn);
                $row_2 = mysql_fetch_array($result_2);

                $subtotal = sprintf("%.2f", ($subtotal + $row_2[4] * $row_2[2])); 
                $shipping = 8.75;
                $tax = sprintf("%.2f", ($subtotal * 0.0635));
                $order_total = sprintf("%.2f", ($subtotal + $shipping + $tax));

                echo '<tr>
                        <td class="td_img"><a href="product_details.php?pid='.$row_2[0].'"><img src="'.$row_2[5].'"></a></td>
                        <td class="info">
                            <a href="product_details.php?pid='.$row_2[0].'">'.$row_2[3].'</a><br/>
                            <strong>Product#: </strong>'.$row_2[0].'<br/>
                            <strong>Size: </strong>'.$row_2[1].'
                        </td>
                        <td class="td_qty"><strong>Quantity: </strong>'.$row_2[2].'</td>
                        <td class="td_price"><strong>Unit Price: </strong>$'.$row_2[4].'</td>
                    </tr>';
                }
            ?>
            </table>

            <div class="confirm_bottom">
                <table class="price">
                    <tr>
                        <td><label>Subtotal:</label></td>
                        <td><label>$<?php echo $subtotal;?></label></td>
                    </tr>
                    <tr>
                        <td><label>Shipping:</label></td>
                        <td><label>$<?php echo $shipping;?></label></td>
                    </tr>
                    <tr>
                        <td><label>Tax:</label></td>
                        <td><label>$<?php echo $tax;?></label></td>
                    </tr>
                    <tr>
                        <td><label class="order_total">Order Total:</label></td>
                        <td><label class="order_total">$<?php echo $order_total;?></label></td>
                    </tr>         
                </table>
                <div>
                    <input type="hidden" name="address" value="<?php echo $aid;?>">
                    <input type="hidden" name="name_on_card" value="<?php echo $name_on_card;?>">
                    <input type="hidden" name="card_number" value="<?php echo $card_number;?>">
                    <input type="hidden" name="exp_date" value="<?php echo $exp_date;?>">
                    <input type="hidden" name="total" value="<?php echo $order_total;?>">
                    <input type="hidden" name="carts" value="<?php echo $carts;?>">
                    <input type="submit" name="pay" value="Pay for it">
                </div>
            </div>

        </form>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>
  
 </body>
</html>