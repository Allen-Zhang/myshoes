<?php
    require_once('biz/db.mysql.php');
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Edit Phone Number</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <?php
        $result = mysql_query("SELECT userphone FROM users WHERE uid = ".$_SESSION['uid'], $conn);       
        $row = mysql_fetch_array($result);
        $userphone = str_replace("-","",str_replace(")","",str_replace("(","",$row['userphone'])));
    ?>  

    <div class="account">

        <div class="edit_phone">

            <h2>Phone Nubmber Setting</h2>

            <hr>

            <div class="phone_edit">
                <p><label class="title1">Change/Add Your Phone Number</label></p>
                <p>If you want to change/add the phone number associated with your MyShoes.com account, 
                   you may do so below. Be sure to click the Save changes button when you are done.</p>
                <p><label class="title2">What is your new phone number?</label></p>

                <form action="biz/account_edit.php" method="post">
                    <table>
                        <tr>
                           <td>
                               <label class="title3">New Phone Number:&nbsp;</label>
                               <input type="text" name="edit_phone" maxlength="10" value="<?php echo $userphone;?>" placeholder="Enter your phone number" required>
                               <font class="star"> *</font>
                           </td>
                           <td>
                               <input type="submit" value="Save changes">&nbsp;
                               <a href="account_info.php"><input type="button" value="Go back"></a>
                           </td> 
                        </tr>
                    </table>
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