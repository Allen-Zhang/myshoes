
<!-- For navigations redirect product page -->
<?php
	session_start();

    require_once('db.mysql.php');

    $category = $_GET['category'];
    $title = str_replace("_"," ",$_GET['title']);

    // Determine which category user chooses, 
    // fetch corresponding data the product page need from database
    if($category == "brand") {

        $_SESSION['category_title'] = $title." Shoes";

		$sql = "SELECT pid, product_name, price, image 
            	FROM products, brands 
            	WHERE products.bid = brands.bid AND brands.brand_name = '$title'";
                
    } elseif ($category == "style") {

        $_SESSION['category_title'] = $title." Shoes";

		$sql = "SELECT pid, product_name, price, image 
            	FROM products, styles 
            	WHERE products.sid = styles.sid AND styles.style_name = '$title'";

    } elseif ($category == "sale") {

        $_SESSION['category_title'] = $title." Sale";

		$sql = "SELECT sales.pid, product_name, price, image 
            	FROM sales, products, brands 
            	WHERE sales.pid = products.pid AND products.bid = brands.bid AND brands.brand_name = '$title'";

    } elseif ($category == "new_arrivals") {

        $_SESSION['category_title'] ="New Arrivals";

		$sql = "SELECT new_arrivals.pid, product_name, price, image 
            	FROM new_arrivals, products 
            	WHERE new_arrivals.pid = products.pid";

    } else {

    	$_SESSION['msg'] = "Category not found, please try again.";
        
        header('Location: ../index.php');

    }
    
    $result = mysql_query($sql, $conn);

    // Count the number of rows in the result set
    $_SESSION['product_count'] = mysql_num_rows($result);
    
    $array = array();
    $i = 0;

    // Save the query results in an array
    while($row = mysql_fetch_array($result)){

        $array[$i] = array($row["pid"], $row["product_name"], $row["price"], $row["image"]);
        $i++;

    }

    $_SESSION['result'] = $array;

    header('Location: ../product.php');

?>