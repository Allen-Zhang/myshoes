<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Orders</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include 'header.php' ?>

    <div class="my_order">

        <h2>Your Orders</h2>

        <!-- Determine whether order is empty -->
        <?php           
            if(false) {

                echo '<div class="order_empty">';
                    echo '<h2>No Orders Found.</h2>';
                    echo '<span>Click </span><a href="index.php">here</a><span> to continue shopping.</span>';
                echo '</div>';

            }
            else {

                define("QTY", 3);
                define("ROW", 2);

                // Display all of the order information
                for($order_quantity = 1; $order_quantity <= QTY; $order_quantity++) {

                    echo '<table>
                            <tr>
                                <td class="info" rowspan="2">
                                    <p><label>ORDER PLACED</label></p>
                                    <p><label class="date">January 14, 2014</label></p>
                                    <p><label>ORDER#: XXXXXXXX</label></p>
                                    <p><label>RECIPIENT: Yingyuan Zhang</label></p>
                                    <p><label>PHONE NUMBER: 9178888888</label></p>
                                    <p><label>DELIVERY ADDRESS:</label></p>
                                    <ul>
                                        <li>5830 85TH ST FL1</li>
                                        <li>MIDDLE VILLAGE, NY, 11379</li>
                                        <li>United States</li>
                                    </ul>
                                    <label>TOTAL: <span class="total">$100.00</span></label>
                                </td>
                                <td class="status" colspan="2">
                                    <p><label>ESTIMATED DELIVERED ON <span class="del_date">Friday, January 17, 2014</span></label></p>
                                    <p><label class="status">Delivered</label></p>
                                </td>
                            </tr>';

                        for($row = 1; $row <= ROW; $row++){

                            echo '<tr>';

                                    // Add a empty td from the second line
                                    if($row > 1) { echo '<td class="empty_td"></td>'; }

                                echo '<td class="img"><img src="#"></td>
                                    <td class="shoes_info">
                                        <p><label>Name</label></p>
                                        <p><label>Product#: XX</label></p>
                                        <p><label>Size: XX</label></p>
                                        <p><label>Sold by MyShoes.com</label></p>
                                    </td>
                                </tr>';
                        }

                        echo '</table>';
                }  

            }
        ?>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>
  
 </body>
</html>