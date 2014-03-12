<?php
	include("views/header.php");
	session_start();

// Unset all of the session variables.
	$_SESSION = array();
	/*** begin our session ***/
	echo $_SESSION['user_id'];
	if(session_destroy()){
		echo "Log out";
	}

	include("views/footer.php");

?>