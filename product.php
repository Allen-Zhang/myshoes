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
    <?php include_once('header.php') ?>
    
    <!-- Products Display -->
    <div class="product">

        <div class="category_title">
            <font><?php echo $_SESSION['category_title']; ?></font>
        </div>

        <?php
            // Determine whether product is found
            if ($_SESSION['product_count'] > 0) {

                // Count the number of rows for display
                $row_count = ceil($_SESSION['product_count'] / 4);
                $i = 0;

                echo '<table cellspacing="20">';

                for($row = 0; $row < $row_count; $row++){

                    echo '<tr>';

                    for($col = 0; $col < 4; $col++){

                        echo '<td>
                                <div>';

                                    if(!empty($_SESSION['result'][$i])) {
                                        echo '<a href="product_details.php?pid='.$_SESSION['result'][$i][0].'">
                                        <img src="'.$_SESSION['result'][$i][3].'"></a>';
                                    }

                          echo '</div>
                                <div>';

                                    if(!empty($_SESSION['result'][$i])) {
                                        echo '<strong><a href="product_details.php?pid='.$_SESSION['result'][$i][0].'">'.$_SESSION['result'][$i][1].'</a></strong><br/>
                                            Price: <span>$'.$_SESSION['result'][$i][2].'</span>';
                                    }

                          echo '</div>
                              </td>';

                        $i++;

                    }
                    echo '</tr>';
                }              
                echo '</table>';

            } else {

                echo '<div class="product_empty">';
                    echo '<h2 class="no_product">No Products Found.</h2>';
                    echo '<span>Click </span><a href="index.php">here</a><span> to continue shopping.</span>';
                echo '</div>';

            }                              
        ?>
        
    </div>

    <!-- Invoke the layout of footer -->
    <?php include_once('footer.php') ?>

 </body>
</html>