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
    <?php include_once('header.php'); ?>

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
    <hr>
    <p><font class="section_title">Discount Product</font></p>

    <div class="discount">
        <div class="dis_right">
            <a href="biz/product_redirect.php?category=sale&title=Nike">
            <img src="images/sale/sale_nike.jpg" alt="Discount Product 3"></a>
        </div>
        <div class="dis_middle">
            <a href="biz/product_redirect.php?category=sale&title=Timberland">
            <img src="images/sale/sale_timberland.jpg" alt="Discount Product 2"></a>
        </div>
        <div class="dis_left">
            <a href="biz/product_redirect.php?category=sale&title=Adidas">
            <img src="images/sale/sale_adidas.jpg" alt="Discount Product 1"></a>
        </div>
    </div>

    <br/>

    <!-- New Arrivals Section -->
    <hr>
    <p><font class="section_title">New Arrivals</font></p>

    <div class="new_arrivals">
        <div>
            <a href="product_details.php?pid=mysh01010005">
                <img src="images/shoes/nike/Nike_Downshifter_5_Running_Shoes.jpg" alt="New Arrivals 1">
            </a>            
        </div>
        <div>
            <a href="product_details.php?pid=mysh01010008">
                <img src="images/shoes/nike/Nike_Hyperdunk_2013_Basketball_Shoes.jpg" alt="New Arrivals 2">
            </a>            
        </div>
        <div>
            <a href="product_details.php?pid=mysh01010011">
                <img src="images/shoes/nike/Nike_Dual_Fusion_BB_II_Basketball_Shoes.jpg" alt="New Arrivals 3">
            </a>            
        </div>
        <div>
            <a href="product_details.php?pid=mysh01010012">
                <img src="images/shoes/nike/Nike_Air_Force_1_High_Shoes.jpg" alt="New Arrivals 4">
            </a>            
        </div>
        <div>
            <a href="product_details.php?pid=mysh01010015">
                <img src="images/shoes/nike/Nike_Air_Force_1_Duckboot_Boot.jpg" alt="New Arrivals 5">
            </a>            
        </div>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('view/footer.php'); ?>

   
 </body>
</html>