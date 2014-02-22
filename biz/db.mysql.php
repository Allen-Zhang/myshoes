
<!-- MySQL Database Connection -->
<?php

	$conn = mysql_connect("127.0.0.1", "root", "root") or die("Unable to connect" . mysql_error());

	mysql_select_db("myshoes", $conn) or die("Unable to connect to myshoes database");

?>



