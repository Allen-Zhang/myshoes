<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Sign In</title>
  <link rel="stylesheet" href="css/main_page.css"> 
  <link rel="stylesheet" href="css/navigation_menu.css"> 
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
                <td><input type="text" name="email" id="email" placeholder="Email Address"></td>
            </tr>
            <tr>
                <td><label>Password</label></td>
            </tr>
            <tr>
                <td><input type="password" name="password" id="password" placeholder="Password"></td>
            </tr>
        </table>
        <input type="submit" name="sign_in" value="Sign in">     
    </form>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>

 </body>
</html>