<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Cart</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <?php   
        // Determine whether cart is empty        
        if(false) {
            echo '<div class="decoration5">
                    <img src="images/decoration/decoration05.jpg">
                </div>';
        }
    ?>

    <div class="cart">

        <h2>My Shopping Cart</h2>

        <?php
            // Determine whether cart is empty 
            if(false) {

                echo '<div class="cart_empty">';
                    echo '<h2 class="no_cart">Your Cart is Empty</h2>';
                    echo '<span>You have no items in your current cart.<span><br/><br/>';
                    echo '<span>Click </span><a href="index.php">here</a><span> to continue shopping.</span>';
                echo '</div>';

            } else {

                echo '<form action="address.php" method="post">';

                define("ROW", 2);

                    echo '<table width="100%" cellspacing="0" rules=rows>';

                        echo '<tr class="cart_th">';
                            echo '<th colspan="2">SHOES</th>';
                            echo '<th>QUANTITY</th>';
                            echo '<th>UNIT PRICE</th>';
                            echo '<th>TOTAL</th>';
                            echo '<th>ACTION</th>';
                        echo '</tr>';

                    for($row = 1; $row <= ROW; $row++){

                        echo '<tr>';
                            echo '<td class="cart_td_img">
                                    <a href="product_details.php"><img src="images/shoes/nike/Nike_Rosherun_Running_Shoes.jpg"></a>
                                  </td>';
                            echo '<td class="cart_td_name">
                                    <label class="name">
                                        <a href="product_details.php">Nike Rosherun Running Shoe</a>
                                    </label><br/>
                                    <label>Product#: XX</label><br/>
                                    <label>Size: XX</label>
                                  </td>';
                            echo '<td class="cart_quantity">
                                    <form action="#" method="post">
                                        <input type="text" name="quantity" value="1" maxlength="2" required>&nbsp;
                                        <input type="submit" value="Update">
                                    </form>
                                  </td>';
                            echo '<td class="cart_td">$99.99</td>';
                            echo '<td class="cart_td">$99.99</td>';
                            echo '<td class="cart_td"><input type="button" value="Remove"></td>';
                        echo '</tr>';

                        }
                  
                    echo '</table>';

                echo '<div class="cart_bottom">';
                    echo '<table>
                            <tr>
                                <td><label>Subtotal:</label></td>
                                <td><label>$</label></td>
                            </tr>
                            <tr>
                                <td><label>Shipping:</label></td>
                                <td><label>$</label></td>
                            </tr>
                            <tr>
                                <td><label>Tax:</label></td>
                                <td><label>$</label></td>
                            </tr>
                            <tr>
                                <td><label>Order Total:</label></td>
                                <td><label>$</label></td>
                            </tr>
                          </table>';
                    echo '<input type="submit" value="Checkout">';
                    echo '<a href="index.php"><input type="button" value="Continue Shopping"></a>';  
                echo '</div>';   
                echo '</form>';

            }
        ?>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

   
 </body>
</html>