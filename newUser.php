<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require_once("controllers/configManager.php");
require 'templateEngine.php';

$config =  new ConfigManager();
$config->set('initialize','OK');
$config::loadConfig();
 

$content = new Template("views/newUser.php");
$content->auth = new Template("views/auth.php");
$view = new Template("views/pure.php");

$view->title =  Index::getTitle();
$view->description = Index::getDescription();

$view->content = $content;
 
echo $view;