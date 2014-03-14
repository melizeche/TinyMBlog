<?php


//session_start();


if(!isset($_SESSION['user_id']))
{
   	echo 'You must be logged in to access this page';
   	exit();
}else{
	if(!isAuth($_SESSION['user_id'])){
		echo "Access Error";
		exit();
	}
}
?>