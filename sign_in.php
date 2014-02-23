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
    <?php include_once('header.php') ?>

    <div class="decoration1">
        <img src="images/decoration/decoration01.jpg">
    </div>
    
    <div class="sign_in">
        <form action="biz/authenticate.php" method="post">
            <table>
                <tr>
                    <th>Returning Customers</th>
                </tr>
                <tr>
                    <td>Hi, welcome back to MyShoes, please enter your email address and password to sign in.</td>
                </tr>

                <?php
                    if (isset($_SESSION['msg'])) {

                        echo '<tr>
                                <td><label class="msg">'.$_SESSION['msg'].'</label></td>
                            </tr>';                    

                        unset($_SESSION['msg']); 
                    } 
                ?>
              
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

        <span>Not a registered user?  </span><a href="sign_up.php"> Sign up now!</a>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>

 </body>
</html>