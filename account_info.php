<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Account Information</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php') ?>

    <?php
        require_once('biz/db.mysql.php');

        $sql = "SELECT email, password, username, userphone FROM users WHERE uid = ".$_SESSION['uid'];
        
        $result = mysql_query($sql, $conn);
        $row = mysql_fetch_array($result)
    ?>

    <div class="account">

        <div class="account_info">

            <h2>Account Information</h2>

            <hr>

            <div>
                <table>
                    <tr>
                        <td><label>Name:</label></td>
                        <td><?php echo $row['username']; ?></td>
                        <td>
                            <?php
                                if(!empty($row['username'])) 
                                    echo '<a href="edit_name.php"><input type="button" name="edit_name" value="Edit"></a>';
                                else 
                                    echo '<a href="edit_name.php"><input type="button" name="edit_name" value="Add"></a>'
                            ?>
                        </td>
                    </tr>
                    <tr>                       
                        <td><label>E-mail:</label></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><a href="edit_login.php"><input type="button" name="edit_login" value="Edit"></a></td>
                    </tr>
                     <tr>
                        <td><label>Password:</label></td>
                        <td>**********</td>                       
                        <td><a href="edit_login.php"><input type="button" name="edit_login" value="Edit"></a></td>
                    </tr>
                    <tr>
                        <td><label>Phone Number:</label></td>
                        <td><?php echo $row['userphone']; ?></td>
                        <td>
                            <?php
                                if(!empty($row['userphone'])) 
                                    echo '<a href="edit_phone.php"><input type="button" name="edit_phone" value="Edit"></a>';
                                else 
                                    echo '<a href="edit_phone.php"><input type="button" name="edit_phone" value="Add"></a>'
                            ?>
                        </td>
                    </tr>
                </table>
            </div>

        </div>

        <!-- Invoke the layout of account navigation -->
        <?php include_once('account_nav.php') ?>
       
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>
  
 </body>
</html>