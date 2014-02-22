<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Address</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php') ?>

    <div class="address">
        <h2>Your Delivery Address Information</h2>

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
                                <input type="button" name="old_address" value="Ship to this address"><br/>
                                <input type="button" value="Edit">
                                <input type="button" value="Remove">
                            </td>
                        </tr>
                    </table>';

            }
        ?>

        <h3>Add A New Address:</h3>

        <form action="payment.php" method="post">
            <table class="new_address">
                <tr>
                    <td><label>Full Name:</label></td>
                    <td><input type="text" name="rec_name" placeholder="Recipient's full name here"
                        required><font class="star"> *</font></td>
                </tr>
                <tr>
                    <td><label>Phone Number:</label></td>
                    <td><input type="text" name="rec_phone" placeholder="Recipient's phone number here"
                     required><font class="star"> *</font></td>
                </tr>                
                <tr>
                    <td><label>Address Line1:</label></td>
                    <td><input type="text" name="address_line1" 
                        placeholder="Street address, P.O box, company name, c/o" required><font class="star"> *</font></td>
                </tr>            
                <tr>
                    <td><label>Address Line2:</label></td>
                    <td><input type="text" name="address_line2" 
                        placeholder="Apartment, suite, unit, building, floor, etc." required><font class="star"> *</font></td>
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
                    <td><input type="text" name="zip" required><font class="star"> *</font></td>
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
                <input type="submit" name="new_address" value="Ship to this address">
            </div>
        </form>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>

   
 </body>
</html>