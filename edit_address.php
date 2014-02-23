<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Edit Address</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php') ?>

    <div class="account">

        <div class="edit_address">

            <h2>Address Setting</h2>

            <hr>

            <div class="address_edit">
                <p><label class="title1">Change/Add Delivery Address</label></p>

                <?php
                    define("ROW", 2);

                    for($row = 1; $row <= ROW; $row++){

                        echo '<table class="old_address">
                                <tr>
                                    <td rowspan="3" class="rec_name">
                                        <label class="name">Yingyuan Zhang</label><br/>
                                        <span>(917)856-6699</span>
                                    </td>
                                    <td class="address">
                                        22 MOUNT VERNON ST<br/>
                                        BRIGHTON, MA, 02135<br/>
                                        United States
                                    </td>
                                    <td rowspan="3" class="button">
                                        <input type="button" value="Edit">
                                        <input type="button" value="Remove">
                                    </td>
                                </tr>
                            </table>';

                    }
                ?>

                <p>Use the form below to add new delivery address for your MyShoes.com account. 
                   Use the new delivery address next time when you shopping on MyShoes.com.</p>

                <form action="#" method="post">
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
                                placeholder="Apartment, suite, unit, building, floor, etc." required>
                                <font class="star"> *</font>
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
                                    <option value="CHINA">China</option>
                                    <option value="USA">Unite State</option>
                                </select><font class="star"> *</font>
                            </td>
                        </tr>          
                    </table>

                    <div>
                        <input type="submit" value="Add Address">&nbsp;
                        <a href="account_info.php"><input type="button" value="Go back"></a>
                    </div>
                </form>
            </div>

        </div>

        <!-- Invoke the layout of account navigation -->
        <?php include_once('account_nav.php') ?>
       
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>
  
 </body>
</html>