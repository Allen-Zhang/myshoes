<?php
    session_start();

    $login = false;

    if(isset($_SESSION['uid'])) 
        $login = true;
?>

<!-- Header layout of the website  -->
<div class="header">

	<!-- Website Logo -->
    <div class="header_logo">
        <a href="index.php"><img src="images/logo/MyShoes_small.jpg" alt="MyShoes Logo"></a>
    </div>

    <!-- Header Info -->
    <div class="header_info">

    	<!-- User Info -->
        
        <?php
            // Determine whether login
            if($login) {

               echo '<a href="account_info.php">MY ACCOUNT</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
               echo '<a href="biz/logout.php">LOG OUT</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';

            }
            else {

               echo '<a href="login.php">LOG IN</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
               echo '<a href="sign_up.php">SIGN UP</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
               
            }

        ?>

    	<a href="cart.php">CART(0)</a>

    	<br/>
    
    	<!-- Products Searching -->
    	<form actioon="#.php" method="post">

            <!-- if the input is null then redirect to index.php -->
    		<input type="text" name="search" placeholder="Search for product">
    		<input type="submit" class="search_button" value="Search">
    	</form>
    </div>


    <!-- Navigation Menu -->
    <div>
        <ul id="nav">
            <li><a href="index.php">MyShoes</a></li>

            <li><a href="#s1">Brands</a>
                <span id="s1"></span>
                <ul class="subs">
                    <li><a href="#">Brand List 1</a>
                        <ul>
                            <li><a href="biz/product_redirect.php?category=brand&title=Adidas">Adidas</a></li>
                            <li><a href="biz/product_redirect.php?category=brand&title=Crocs">Crocs</a></li>
                            <li><a href="biz/product_redirect.php?category=brand&title=ECCO">ECCO</a></li>
                            <li><a href="biz/product_redirect.php?category=brand&title=Mezlan">Mezlan</a></li>
                         
                        </ul>
                    </li>
                    <li><a href="#">Brand List 2</a>
                        <ul>
                            <li><a href="biz/product_redirect.php?category=brand&title=Nike">Nike</a></li>
                            <li><a href="biz/product_redirect.php?category=brand&title=Polo_Ralph_Lauren">Polo Ralph Lauren</a></li>
                            <li><a href="biz/product_redirect.php?category=brand&title=Timberland">Timberland</a></li>
                            <li><a href="biz/product_redirect.php?category=brand&title=Vans">Vans</a></li>  
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#s2">Styles</a>
                <span id="s2"></span>
                <ul class="subs">
                    <li><a href="#">Style List 1</a>
                        <ul>
                            <li><a href="biz/product_redirect.php?category=style&title=Athletic">Athletic</a></li>
                            <li><a href="biz/product_redirect.php?category=style&title=Boots">Boots</a></li>
                            <li><a href="biz/product_redirect.php?category=style&title=Flip_Flops">Flip Flops</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Style List 2</a>
                        <ul>
                            <li><a href="biz/product_redirect.php?category=style&title=Oxfords">Oxfords</a></li>
                            <li><a href="biz/product_redirect.php?category=style&title=Sandals">Sandals</a></li>
                            <li><a href="biz/product_redirect.php?category=style&title=Sneakers">Sneakers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="biz/product_redirect.php?category=new_arrivals">New Arrivals</a></li>

            <li><a href="subscribe.php">Subscribe</a></li>

            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>

    <br/><br/><br/>

</div>