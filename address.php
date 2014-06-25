<?php
    require_once('util/lib.php');
    if(empty($_GET['step'])) {
        header('Location: index.php');  // Illegal access, redirect to main page
        exit;
    }
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Address</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/validation.js"></script>
  <script type="text/javascript" src="js/utility.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <!-- Validate user login -->
    <?php include_once('util/validation.php'); ?>

    <div class="address">
        <h2>Your Delivery Address Information</h2>

        <?php
            if(!empty($_SESSION['address'])) {

                foreach($_SESSION['address'] as $address) {

                echo '<table class="old_address">
                        <tr>
                            <td rowspan="3" class="rec_name">
                                <label class="name">'.$address['rec_name'].'</label><br/>
                                <span>'.$address['rec_phone'].'</span>
                            </td>
                            <td class="address">
                                '.$address['address_line_one'].'<br/>';

                            if(!empty($address['address_line_two'])) 
                                echo $address['address_line_two'].'<br/>';    
                            
                            echo $address['city'].', '.$address['state'].', '.$address['zip'].'<br/>
                                '.$address['country'].'
                            </td>
                            <td rowspan="3" class="button">
                                <a href="payment.php?aid='.$address['aid'].'&step=next">
                                    <input type="button" name="old_address" value="Ship to this address">
                                </a><br/>
                                <a href="edit_address_book.php?aid='.$address['aid'].'&page=address">
                                    <input type="button" value="Edit">
                                </a>
                                <a href="controller/AddressesController.php?aid='.$address['aid'].'&page=address&action=address_delete" onclick="return comfirmDelAddress()">
                                    <input type="button" value="Remove">
                                </a>
                            </td>
                        </tr>
                    </table>';                        
                }
            }    
        ?>

        <h3>Add A New Address:</h3>

        <form action="controller/AddressesController.php" method="post">
            <label class="msg"><span id="message"></span></label>
            <table class="new_address">
                <tr>
                    <td><label>Full Name:</label></td>
                    <td><input type="text" id="rec_name" name="rec_name" placeholder="Recipient's full name here"
                        required onblur="isRecNameOk()"><font class="star"> *</font></td>
                </tr>
                <tr>
                    <td><label>Phone Number:</label></td>
                    <td><input type="text" id="rec_phone" name="rec_phone" maxlength="10" placeholder="Recipient's phone number here" required onblur="isRecPhoneOk()"><font class="star"> *</font></td>
                </tr>                
                <tr>
                    <td><label>Address Line1:</label></td>
                    <td><input type="text" id="address_line1" name="address_line1" placeholder="Street address, P.O box, company name, c/o" required required onblur="isAddressOneOk()"><font class="star"> *</font></td>
                </tr>            
                <tr>
                    <td><label>Address Line2:</label></td>
                    <td><input type="text" id="address_line2" name="address_line2" placeholder="Apartment, suite, unit, building, floor, etc." onblur="isAddressTwoOk()"></td>
                </tr>
                <tr>
                    <td><label>City:</label></td>
                    <td><input type="text" id="city" name="city" required onblur="isCityOk()"><font class="star"> *</font></td>
                </tr>
                <tr>
                    <td><label>State/Province/Region:</label></td>
                    <td><input type="text" id="state" name="state" required onblur="isStateOk()"><font class="star"> *</font></td>
                </tr>
                <tr>
                    <td><label>Zip:</label></td>
                    <td><input type="text" id="zip" name="zip" maxlength="5" required onblur="isZipOk()"><font class="star"> *</font></td>
                </tr>
                <tr>
                    <td><label>Country:</label></td>
                    <td>
                        <select name="country" required>
                            <option value="">--</option>
                            <?php 
                                foreach ($countrylist as $countries) {
                                    echo '<option value="'.$countries.'">'.$countries.'</option>';  
                                }
                            ?>
                        </select><font class="star"> *</font>
                    </td>
                </tr>          
            </table>
            <div>
                <input type="hidden" name="action" value="address_add">
                <input type="hidden" name="page" value="address">
                <input type="submit" name="new_address" value="Ship to this address" onclick="return checkAddressForm();">
            </div>
        </form>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

   
 </body>
</html>