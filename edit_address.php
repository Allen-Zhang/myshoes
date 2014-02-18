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
    <?php include 'header.php' ?>

    <div class="account">

        <div class="edit_address">

            <h2>Address Setting</h2>

            <hr>

            <div class="address_edit">
                <p><label class="title1">Change Delivery Address</label></p>
                <p>Use the form below to change the delivery address for your MyShoes.com account. 
                   Use the new delivery address next time when you shopping on MyShoes.com.</p>

                <form action="#" method="post">
                    <table>              
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
                        <input type="submit" value="Save changes">&nbsp;
                        <a href="account_info.php"><input type="button" value="Go back"></a>
                    </div>
                </form>
            </div>

        </div>

        <!-- Invoke the layout of account navigation -->
        <?php include 'account_nav.php' ?>
       
    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>
  
 </body>
</html>