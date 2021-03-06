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
            <a href="controller/ProductsController.php?category=sale&title=Nike">
            <img src="images/sale/sale_nike.jpg" alt="Discount Product 3" title="Nike Sale"></a>
        </div>
        <div class="dis_middle">
            <a href="controller/ProductsController.php?category=sale&title=Timberland">
            <img src="images/sale/sale_timberland.jpg" alt="Discount Product 2" title="Timberland Sale"></a>
        </div>
        <div class="dis_left">
            <a href="controller/ProductsController.php?category=sale&title=Adidas">
            <img src="images/sale/sale_adidas.jpg" alt="Discount Product 1" title="Adidas Sale"></a>
        </div>
    </div>

    <br/>

    <!-- New Arrivals Section -->
    <hr>
    <p><font class="section_title">New Arrivals</font></p>

    <div class="new_arrivals">
        <div>
            <a href="controller/ProductsController.php?category=details&pid=mysh01010004">
                <img src="images/shoes/nike/Nike_Revolution_2_Running_Shoes/Nike_Revolution_2_Running_Shoes01.jpg" alt="New Arrivals 1">
            </a>            
        </div>
        <div>
            <a href="controller/ProductsController.php?category=details&pid=mysh01010015">
                <img src="images/shoes/nike/Nike_Air_Force_1_Duckboot_Boot/Nike_Air_Force_1_Duckboot_Boot01.jpg" alt="New Arrivals 2">
            </a>            
        </div>
        <div>
            <a href="controller/ProductsController.php?category=details&pid=mysh01010031">
                <img src="images/shoes/timberland/Timberland_Field_Boot/Timberland_Field_Boot01.jpg" alt="New Arrivals 5">
            </a>            
        </div>
        <div>
            <a href="controller/ProductsController.php?category=details&pid=mysh01010027">
                <img src="images/shoes/timberland/Timberland_Premium_White_Boot/Timberland_Premium_White_Boot01.jpg" alt="New Arrivals 4">
            </a>            
        </div>
        <div>
            <a href="controller/ProductsController.php?category=details&pid=mysh01010025">
                <img src="images/shoes/adidas/Adidas_Seeley_Skate_Sneakers/Adidas_Seeley_Skate_Sneakers01.jpg" alt="New Arrivals 3">
            </a>            
        </div>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

   
 </body>
</html>