<?php
    require_once('biz/db.mysql.php');
    require_once('biz/lib.php');

    if(!isset($_GET['aid']) || !isset($_GET['page'])) {

       header('Location: ../index.php');  // Illegal access, redirect to main page
       exit;

    } else {

        $aid = $_GET['aid'];
        $page = $_GET['page'];  // Determine which page invokes this function, edit_address or address page

        $sql = "SELECT rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country 
                FROM addresses 
                WHERE aid = '$aid'";

        $result = mysql_query($sql, $conn);
        $row = mysql_fetch_array($result);
        $rec_phone = str_replace("-","",str_replace(")","",str_replace("(","",$row['rec_phone'])));

    } 
?>

<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Edit Address Book</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <div class="account">

        <div class="edit_address">

            <h2>Address Book Setting</h2>

            <hr>

            <div class="address_edit">
                <p><label class="title1">Change Delivery Address</label></p>

                <p>Use the form below to edit your delivery address for your MyShoes.com account. 
                   Use the new delivery address when you shopping on MyShoes.com.</p>

                <form action="biz/address_edit.php" method="post">
                    <table class="new_address">
                        <tr>
                            <td><label>Full Name:</label></td>
                            <td>
                                <input type="text" name="rec_name" value="<?php echo $row['rec_name'];?>" 
                                placeholder="Recipient's full name here" required><font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Phone Number:</label></td>
                            <td>
                                <input type="text" name="rec_phone" maxlength="10" value="<?php echo $rec_phone;?>" 
                                placeholder="Recipient's phone number here" required><font class="star"> *</font>
                            </td>
                        </tr>               
                        <tr>
                            <td><label>Address Line1:</label></td>
                            <td>
                                <input type="text" name="address_line1" value="<?php echo $row['address_line_one'];?>"
                                placeholder="Street address, P.O box, company name, c/o" required>
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Address Line2:</label></td>
                            <td>
                                <input type="text" name="address_line2" value="<?php echo $row['address_line_two'];?>"
                                placeholder="Apartment, suite, unit, building, floor, etc.">
                            </td>
                        </tr>
                        <tr>
                            <td><label>City:</label></td>
                            <td>
                                <input type="text" name="city" value="<?php echo $row['city'];?>"required>
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>State/Province/Region:</label></td>
                            <td>
                                <input type="text" name="state" value="<?php echo $row['state'];?>" required>
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Zip:</label></td>
                            <td>
                                <input type="text" name="zip" maxlength="5" value="<?php echo $row['zip'];?>" required>
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Country:</label></td>
                            <td>
                                <select name="country" required>
                                    <?php 
                                        foreach ($countrylist as $countries) {

                                            if ($countries == $row['country']) {

                                                echo '<option selected value="'.$countries.'">'.$countries.'</option>';

                                            } else {

                                                echo '<option value="'.$countries.'">'.$countries.'</option>';

                                            }  
                                        }
                                    ?>
                                </select><font class="star"> *</font>
                            </td>
                        </tr>          
                    </table>

                    <div>
                        <input type="hidden" name="aid" value="<?php echo $aid;?>">
                        <input type="hidden" name="page" value="<?php echo $page;?>">
                        <?php
                            if($page == "address") {

                                echo '<input type="submit" value="Ship to here">&nbsp;
                                      <a href="address.php"><input type="button" value="Go back"></a>';

                            } else {

                                echo '<input type="submit" value="Edit address">&nbsp;
                                      <a href="edit_address.php"><input type="button" value="Go back"></a>';

                            } 
                        ?>
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