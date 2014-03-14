<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require_once("controllers/configManager.php");
require("models/modelPost.php");

require 'templateEngine.php';

$config =  new ConfigManager();
$config->set('initialize','OK');
$config::loadConfig();
 
	session_start();

// Unset all of the session variables.
	$_SESSION = array();
	/*** begin our session ***/
	#echo $_SESSION['user_id'];
	if(session_destroy()){
		$content = "Log out <br> <script>location.assign('/')</script>";
	}



$view = new Template("views/pure.php");

$view->title = Index::getTitle();
$view->description = Index::getDescription();

$view->content = $content;
 
echo $view;
?>