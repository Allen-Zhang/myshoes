<?php
    require_once('model/db.mysql.php');
    require_once('util/lib.php');

    if(!isset($_GET['aid']) || !isset($_GET['page'])) {
        header('Location: ../index.php');  // Illegal access, redirect to main page
        exit;
    } else {
        $aid = $_GET['aid'];
        $page = $_GET['page'];  // Determine which page invokes this function, edit_address or address page
        global $db;
        $sql = "SELECT rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country 
                FROM addresses WHERE aid = :aid";
        try {
            $statement = $db->prepare($sql);
            $statement->bindValue(':aid', $aid);
            $statement->execute();
            $row = $statement->fetch();
            $statement->closeCursor();
        } catch (PDOException $e) {
            echo 'Error Message: '.$e->getMessage();
        }
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
  <script type="text/javascript" src="js/validation.js"></script>
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

                <form action="controller/AddressesController.php" method="post">
                    <label class="msg"><span id="message"></span></label>
                    <table class="new_address">
                        <tr>
                            <td><label>Full Name:</label></td>
                            <td>
                                <input type="text" id="rec_name" name="rec_name" value="<?php echo $row['rec_name'];?>" 
                                placeholder="Recipient's full name here" required onblur="isRecNameOk()"><font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Phone Number:</label></td>
                            <td>
                                <input type="text" id="rec_phone" name="rec_phone" maxlength="10" value="<?php echo $rec_phone;?>" 
                                placeholder="Recipient's phone number here" required onblur="isRecPhoneOk()"><font class="star"> *</font>
                            </td>
                        </tr>               
                        <tr>
                            <td><label>Address Line1:</label></td>
                            <td>
                                <input type="text" id="address_line1" name="address_line1" value="<?php echo $row['address_line_one'];?>" placeholder="Street address, P.O box, company name, c/o" required required onblur="isAddressOneOk()">
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Address Line2:</label></td>
                            <td>
                                <input type="text" id="address_line2" name="address_line2" value="<?php echo $row['address_line_two'];?>" placeholder="Apartment, suite, unit, building, floor, etc." onblur="isAddressTwoOk()">
                            </td>
                        </tr>
                        <tr>
                            <td><label>City:</label></td>
                            <td>
                                <input type="text" id="city" name="city" value="<?php echo $row['city'];?>"required onblur="isCityOk()">
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>State/Province/Region:</label></td>
                            <td>
                                <input type="text" id="state" name="state" value="<?php echo $row['state'];?>" required onblur="isStateOk()">
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Zip:</label></td>
                            <td>
                                <input type="text" id="zip" name="zip" maxlength="5" value="<?php echo $row['zip'];?>" required onblur="isZipOk()">
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
                        <input type="hidden" name="action" value="address_update">
                        <input type="hidden" name="aid" value="<?php echo $aid;?>">
                        <input type="hidden" name="page" value="<?php echo $page;?>">
                        
                        <?php
                            if($page == "address") {
                                echo '<input type="submit" value="Ship to here" onclick="return checkAddressForm();">&nbsp;
                                      <a href="address.php?step=next"><input type="button" value="Go back"></a>';
                            } else {
                                echo '<input type="submit" value="Edit address" onclick="return checkAddressForm();">&nbsp;
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