<?php


//session_start();



	if(!UserInfo::isAuth($_SESSION['user_id'])){
		echo "Access Error";
		exit();
	}

?>