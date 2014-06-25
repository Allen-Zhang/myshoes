<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Edit Username</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/validation.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <!-- Validate user login -->
    <?php include_once('util/validation.php'); ?> 
    <?php
      if(isset($_SESSION['username']))
        $username = $_SESSION['username'];
      else
        $username = "";
    ?>

    <div class="account">

        <div class="edit_name">

            <h2>Name Setting</h2>

            <hr>

            <div class="name_edit">
                <p><label class="title1">Change/Add Your Name</label></p>
                <p>If you want to change/add the name associated with your MyShoes.com account, 
                   you may do so below. Be sure to click the Done button when you are done.</p>
                <p><label class="title2">What is your new name?</label></p>

                <form action="controller/AccountsController.php" method="post">
                    <label class="msg"><span id="message"></span></label>
                    <table>
                        <tr>
                          <td>
                            <label class="title3">New Name:&nbsp;</label>
                            <input type="text" id="edit_name" name="edit_name" value="<?php echo $username;?>" placeholder="Enter your name" required onblur="checkEditName()">
                            <font class="star"> *</font>
                          </td>
                          <td>
                            <input type="hidden" name="action" value="username_update">
                            <input type="submit" value="Save changes" onclick="return checkEditName();">&nbsp;
                            <a href="account_info.php"><input type="button" value="Go back"></a>
                          </td> 
                        </tr>
                    </table>
                </form>
            </div>

        </div>

        <!-- Invoke the layout of account navigation -->
        <?php include_once('account_nav.php') ?>
       
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>
  
 </body>
</html>