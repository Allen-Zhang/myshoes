<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8"/>
  <title>Edit Login</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/validation.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <!-- Validate user login -->
    <?php include_once('util/validation.php'); ?>

    <div class="account">

        <div class="edit_login">

            <h2>Login Setting</h2>

            <hr>

            <div class="login_edit">
                <p><label class="title1">Change Login</label></p>
                <p>Use the form below to change the email or password for your MyShoes.com account. 
                   Use the new email or password next time when you log in MyShoes.com.</p>

                <form action="controller/AccountsController.php" method="post">
                    <table>
                        <?php
                            if (isset($_SESSION['msg'])) {
                                echo '<tr>
                                        <td colspan="3"><label class="msg">'.$_SESSION['msg'].'</label></td>
                                    </tr>';                    
                                unset($_SESSION['msg']); 
                            } 
                        ?>
                        <tr>
                            <td colspan="3"><label class="msg"><span id="message"></span></label></td>
                        </tr>
                        <tr>
                           <td><label>Current Email Address:</label></td>
                           <td><?php echo $_SESSION['email'];?></td>
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
                               <input type="email" name="new_email" value="<?php echo $_SESSION['email'];?>" required>
                               <font class="star"> *</font>
                           </td>
                        </tr>
                        <tr>
                           <td><label>New Password:</label></td>
                           <td><input type="password" name="password" id="edit_password"></td>
                        </tr>
                        <tr>
                           <td><label>Confirm New Password:</label></td>
                           <td><input type="password" name="confirm_password" id="edit_confirm_password" onblur="checkEditPass(); return false;"></td>
                        </tr>
                    </table>

                    <div>
                        <input type="hidden" name="action" value="login_update">
                        <input type="submit" value="Save changes" onclick="return checkEditPass()">&nbsp;
                        <a href="account_info.php"><input type="button" value="Go back"></a>
                    </div>
                </form>
            </div>

        </div>

        <!-- Invoke the layout of account navigation -->
        <?php include_once('account_nav.php'); ?>
       
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>
  
 </body>
</html>