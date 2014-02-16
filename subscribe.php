<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Subscribe</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include 'header.php' ?>
    
    <div class="subscribe">
        <h2>Subscribe to MyShoes</h2>
        
        <p>Join us, our newsletter will weekly deliver straight to your inbox offering the most up-to-date news and shopping guide including the new arrival shoes, the discounted shoes, and other shoes news about MyShoes to enjoy your online shopping. Subscribe to MyShoes for first views of the collection and more.</p><br/><br/>
        
        <p>Enter your email address if you want to receive our newsletter</p>
        
        <form action="#" method="post">
            <label>Keep Update With Us:&nbsp;&nbsp;</label>
            <input type="text" name="email" id="email" placeholder="Your Email Here"><br/>
            <span><input type="submit" class="subscribe_button" name="subscribe" value="Subscribe"></span>   
        </form>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>

 </body>
</html>