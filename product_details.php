<?php
    require_once('biz/db.mysql.php');
    require_once('biz/lib.php');

    $pid = $_GET['pid'];

    $sql = "SELECT product_name, list_price, price, desc_one, desc_two, desc_three, amount, image 
            FROM products 
            WHERE pid = '$pid'";

    $result = mysql_query($sql, $conn);
    $row = mysql_fetch_array($result);
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Product Details</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript">

    // Validate wheter product in stock is enough
    function checkQty() {

        var qty = document.getElementById('qty');
        var amount = <?php echo $row['amount']?>;

        //Compare quantity and amount value
        if(qty.value < amount) {

            qty.style.backgroundColor = "white";
            message.style.color = "#00C"; 
            message.innerHTML = "";
            return true;
    
        } else {

            qty.style.backgroundColor = "#F90";
            message.style.color = "red";
            message.innerHTML = "Sorry, please enter a valid quantity.";
            return false;
            
        }
    }
  </script>

 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>
    
    <div class="product_details">

        <!-- Product information Section -->
        <div class="product_info">
            <h2><?php echo $row["product_name"]; ?></h2>
            <strong>Product #: <?php echo $pid; ?></strong>

            <hr>

            <div class="product_info_list">
                <p><label>List Price: </label>&nbsp;<span class="price1">$<?php echo $row["list_price"]; ?></span></p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label>Price: <span class="price2">&nbsp;$<?php echo $row["price"]; ?></span></label></p>
                <p><label>You Save: </label>&nbsp;
                    <span class="price3">$<?php echo sprintf("%.2f", ($row["list_price"]-$row["price"])); ?></span></p>

                <ul>
                    <li><?php echo $row["desc_one"]; ?></li>
                    <li><?php echo $row["desc_two"]; ?></li>
                    <li><?php echo $row["desc_three"]; ?></li>
                </ul>   

                <form action="biz/cart_add.php" method="post">
                    <?php
                        if (isset($_SESSION['msg'])) {

                            echo '<label class="msg">'.$_SESSION['msg'].'</label>';                    

                            unset($_SESSION['msg']); 
                        } 
                    ?>
                    <label class="msg"><span id="message"></span></label><br/>
                    <label>Quantity: </label>
                    <input type="text" name="qty" id="qty" value="1" maxlength="2" onkeyup="checkQty(); return false;" required>
                    <select  name="size" required>
                        <option value="">Select Size:</option>
                            <?php 
                                foreach ($sizelist as $sizes) {

                                    echo '<option value="'.$sizes.'">'.$sizes.'</option>';  
                                
                                }
                            ?>
                    </select>
                    <input type="hidden" name="pid" value="<?php echo $pid;?>">
                    <input type="submit" value="Add To Cart" onclick="return checkQty();">  
                </form>
            </div>
        </div>

        <!-- Product Image Section -->
        <div class="product_img">
             <?php echo '<img src="'.$row["image"].'" alt="Shoes Image">'; ?>
        </div>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

 </body>
</html>