
<!-- Functions for website security -->
<?php

function loginValidate() {
	if(!isset($_SESSION['uid'])) {			
		echo '<h2>Illegal access, please login in first.</h2>';
		exit;
	} 
}

loginValidate();
	
?>