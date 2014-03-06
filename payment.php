<?php
    require_once('biz/db.mysql.php');

    if(empty($_GET['step'])) {
        header('Location: index.php');  // Illegal access, redirect to main page
        exit;
    }
?>
<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Payment</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include_once('header.php'); ?>

    <!-- Validate user login -->
    <?php include_once('biz/validation.php'); ?>

    <?php
        if(isset($_GET['aid']))
            $_SESSION['aid'] = $_GET['aid'];
    ?>

    <div class="payment">
        <h2>Your Payment Information</h2><br/>

        <div>
            <p>MyShoes accepts all major <span>Credit</span> and <span>Debit</span> cards:<img src="images/payment.jpg"></p><br/>
            <p>Please enter your card information:</p>
            <form action="confirmation.php" method="post">
                <table border="0" cellspacing="0">
                    <tr>
                        <td><label>Name on card</label></td>
                        <td><label>Card number</label></td>
                        <td><label>Expiration date</label></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name_on_card" required></td>
                        <td><input type="text" name="card_number" maxlength="16" required></td>
                        <td>
                            <select name="month" required>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>                            
                            </select>
                            <select name="year" required>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2027">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>                            
                            </select>
                        </td>
                        <td>
                            <input type="submit" name="add_card" value="Add your card">
                        </td>
                    </tr>                
                </table>
            </form>
        </div>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php'); ?>

   
 </body>
</html>