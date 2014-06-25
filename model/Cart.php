
<!-- Model for cart -->
<?php

function add_cart($uid, $pid, $size, $quantity) {
    global $db;
    $sql = "INSERT INTO carts (uid, pid, size, quantity) 
            VALUES (:uid, :pid, :size, :quantity)";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
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

function update_cart($quantity, $pid, $size, $uid) {
    global $db;
    $sql = "UPDATE carts SET quantity = :quantity 
            WHERE pid = :pid AND size = :size AND uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':quantity', $quantity);
        $statement->bindValue(':pid', $pid);
        $statement->bindValue(':size', $size);
        $statement->bindValue(':uid', $uid);
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

function delete_cart($uid, $pid, $size) {
    global $db;
    $query = "DELETE FROM carts WHERE uid = :uid AND pid = :pid AND size = :size";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':uid', $uid);
        $statement->bindValue(':pid', $pid);
        $statement->bindValue(':size', $size);
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

function delete_cart_by_id($cid) {
    global $db;
    $query = "DELETE FROM carts WHERE cid = :cid";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':cid', $cid);
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


function check_cart($uid, $pid, $size) {
    global $db;
    $sql = "SELECT quantity 
            FROM carts 
            WHERE uid = :uid AND pid = :pid AND size = :size";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->bindValue(':pid', $pid);
        $statement->bindValue(':size', $size);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['quantity'];
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function get_cart($cid) {
    global $db;
    $sql = "SELECT pid, size, quantity FROM carts WHERE cid = :cid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':cid', $cid);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

?>
