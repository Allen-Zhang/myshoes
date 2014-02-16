<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Sign In</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include 'header.php' ?>
    
    <div class="sign_in">
    <form action="#" method="post">
        <table>
            <tr>
                <th>Returning Customers</th>
            </tr>
            <tr>
                <td>Hi, welcome back to MyShoes, please enter your email address and password to sign in.</td>
            </tr>           
            <tr>
                <td><label>Email Address</label></td>
            </tr>
            <tr>
                <td><input type="email" name="email" id="email" placeholder="Email Address" required></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
            </tr>
            <tr>
                <td><input type="password" name="password" id="password" placeholder="Password" required></td>
            </tr>
        </table>
        <input type="submit" name="sign_in" value="Sign in">     
    </form>

    <br/>

    <span>Not a registered user?  </span><a href="sign_up.php"> Sign up now!</a>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>

 </body>
</html>