<?php
    require_once('biz/db.mysql.php');
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Edit Address</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <!-- Validate user login -->
    <?php include_once('biz/validation.php'); ?>

    <?php
        $sql = "SELECT aid, rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country 
                FROM addresses 
                WHERE uid = ".$_SESSION['uid'];
        $result = mysql_query($sql, $conn);
    ?>

    <div class="account">

        <div class="edit_address">

            <h2>Address Setting</h2>

            <hr>

            <div class="address_edit">
                <p><label class="title1">Change/Add Delivery Address</label></p>

                <?php
                    while ($row = mysql_fetch_array($result)) {

                        echo '<table class="old_address">
                                <tr>
                                    <td rowspan="3" class="rec_name">
                                        <label class="name">'.$row['rec_name'].'</label><br/>
                                        <span>'.$row['rec_phone'].'</span>
                                    </td>
                                    <td class="address">
                                        '.$row['address_line_one'].'<br/>';

                                    if(!empty($row['address_line_two'])) 
                                        echo $row['address_line_two'].'<br/>';    
                                    
                                    echo $row['city'].', '.$row['state'].', '.$row['zip'].'<br/>
                                        '.$row['country'].'
                                    </td>
                                    <td rowspan="3" class="button">
                                        <a href="edit_address_book.php?aid='.$row['aid'].'&page=edit_address">
                                            <input type="button" value="Edit">
                                        </a>
                                        <a href="biz/address_delete.php?aid='.$row['aid'].'&page=edit_address">
                                            <input type="button" value="Remove">
                                        </a>
                                    </td>
                                </tr>
                            </table>';                        
                    }

                ?>

                <p>Use the form below to add new delivery address for your MyShoes.com account. 
                   Use the new delivery address next time when you shopping on MyShoes.com.</p>

                <form action="biz/address_add.php" method="post">
                    <table class="new_address">
                        <tr>
                            <td><label>Full Name:</label></td>
                            <td><input type="text" name="rec_name" placeholder="Recipient's full name here"
                             required><font class="star"> *</font></td>
                        </tr>
                        <tr>
                            <td><label>Phone Number:</label></td>
                            <td><input type="text" name="rec_phone" maxlength="10" placeholder="Recipient's phone number here"
                             required><font class="star"> *</font></td>
                        </tr>               
                        <tr>
                            <td><label>Address Line1:</label></td>
                            <td>
                                <input type="text" name="address_line1" 
                                placeholder="Street address, P.O box, company name, c/o" required>
                                <font class="star"> *</font>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Address Line2:</label></td>
                            <td>
                                <input type="text" name="address_line2" 
                                placeholder="Apartment, suite, unit, building, floor, etc.">
                            </td>
                        </tr>
                        <tr>
                            <td><label>City:</label></td>
                            <td><input type="text" name="city" required><font class="star"> *</font></td>
                        </tr>
                        <tr>
                            <td><label>State/Province/Region:</label></td>
                            <td><input type="text" name="state" required><font class="star"> *</font></td>
                        </tr>
                        <tr>
                            <td><label>Zip:</label></td>
                            <td><input type="text" name="zip" maxlength="5" required><font class="star"> *</font></td>
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
                        <input type="hidden" name="page" value="edit_address">
                        <input type="submit" value="Add address">&nbsp;
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