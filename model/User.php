
<!-- Model for user -->
<?php

function authenticate_user($email, $password) {
    global $db;
    $sql = "SELECT count(0) FROM users WHERE email = :email AND password = :password";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email);
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

function get_user_id($email, $password) {
    global $db;
    $sql = "SELECT uid FROM users WHERE email = :email AND password = :password";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        return $result['uid'];
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function check_email($email) {
    global $db;
    $sql = "SELECT count(0) FROM users WHERE email = :email";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        // Authenticate the email
        if($result[0] > 0) 
        	return false;  // Email already exists
        else
        	return true;  // Email is not exist   
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function add_user($email, $password, $username, $userphone) {
    global $db;
    $sql = "INSERT INTO users (email, password, username, userphone) 
			VALUES (:email, :password, :username, :userphone)";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $password);
        $statement->bindValue(':username', $username);
        $statement->bindValue(':userphone', $userphone);
        $statement->execute();
		$new_id = $db->lastInsertId();
        $statement->closeCursor();
   		return $new_id;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function check_subscribe_email($subscribe_email) {
    global $db;
    $sql = "SELECT count(0) FROM subscribers WHERE subscribe_email = :subscribe_email";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':subscribe_email', $subscribe_email);
        $statement->execute();
        $result = $statement->fetch();
        $statement->closeCursor();
        // Authenticate the email
        if($result[0] > 0) 
        	return false;  // Email already exists
        else
        	return true;  // Email is not exist   
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}

function add_subscribers($uid, $subscribe_email) {
    global $db;
    $sql = "INSERT INTO subscribers (uid, subscribe_email) 
			VALUES (:uid, :subscribe_email)";
    try {
        $statement = $db->prepare($sql);
        $statement->bindValue(':uid', $uid);
        $statement->bindValue(':subscribe_email', $subscribe_email);
        $statement->execute();
        $new_id = $db->lastInsertId();
        $statement->closeCursor();
        return $new_id;
    } catch (PDOException $e) {
        echo 'Error Message: '.$e->getMessage();
    }
}




	
?>

  
  
