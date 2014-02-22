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
        
        <!-- Determine whether login -->
        <?php
            if($login) {

               echo '<a href="account_info.php">MY ACCOUNT</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
               echo '<a href="biz/sign_out.php">SIGN OUT</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';

            }
            else {

               echo '<a href="sign_in.php">SIGN IN</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;';
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
                            <li><a href="product.php?catagory=adidas">Adidas</a></li>
                            <li><a href="product.php">Crocs</a></li>
                            <li><a href="product.php">Dolce &amp; Gabban</a></li>
                            <li><a href="product.php">Mezlan</a></li>
                         
                        </ul>
                    </li>
                    <li><a href="#">Brand List 2</a>
                        <ul>
                            <li><a href="product.php">Nike</a></li>
                            <li><a href="product.php">Polo Ralph Lauren</a></li>
                            <li><a href="product.php">Timberland</a></li>
                            <li><a href="product.php">Vans</a></li>  
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#s2">Styles</a>
                <span id="s2"></span>
                <ul class="subs">
                    <li><a href="#">Style List 1</a>
                        <ul>
                            <li><a href="product.php">Athletic</a></li>
                            <li><a href="product.php">Boots</a></li>
                            <li><a href="product.php">Flip Flops</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Style List 2</a>
                        <ul>
                            <li><a href="product.php">Oxfords</a></li>
                            <li><a href="product.php">Sandals</a></li>
                            <li><a href="product.php">Sneakers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="product.php">New Arrivals</a></li>

            <li><a href="subscribe.php">Subscribe</a></li>

            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>

    <br/><br/><br/>

</div>