<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require_once("controllers/controllerInfo.php");

require 'templateEngine.php';
 
$view = new Template("views/pure.php");
$content = new Template("views/login.php");

$view->title = getTitle();
$view->description = getDescription();

$view->content = $content;
 
echo $view;