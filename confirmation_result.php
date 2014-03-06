<?php
    require_once('biz/db.mysql.php');
    
    if(empty($_GET['step'])) {
        header('Location: index.php');  // Illegal access, redirect to main page
        exit;
    }
?>
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

    <!-- Validate user login -->
    <?php include_once('biz/validation.php'); ?>

    <div class="confirmation_result">

        <h2>Your Order Payment Result</h2><br/><br/>

        <div class="result_info">
            <?php
                if($_SESSION['msg'] == "Successful") {

                  unset($_SESSION['msg']);

                  $oid = $_GET['oid'];

                  $sql = "SELECT order_num, estimated_date FROM orders WHERE oid = '$oid'";
                  $result = mysql_query($sql, $conn);
                  $row = mysql_fetch_array($result);
                  $date = date('l, F j, Y',strtotime($row[1]));  // Change the estimated deliveried date format

                  echo '<p><font>You order is paid successfully!</font></p>
                        <p><strong>Order Number:</strong>&nbsp;&nbsp;<span class="order_number">'.$row[0].'</span></p>
                        <p><strong>Estimated Delivery:</strong>&nbsp;&nbsp;'.$date.'</p>
                        <p><a href="order.php">Review your order</a></p>';

                }
                else {

                  unset($_SESSION['msg']);
                  
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