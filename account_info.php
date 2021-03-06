<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Account Information</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>
    
    <!-- Validate user login -->
    <?php include_once('util/validation.php'); ?>

    <div class="account">

        <div class="account_info">

            <h2>Account Information</h2>

            <hr>

            <div>
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
                        <td><label>Name:</label></td>
                        <td><?php echo $_SESSION['account']['username']; ?></td>
                        <td>
                            <?php
                                if(!empty($_SESSION['account']['username'])) 
                                    echo '<a href="controller/AccountsController.php?action=username_display">
                                          <input type="button" name="edit_name" value="Edit"></a>';
                                else 
                                    echo '<a href="edit_name.php"><input type="button" name="edit_name" value="Add"></a>';
                            ?>
                        </td>
                    </tr>
                    <tr>                       
                        <td><label>E-mail:</label></td>
                        <td><?php echo $_SESSION['account']['email']; ?></td>
                        <td><a href="controller/AccountsController.php?action=login_display">
                            <input type="button" name="edit_login" value="Edit"></a></td>
                    </tr>
                     <tr>
                        <td><label>Password:</label></td>
                        <td>**********</td>                       
                        <td><a href="controller/AccountsController.php?action=login_display">
                            <input type="button" name="edit_login" value="Edit"></a></td>
                    </tr>
                    <tr>
                        <td><label>Phone Number:</label></td>
                        <td><?php echo $_SESSION['account']['userphone']; ?></td>
                        <td>
                            <?php
                                if(!empty($_SESSION['account']['userphone'])) 
                                    echo '<a href="controller/AccountsController.php?action=userphone_display">
                                          <input type="button" name="edit_phone" value="Edit"></a>';
                                else 
                                    echo '<a href="edit_phone.php">
                                          <input type="button" name="edit_phone" value="Add"></a>';
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

        <!-- Invoke the layout of account navigation -->
        <?php include_once('account_nav.php'); ?>
       
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>
  
 </body>
</html>