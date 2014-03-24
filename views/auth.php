<?php


//session_start();



	if(!UserInfo::isAuth($_SESSION['user_id'])){
		echo "<p>Access Error, please <a href='../login'>log in</a></p>";
		exit();
	}

?>