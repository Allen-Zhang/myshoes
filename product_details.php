<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Product Details</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php') ?>
    
    <div class="product_details">

        <!-- Product information Section -->
        <div class="product_info">
            <h2>Nike_Rosherun_Running_Shoe</h2>
            <strong>Product #: </strong>

            <hr>

            <div class="product_info_list">
                <p><label>List Price: </label>&nbsp;<span class="price1">$189.99</span></p>
                <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Price: <span class="price2">&nbsp;$120.99</span></label></p>
                <p><label>You Save: </label>&nbsp;<span class="price3">$69.00</span></p>

                <ul>
                    <li></li>
                    <lquantity i></li>
                    <li></li>
                    <li></li>
                </ul>   

                <form>
                    <label>Quantity: </label><input type="text" name="amount" value="1">
                    <select>
                        <option value="null">Select Size:</option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                        <option value=""></option>
                    </select>
                    <input type="submit" value="Add To Cart">  
                </form>
            </div>
        </div>

        <!-- Product Image Section -->
        <div class="product_img">
            <img src="images/nike/Nike_Rosherun_Running_Shoe.jpg" alt="Shoes Image">
        </div>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>

 </body>
</html>