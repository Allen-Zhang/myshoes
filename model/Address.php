
<!-- Model for address -->
<?php

function get_address($uid) {
    global $db;
    $sql = "SELECT aid, rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country 
            FROM addresses 
            WHERE uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->execute();
        $results = $statement->fetchAll();
        $i = 0;
        foreach($results as $result) {
            $array[$i] = array(
                    "aid"=>$result[0], 
                    "rec_name"=>$result[1],
                    "rec_phone"=>$result[2],
                    "address_line_one"=>$result[3], 
                    "address_line_two"=>$result[4],
                    "city"=>$result[5],
                    "state"=>$result[6], 
                    "zip"=>$result[7],
                    "country"=>$result[8]);
            $i++;
        } 
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function add_address($uid, $rec_name, $rec_phone, $address_line_one, 
                     $address_line_two, $city, $state, $zip, $country) {
    global $db;
    $sql = "INSERT INTO addresses (uid, rec_name, rec_phone, address_line_one, address_line_two, city, state, zip, country) 
            VALUES (:uid, :rec_name, :rec_phone, :address_line_one, :address_line_two, :city, :state, :zip, :country)";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->bindValue(':rec_name', $rec_name);
        $statement->bindValue(':rec_phone', $rec_phone);
        $statement->bindValue(':address_line_one', $address_line_one);
        $statement->bindValue(':address_line_two', $address_line_two);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':country', $country);
        $statement->execute();
        $new_id = $db->lastInsertId();
        $statement->closeCursor();
        return $new_id;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function update_address($uid, $aid, $rec_name, $rec_phone, $address_line_one, 
                        $address_line_two, $city, $state, $zip, $country) {
    global $db;
    $sql = "UPDATE addresses 
            SET rec_name = :rec_name, rec_phone = :rec_phone, address_line_one = :address_line_one, 
                address_line_two = :address_line_two, city = :city, state = :state, zip = :zip, country = :country
            WHERE aid = :aid AND uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->bindValue(':aid', $aid);
        $statement->bindValue(':rec_name', $rec_name);
        $statement->bindValue(':rec_phone', $rec_phone);
        $statement->bindValue(':address_line_one', $address_line_one);
        $statement->bindValue(':address_line_two', $address_line_two);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':state', $state);
        $statement->bindValue(':zip', $zip);
        $statement->bindValue(':country', $country);
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

function delete_address($aid) {
    global $db;
    $query = "DELETE FROM addresses WHERE aid = :aid";
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':aid', $aid);
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

?>
