<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Confirmation Result</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <div class="confirmation_result">

        <h2>Your Order Payment Result</h2><br/><br/>

        <div class="result_info">
            <?php
                if(true) {

                    echo '<p><font>You order is paid successfully!</font></p>';
                    echo '<p>Order Number: <span class="order_number">105-0226438-4661002</span></p>
                          <p>Estimated Delivery: January 14, 2014</p>
                          <p><a href="order.php">Review your order</a></p>';

                }
                else {

                    echo '<p><font>Sorry, your order payment failed. <br>Please try again.</font></p>';

                }
            ?>

            <br/><br/>

            <p><span>Click </span><a href="index.php">here</a><span> to continue shopping.</span></p>
        </div>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>
  
 </body>
</html>