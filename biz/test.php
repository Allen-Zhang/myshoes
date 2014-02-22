<?php

	require_once('db.mysql.php');

	$sql = "select count(0) userCount, uid from users where email = 'allenzhang@gmail.com' and password = 'allenzhang'";

	$result = mysql_query($sql, $conn);

	$row = mysql_fetch_assoc($result);

	// while($row1 = mysql_fetch_array($result)) {

	// 	echo $row1['username']."<br/>";

	// }

	// Authenticate the user
	if ($row['userCount'] == 1) {

		$_SESSION['msg'] = "Welcome back";
		$_SESSION['uid'] = $row['uid'];

	} else {
		
		$_SESSION['msg'] = "Login Failed";
	
	}

	var_dump($_SESSION['uid']); 

	echo '<br/>';

	print_r($row);

?>