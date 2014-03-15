<?php


//session_start();



	if(!isAuth($_SESSION['user_id'])){
		echo "Access Error";
		exit();
	}

?>