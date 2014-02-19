<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Sign Up</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include 'header.php' ?>
    
    <div class="sign_up"> 
        <form action="#" method="post">
            <table>
                <tr>
                    <th>New Customers</th>
                </tr>
                <tr>
                    <td>Hi, welcome to MyShoes, please enter your name, email address and password to create your account.</td>
                </tr>
                <tr>
                    <td><label>Username</label></td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Username" required>
                        <font class="star"> *</font>
                    </td>
                </tr>           
                <tr>
                    <td><label>Email Address</label></td>
                </tr>
                <tr>
                    <td>
                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                        <font class="star"> *</font>
                    </td>
                </tr>
                <tr>
                    <td><label>Password</label></td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <font class="star"> *</font>
                    </td>
                </tr>
                <tr>
                    <td><label>Confirm Password</label></td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                        <font class="star"> *</font>
                    </td>
                </tr>
            </table>  
            <input type="submit" name="sign_up" value="Sign up">   
        </form>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>

 </body>
</html>