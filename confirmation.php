<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Confirmation</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/ad_slider.js"></script>
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include 'header.php' ?>

    <div class="confirmation">
        <h2>Your Order Confirmation</h2>

        <p>Order/Address/Payment/Pay for it</p>
        <form action="confirmation_result.php" method="post">
            <table border="0" cellspacing="0">
                <tr>
                    <td><label>Full Name:</label></td>
                    <td><input type="text" name="full_name" required></td>
                </tr>
                <tr>
                    <td><label>Phone Number:</label></td>
                    <td><input type="text" name="phone_number" required></td>
                </tr>                
                <tr>
                    <td><label>Address Line1:</label></td>
                    <td><input type="text" name="address_line1" 
                        placeholder="Street address, P.O box, company name, c/o" required></td>
                </tr>            
                <tr>
                    <td><label>Address Line2:</label></td>
                    <td><input type="text" name="address_line2" 
                        placeholder="Apartment, suite, unit, building, floor, etc." required></td>
                </tr>
                <tr>
                    <td><label>City:</label></td>
                    <td><input type="text" name="city" required></td>
                </tr>
                <tr>
                    <td><label>Zip:</label></td>
                    <td><input type="text" name="zip" required></td>
                </tr>
                <tr>
                    <td><label>Country:</label></td>
                    <td>
                        <select name="country" required>
                            <option value="">--</option>
                            <option value="CHINA">China</option>
                            <option value="USA">Unite State</option>
                        </select>
                    </td>
                </tr>          
            </table>
            <div>
                <input type="submit" name="shipping_address" value="Ship to this address">
            </div>
        </form>

    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>

   
 </body>
</html>