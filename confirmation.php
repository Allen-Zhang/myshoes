<?php
    require_once('model/db.mysql.php');

    if(empty($_POST['name_on_card']) || empty($_POST['card_number'])) {
        header('Location: index.php');  // Illegal access, redirect to main page
        exit;
    }
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

    <!-- Validate user login -->
    <?php include_once('util/validation.php'); ?>
    
    <?php
        $name_on_card = $_POST['name_on_card'];
        $card_number = $_POST['card_number'];
        $exp_date = $_POST['month'].'/'.$_POST['year'];

        if(isset($_SESSION['aid'])) {
            $aid = $_SESSION['aid'];
        } else {
            echo 'Error Message: Delivery address set error, please reset a delivery address.';
            exit;
        }
        if(isset($_SESSION['cart'])) {
            $carts = $_SESSION['cart'];
        } else {
            echo 'Error Message: Carts set error, please check out again.';
            exit;
        }
                        
        $cart = explode(",", $carts);
        $subtotal = 0.00;

        global $db;
        $query_address = "SELECT rec_name, address_line_one, address_line_two, city, state, zip, country 
                          FROM addresses WHERE aid = :aid";
        try {
            $statement = $db->prepare($query_address);
            $statement->bindValue(':aid', $aid);
            $statement->execute();
            $address = $statement->fetch();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo 'Error Message: '.$e->getMessage();
        }   
    ?>

    <div class="confirmation">

        <h2>Your Order Confirmation</h2>

        <form action="controller/OrdersController.php" method="post">

            <div class="con_info">
                <ul>
                    <li><label>Shipping from:&nbsp;&nbsp;</label>MyShoes.com</li>
                    <li><label>Shipping to:&nbsp;&nbsp;</label><?php echo $address[0].', '.$address[1].', '.$address[2];?></li>
                    <li class="desc"><?php echo $address[3].', '.$address[4].', '.$address[5].', '.$address[6];?></li>
                    <li><label>Card number:&nbsp;&nbsp;</label><?php echo $card_number;?></li>
                    <li><label>Name on card:&nbsp;&nbsp;</label><?php echo $name_on_card;?></li>
                </ul>
            </div>

            <table class="order" rules=rows>

            <?php            
                for($i = 0; $i < count($cart); $i++) {
                    $query_cart = "SELECT carts.pid, size, quantity, product_name, price, image 
                                   FROM carts, products 
                                   WHERE carts.pid = products.pid AND cid = :cid";
                    try {
                        $statement = $db->prepare($query_cart);
                        $statement->bindValue(':cid', $cart[$i]);
                        $statement->execute();
                        $result = $statement->fetch();
                        $statement->closeCursor();
                    } catch (PDOException $e) {
                        echo 'Error Message: '.$e->getMessage();
                    } 

                    $subtotal = sprintf("%.2f", ($subtotal + $result[4] * $result[2])); 
                    $shipping = 8.75;
                    $tax = sprintf("%.2f", ($subtotal * 0.0635));
                    $order_total = sprintf("%.2f", ($subtotal + $shipping + $tax));

                    echo '<tr>
                            <td class="td_img"><a href="controller/ProductsController.php?category=details&pid='.$result[0].'"><img src="'.$result[5].'01.jpg"></a></td>
                            <td class="info">
                                <a href="controller/ProductsController.php?category=details&pid='.$result[0].'">'.$result[3].'</a><br/>
                                <strong>Product#: </strong>'.$result[0].'<br/>
                                <strong>Size: </strong>'.$result[1].'
                            </td>
                            <td class="td_qty"><strong>Quantity: </strong>'.$result[2].'</td>
                            <td class="td_price"><strong>Unit Price: </strong>$'.$result[4].'</td>
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
                    <input type="hidden" name="action" value="order_add">
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