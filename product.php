<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8" />
  <title>Product</title>
  <link type="text/css" rel="stylesheet" href="css/main.css"> 
  <link type="text/css" rel="stylesheet" href="css/navigation.css"> 
 </head>

 <body>

    <!-- Invoke the layout of header -->
    <?php include 'header.php' ?>
    
    <!-- Products Display -->
    <div class="product">
        <font>Catagory Name</font>
        <?php
            define("ROW", 5);

            echo '<table border="0" width="100%" cellspacing="20">';

            for($row = 1; $row <= ROW; $row++){

                echo '<tr>';

                for($col = 1; $col <= 4; $col++){

                        echo '<td>';
                        echo '<a href="product_details.php"><img src="#"></a>';
                        echo '</td>';

                    }

                echo '</tr>';

                }
          
            echo '</table>';
        ?>
    </div>

    <!-- Invoke the layout of footer -->
    <?php include 'footer.php' ?>

 </body>
</html>