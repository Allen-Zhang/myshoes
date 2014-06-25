<script type="text/javascript" src="js/utility.js"></script>
<?php 
    session_start();
    if(isset($_SESSION['uid']))
        $login = true;
    else
        $login = false;
?>

<!-- Header layout of the website  -->
<div class="header">

    <!-- Header Info -->
    <div class="header_info">

    	<!-- User Info -->
        <?php
            // Determine whether login
            if($login) {
               echo '<a href="controller/AccountsController.php?action=account_display" id="title1" onMouseOver="changeColor(1);" onMouseOut="changeAgain(1);">MY ACCOUNT</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
               echo '<a href="controller/UsersController.php?action=user_logout" id="title2" onMouseOver="changeColor(2);" onMouseOut="changeAgain(2);">LOG OUT</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
            }
            else {
               echo '<a href="login.php" id="title3" onMouseOver="changeColor(3);" onMouseOut="changeAgain(3);">LOG IN</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
               echo '<a href="sign_up.php" id="title4" onMouseOver="changeColor(4);" onMouseOut="changeAgain(4);">SIGN UP</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
            }
        ?>

    	<a href="cart.php" id="title5" onMouseOver="changeColor(5);" onMouseOut="changeAgain(5);">MY CART</a>

    	<br/>
    
    	<!-- Products Searching -->
    	<form action="controller/ProductsController.php" method="post">
            <!-- if input is empty then redirect to index.php -->
            <input type="hidden" name="category" value="product_search">
    		<input type="text" name="search" placeholder="Search for product">
    		<input type="submit" class="search_button" value="Search">
    	</form>
    </div>

    <!-- Website Logo -->
    <div class="header_logo">
        <a href="index.php"><img src="images/logo/MyShoes_small.jpg" alt="MyShoes Logo"></a>
    </div>

    <!-- Navigation Menu -->
    <div>
        <ul id="nav">
            <li><a href="index.php">MyShoes</a></li>

            <li><a href="#">Brands</a>
                <span id="s1"></span>
                <ul class="subs">
                    <li><a href="#">Brand List 1</a>
                        <ul>
                            <li><a href="controller/ProductsController.php?category=brand&title=Adidas">Adidas</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Converse">Converse</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Crocs">Crocs</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Dockers">Dockers</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Brand List 2</a>
                        <ul>
                            <li><a href="controller/ProductsController.php?category=brand&title=ECCO">ECCO</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=New_Balance">New Balance</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Nike">Nike</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Mezlan">Mezlan</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Brand List 3</a>
                        <ul>
                            <li><a href="controller/ProductsController.php?category=brand&title=Polo_Ralph_Lauren">Polo Ralph Lauren</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Reebok">Reebok</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Timberland">Timberland</a></li>
                            <li><a href="controller/ProductsController.php?category=brand&title=Vans">Vans</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#">Styles</a>
                <span id="s2"></span>
                <ul class="subs">
                    <li><a href="#">Style List 1</a>
                        <ul>
                            <li><a href="controller/ProductsController.php?category=style&title=Athletic">Athletic</a></li>
                            <li><a href="controller/ProductsController.php?category=style&title=Boots">Boots</a></li>
                            <li><a href="controller/ProductsController.php?category=style&title=Flip_Flops">Flip Flops</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Style List 2</a>
                        <ul>
                            <li><a href="controller/ProductsController.php?category=style&title=Oxfords">Oxfords</a></li>
                            <li><a href="controller/ProductsController.php?category=style&title=Sandals">Sandals</a></li>
                            <li><a href="controller/ProductsController.php?category=style&title=Sneakers">Sneakers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="controller/ProductsController.php?category=new_arrivals">New Arrivals</a></li>

            <li><a href="subscribe.php">Subscribe</a></li>

            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>

    <br/><br/><br/>

</div>
