<?php
require_once("controllers/controllerUser.php");

session_start();


if(!isset($_SESSION['user_id']))
{
   	echo 'You must be logged in to access this page';
   	include("views/footer.php");
   	exit();
}else{
	if(!isAuth($_SESSION['user_id'])){
		echo "Access Error";
		include("views/footer.php");
		exit();
	}
}
?>