<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Confirmation</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php') ?>

    <div class="confirmation">

        <h2>Your Order Confirmation</h2>

        <form action="confirmation_result.php" method="post">

            <div class="p">
                <p><label>Shipping from:</label> MyShoes.com</p>
                <p><label>Shipping to:</label> Yingyuan Zhang, 5830 85TH ST FL1, MIDDLE VILLAGE, NY, 11379, United States</p>
            </div>

            <div class="p">
                <p><label>Card number:</label> XXXXXXXXXXX</p>
                <p><label>Name on card:</label> Yingyuan Zhang</p>
            </div>

            <table class="order" cellspacing="0" rules=rows>

            <?php
                define("ROW", 2);

            
                for($row = 1; $row <= ROW; $row++){

                echo '<tr>
                        <td><a href="product_details.php"><img src="images/nike/Nike_Rosherun_Running_Shoe.jpg"></a></td>
                        <td class="info">
                            <a href="product_details.php">Nike_Rosherun_Running_Shoe</a><br/>
                            Product#: XX<br/>
                            Size: XX
                        </td>
                        <td>Quantity: XX</td>
                        <td>Unit Price: XX</td>
                    </tr>';
                }
            ?>
            </table>

            <div class="confirm_bottom">
                <table class="price">
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
                </table>

                <div>
                    <input type="submit" name="pay" value="Pay for it">
                </div>
            </div>

        </form>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>
  
 </body>
</html>