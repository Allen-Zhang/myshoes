<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Edit Login</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include 'header.php' ?>

    <div class="account">

        <div class="edit_login">

            <h2>Login Setting</h2>

            <hr>

            <div class="login_edit">
                <p><label class="title1">Change Login</label></p>
                <p>Use the form below to change the email or password for your MyShoes.com account. 
                   Use the new email or password next time when you log in MyShoes.com.</p>

                <form action="#" method="post">
                    <table>
                        <tr>
                           <td><label>Current Email Address:</label></td>
                           <td>iloveliverpoolgo@gmail.com</td>
                        </tr>
                        <tr>
                           <td><label>Current Password:</label></td>
                           <td>
                               <input type="password" name="current_pwd" required>
                               <font class="star"> *</font>
                           </td>
                        </tr>
                        <tr>
                           <td><label>New Email Address:</label></td>
                           <td>
                               <input type="email" name="new_email" value="iloveliverpoolgo@gmail.com" required>
                               <font class="star"> *</font>
                           </td>
                        </tr>
                        <tr>
                           <td><label>New Password:</label></td>
                           <td><input type="password" name="new_pwd"></td>
                        </tr>
                        <tr>
                           <td><label>Confirm New Password:</label></td>
                           <td><input type="password" name="confirm_new_pwd"></td>
                        </tr>
                    </table>

                    <div>
                        <input type="submit" value="Save changes">&nbsp;
                        <a href="account_info.php"><input type="button" value="Go back"></a>
                    </div>
                </form>
            </div>

        </div>

        <!-- Invoke the layout of account navigation -->
        <?php include 'account_nav.php' ?>
       
    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>
  
 </body>
</html>