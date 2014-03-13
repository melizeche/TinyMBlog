<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require("models/modelPost.php");

require 'templateEngine.php';
 
	session_start();

// Unset all of the session variables.
	$_SESSION = array();
	/*** begin our session ***/
	#echo $_SESSION['user_id'];
	if(session_destroy()){
		$content = "Log out";
	}



$view = new Template("views/pure.php");

$view->title = getTitle();
$view->description = getDescription();

$view->content = $content;
 
echo $view;
?>