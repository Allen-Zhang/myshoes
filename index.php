<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>MyShoes Home</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php') ?>

    <!-- Ad Section -->
    <div id="ad">
        <a class="btnLeft" id="btnLeft" href="javascript:void(0);"></a>
        <a class="btnRight" id="btnRight" href="javascript:void(0);"></a>
        <div class="box">
            <img style="opacity:1;filter:alpha(opacity=100);" src="images/ad/ad_1.jpg" />
            <img src="images/ad/ad_2.jpg" /> 
            <img src="images/ad/ad_3.jpg" />
            <img src="images/ad/ad_4.jpg" /> 
            <img src="images/ad/ad_5.jpg" />  
        </div>
        <div class="page">
            <a class="active" href="javascript:void(0);">1</a>
            <a href="javascript:void(0);">2</a> 
            <a href="javascript:void(0);">3</a>
            <a href="javascript:void(0);">4</a>
            <a href="javascript:void(0);">5</a>
        </div>
    </div>


    <br/>

    <!-- Discount Product Section -->
    <div class="discount">
        <div class="dis_right">
            <a href="product_details.php"><img src="img/#.jpg" alt="Discount Product 3"></a>
        </div>
        <div class="dis_middle">
            <a href="product_details.php"><img src="img/#.jpg" alt="Discount Product 2"></a>
        </div>
        <div class="dis_left">
            <a href="product_details.php"><img src="img/#.jpg" alt="Discount Product 1"></a>
        </div>
    </div>

    <br/>

    <!-- New Arrivals Section -->
    <div class="new_arrivals">
        <a href="product_details.php"><img src="img/#.jpg" alt="New Arrivals 1"></a>
        <a href="product_details.php"><img src="img/#.jpg" alt="New Arrivals 2"></a>
        <a href="product_details.php"><img src="img/#.jpg" alt="New Arrivals 3"></a>
        <a href="product_details.php"><img src="img/#.jpg" alt="New Arrivals 4"></a>
        <a href="product_details.php"><img src="img/#.jpg" alt="New Arrivals 5"></a>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>

   
 </body>
</html>