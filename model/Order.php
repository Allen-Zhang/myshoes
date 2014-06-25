
<!-- Model for order -->
<?php

function add_order($order_num, $uid, $aid, $created_date, $estimated_date, 
                   $name_on_card, $card_num, $exp_date, $total, $status) {
    global $db;
    $sql = "INSERT INTO orders (order_num, uid, aid, created_date, estimated_date, name_on_card, card_num, exp_date, total, status)    VALUES (:order_num, :uid, :aid, :created_date, :estimated_date, :name_on_card, :card_num, :exp_date, :total, :status)";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':order_num', $order_num);
        $statement->bindValue(':uid', $uid);
        $statement->bindValue(':aid', $aid);
        $statement->bindValue(':created_date', $created_date);
        $statement->bindValue(':estimated_date', $estimated_date);
        $statement->bindValue(':name_on_card', $name_on_card);
        $statement->bindValue(':card_num', $card_num);
        $statement->bindValue(':exp_date', $exp_date);
        $statement->bindValue(':total', $total);
        $statement->bindValue(':status', $status);
        $statement->execute();
        $new_id = $db->lastInsertId();
        $statement->closeCursor();
        return $new_id;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function add_order_details($order_num, $pid, $size, $quantity) {
    global $db;
    $sql = "INSERT INTO order_details (order_num, pid, size, quantity) 
                                    VALUES (:order_num, :pid, :size, :quantity)";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':order_num', $order_num);
        $statement->bindValue(':pid', $pid);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':quantity', $quantity);
        $statement->execute();
        $new_id = $db->lastInsertId();
        $statement->closeCursor();
        return $new_id;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function update_status($order_num) {
    global $db;
    $sql = "UPDATE orders 
            SET status = :status
            WHERE order_num = :order_num";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':status', 'Delivered');
        $statement->bindValue(':order_num', $order_num);
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

function get_order_status() {
    global $db;
    $sql = "SELECT order_num, estimated_date FROM orders";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->execute();
        $results = $statement->fetchAll();
        $statement->closeCursor();
        return $results;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }

}

?>

  
  
