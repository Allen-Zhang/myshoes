
<!-- Model for account -->
<?php

function get_user_info($uid) {
    global $db;
    $sql = "SELECT email, password, username, userphone FROM users WHERE uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->execute();
        $result = $statement->fetch();
        $array = array(
                "email"=>$result[0], 
                "password"=>$result[1],
                "username"=>$result[2],
                "userphone"=>$result[3]);
        $statement->closeCursor();
        return $array;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function update_username($uid, $username) {
    global $db;
    $sql = "UPDATE users
            SET username = :username
            WHERE uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':username', $username);
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

function update_userphone($uid, $userphone) {
    global $db;
    $sql = "UPDATE users
            SET userphone = :userphone
            WHERE uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':userphone', $userphone);
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

function authenticate_account($uid, $password) {
    global $db;
    $sql = "SELECT count(0) FROM users WHERE uid = :uid AND password = :password";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        // Authenticate the user
        if($result[0] == 1) 
            return true;
        else
            return false;      
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function check_new_email($email, $uid) {
    global $db;
    $sql = "SELECT uid FROM users WHERE email = :email";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        // Authenticate the email
        if(!empty($result['uid']) && $result['uid'] != $uid) 
            return false;  // New email address has already been used by other users
        else
            return true;  // New email address has not been used, then update it   
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function update_email_password($email, $password, $uid) {
    global $db;
    $sql = "UPDATE users
            SET email = :email, password = :password
            WHERE uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
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

function update_email($email, $uid) {
    global $db;
    $sql = "UPDATE users
            SET email = :email
            WHERE uid = :uid";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email);
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


	
?>

  
  
