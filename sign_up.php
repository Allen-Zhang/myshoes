<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Sign Up</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css">
  <script type="text/javascript" src="js/validation.js"></script> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>
    
    <div class="decoration2">
        <img src="images/decoration/decoration02.jpg">
    </div>

    <div class="sign_up"> 
                    
        <h2>New User Registration</h2>

        <form action="user_register.php" method="post">

        <P>Hi, welcome to MyShoes, please enter your name, phone number, email address and password to create your account.</p>
                
            <table>
                <?php
                    if (isset($_SESSION['msg'])) {

                        echo '<tr>
                                <td colspan="2"><label class="msg">'.$_SESSION['msg'].'</label></td>
                            </tr>';                    

                        unset($_SESSION['msg']); 
                    } 
                ?>
                <tr>
                    <td colspan="2"><label class="msg"><span id="message"></span></label></td>
                </tr>
                <tr>
                    <td><label>Username:</label></td>
                    <td>
                        <input type="text" name="username" id="username" placeholder="Username">
                    </td>
                </tr>
                <tr>
                    <td>
                       <label>Phone Number:</label>
                    </td>
                    <td>
                       <input type="text" name="userphone" maxlength="10" placeholder="Phone Number">
                    </td>
               </tr>           
                <tr>
                    <td><label>Email Address:</label></td>
                    <td>
                        <input type="email" name="email" id="email" placeholder="Email Address" required>
                        <font class="star"> *</font>
                    </td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                    <td>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <font class="star"> *</font>
                    </td>
                </tr>
                <tr>
                    <td><label>Confirm Password:</label></td>
                    <td>
                        <input type="password" name="confirm_password" id="confirm_password" onkeyup="checkPass(); return false;" 
                         placeholder="Confirm Password" required>
                        <font class="star"> *</font>
                    </td>
                </tr>
            </table>  
            <div>
                <input type="submit" name="sign_up" value="Sign up" onclick="return checkPass()"> 
            </div>  
        </form>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

 </body>
</html>