<?php require_once('util/lib.php'); ?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Product Details</title>
  <script type="text/javascript" src="js/image_swap.js"></script>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php');?>
    
    <div class="product_details">

        <!-- Product information Section -->
        <div class="product_info">
            <h2><?php echo $_SESSION['details']["product_name"]; ?></h2>
            <strong>Product #: <?php echo $_SESSION['details']["pid"]; ?></strong>

            <hr>

            <div class="product_info_list">
                <p><label>List Price: </label>&nbsp;<span class="price1">$<?php echo $_SESSION['details']["list_price"]; ?></span></p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Price: <span class="price2">&nbsp;$<?php echo $_SESSION['details']["price"]; ?></span></label></p>
                <p><label>You Save: </label>&nbsp;
                    <span class="price3">$<?php echo sprintf("%.2f", ($_SESSION['details']["list_price"]-$_SESSION['details']["price"])); ?></span></p>

                <ul>
                    <li><?php echo $_SESSION['details']["desc_one"]; ?></li>
                    <li><?php echo $_SESSION['details']["desc_two"]; ?></li>
                    <li><?php echo $_SESSION['details']["desc_three"]; ?></li>
                </ul>   

                <form action="controller/CartsController.php" method="post">
                    <?php
                        if (isset($_SESSION['msg'])) {
                            echo '<label class="msg">'.$_SESSION['msg'].'</label>';                    
                            unset($_SESSION['msg']); 
                        } 
                    ?>
                    <label class="msg"><span id="message"></span></label><br/>
                    <label>Quantity: </label>
                    <input type="text" name="qty" id="qty" value="1" maxlength="2" onblur="checkQty()" required>
                    <input type="hidden" id="pro_amount" value="<?php echo $_SESSION['details']['amount']?>">
                    <select  name="size" required>
                        <option value="">Select Size:</option>
                            <?php 
                                foreach ($sizelist as $sizes) {
                                    echo '<option value="'.$sizes.'">'.$sizes.'</option>';  
                                }
                            ?>
                    </select>
                    <input type="hidden" name="action" value="cart_add">
                    <input type="hidden" name="pid" value="<?php echo $_SESSION['details']['pid'];?>">
                    <input type="submit" value="Add To Cart" onclick="return checkQty();">  
                </form>
            </div>
        </div>

        <!-- Product Image Section -->
        <div class="product_img">
            <img src="<?php echo $_SESSION['details']['image'];?>01.jpg" id="shoes_img" alt="Shoes Image">
        </div>

        <div class="product_img_nav">
            <ul id="image_list">
                <li>
                    <a href="<?php echo $_SESSION['details']['image'];?>01.jpg" id="first_link">
                        <img src="<?php echo $_SESSION['details']['image'];?>01.jpg" alt="Image01">
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_SESSION['details']['image'];?>02.jpg">
                        <img src="<?php echo $_SESSION['details']['image'];?>02.jpg" alt="Image02">
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_SESSION['details']['image'];?>03.jpg">
                        <img src="<?php echo $_SESSION['details']['image'];?>03.jpg" alt="Image03">
                    </a>
                </li>
                <li>
                    <a href="<?php echo $_SESSION['details']['image'];?>04.jpg">
                        <img src="<?php echo $_SESSION['details']['image'];?>04.jpg" alt="Image04">
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

 </body>
</html>