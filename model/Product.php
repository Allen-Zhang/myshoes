
<!-- Model for product -->
<?php

function get_product_by_brand($title) {
    global $db;
    $sql = "SELECT pid, product_name, price, image 
            FROM products, brands 
            WHERE products.bid = brands.bid AND brands.brand_name = :title";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':title', $title);
        $statement->execute();
        $results = $statement->fetchAll();
        $i = 0;
        foreach($results as $result) { 
            $array[$i] = array($result["pid"], $result["product_name"], $result["price"], $result["image"]);
            $i++;
        } 
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function get_product_by_style($title) {
    global $db;
    $sql = "SELECT pid, product_name, price, image 
            FROM products, styles 
            WHERE products.sid = styles.sid AND styles.style_name = :title";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':title', $title);
        $statement->execute();
        $results = $statement->fetchAll();
        $i = 0;
        foreach($results as $result) { 
            $array[$i] = array($result["pid"], $result["product_name"], $result["price"], $result["image"]);
            $i++;
        } 
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function get_product_by_sale($title) {
    global $db;
    $sql = "SELECT sales.pid, product_name, price, image 
            FROM sales, products, brands 
            WHERE sales.pid = products.pid AND products.bid = brands.bid AND brands.brand_name = :title";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':title', $title);
        $statement->execute();
        $results = $statement->fetchAll();
        $i = 0;
        foreach($results as $result) { 
            $array[$i] = array($result["pid"], $result["product_name"], $result["price"], $result["image"]);
            $i++;
        } 
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function get_product_by_new_arrivals() {
    global $db;
    $sql = "SELECT new_arrivals.pid, product_name, price, image 
            FROM new_arrivals, products 
            WHERE new_arrivals.pid = products.pid";
    try {
        $statement = $db->prepare($sql);
        $statement->execute();
        $results = $statement->fetchAll();
        $i = 0;
        foreach($results as $result) { 
            $array[$i] = array($result["pid"], $result["product_name"], $result["price"], $result["image"]);
            $i++;
        } 
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function get_product_details($pid) {
    global $db;
    $sql = "SELECT pid, product_name, list_price, price, desc_one, desc_two, desc_three, amount, image 
            FROM products 
            WHERE pid = :pid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':pid', $pid);
        $statement->execute();
        $result = $statement->fetch();
        $array = array(
            "pid"=>$result[0],
            "product_name"=>$result[1], 
            "list_price"=>$result[2],
            "price"=>$result[3],
            "desc_one"=>$result[4],
            "desc_two"=>$result[5],
            "desc_three"=>$result[6],
            "amount"=>$result[7],
            "image"=>$result[8]);
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function update_product_amount($amount, $pid) {
    global $db;
    $sql = "UPDATE products SET amount = :amount WHERE pid = :pid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':amount', $amount);
        $statement->bindValue(':pid', $pid);
        $affected = $statement->execute();
        $statement->closeCursor();
        if($affected == 1)
            return true;
        else
            return false;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

            // WHERE product_name LIKE \'\%:keyword\%\'
            // OR desc_one LIKE \'\%:keyword\%\'
            // OR desc_two LIKE \'\%:keyword\%\'
            // OR desc_three LIKE \'\%:keyword\%\'";

function get_search_results($keyword) {
    global $db;
    $sql = "SELECT pid, product_name, price, image 
            FROM products 
            WHERE product_name LIKE :keyword
            OR desc_one LIKE :keyword
            OR desc_two LIKE :keyword
            OR desc_three LIKE :keyword";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':keyword', "%$keyword%");
        $statement->execute();
        $results = $statement->fetchAll();
        $i = 0;
        foreach($results as $result) { 
            $array[$i] = array($result["pid"], $result["product_name"], $result["price"], $result["image"]);
            $i++;
        } 
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}
	
?>

  
  
