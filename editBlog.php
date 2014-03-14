<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require_once("controllers/controllerInfo.php");
require_once("controllers/configManager.php");

require 'templateEngine.php';

$config =  new ConfigManager();
$config->set('initialize','OK');
$config::loadConfig();
 
$view = new Template("views/pure.php");
$content = new Template("views/editBlog.php");

$view->title = Index::getTitle();
$view->description = Index::getDescription();

$view->content = $content;
 
echo $view;