<!-- Header layout of the website  -->
<div class="header">

	<!-- Website Logo -->
    <div class="header_logo">
        <a href="index.php"><img src="img/myshoes_logo.jpg" alt="MyShoes Logo"></a>
    </div>

    <!-- Header Info -->
    <div class="header_info">

    	<!-- User Info -->
    	<a href="sign_in.php">SIGN IN</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
    	<a href="sign_up.php">SIGN UP</a>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;
    	<a href="#">CART(0)</a>

    	<br/><br/>
    
    	<!-- Products Searching -->
    	<form actioon="#.php" method="post">
    		<input type="text" name="search" placeholder="Search for product">
    		<input type="submit" class="search_button" value="Search">
    	</form>
    </div>

    <hr>

    <!-- Navigation Menu -->
    <div>
        <ul id="nav">
            <li><a href="index.php">MyShoes</a></li>

            <li><a href="#s1">Brands</a>
                <span id="s1"></span>
                <ul class="subs">
                    <li><a href="#">Brand List 1</a>
                        <ul>
                            <li><a href="#">Adidas</a></li>
                            <li><a href="#">Crocs</a></li>
                            <li><a href="#">Dolce &amp; Gabban</a></li>
                            <li><a href="#">Mezlan</a></li>
                         
                        </ul>
                    </li>
                    <li><a href="#">Brand List 2</a>
                        <ul>
                            <li><a href="#">Nike</a></li>
                            <li><a href="#">Polo Ralph Lauren</a></li>
                            <li><a href="#">Timberland</a></li>
                            <li><a href="#">Vans</a></li>  
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#s2">Styles</a>
                <span id="s2"></span>
                <ul class="subs">
                    <li><a href="#">Style List 1</a>
                        <ul>
                            <li><a href="#">Athletic</a></li>
                            <li><a href="#">Boots</a></li>
                            <li><a href="#">Flip Flops</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Style List 2</a>
                        <ul>
                            <li><a href="#">Oxfords</a></li>
                            <li><a href="#">Sandals</a></li>
                            <li><a href="#">Sneakers</a></li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li><a href="#">New Arrivals</a></li>

            <li><a href="#">Sale</a></li>

            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>

    <br/><br/><br/>

</div>