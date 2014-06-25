<?php
    if(empty($_GET['step'])) {
        header('Location: index.php');  // Illegal access, redirect to main page
        exit;
    }
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Subscribe Result</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <!-- Validate user login -->
    <?php include_once('util/validation.php'); ?>

    <div class="subscribe_result">

        <h2>Your Subscription Result</h2><br/>

        <div class="result_info">
            <?php
                if(isset($_SESSION['subscriber'])) {

                    echo '<p><font>Subscribe successfully!</font></p><br/>';
                    echo '<p>Email Address: <span class="subscriber">'.$_SESSION['subscriber'].'</span></p>';
                    echo '<p>Thank you for joining us, our newsletter will weekly deliver straight to your inbox offering the most up-to-date news and shopping guide including the new arrival shoes, the discounted shoes, and other shoes news about MyShoes to enjoy your online shopping.</p>';

                }

                else {
                    echo '<p><font>Sorry, subscribe failed. <br>Please try again.</font></p>';
                }
            ?>

            <br/>

            <p><span>Click </span><a href="index.php">here</a><span> to continue shopping.</span></p>
        </div>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>
  
 </body>
</html>