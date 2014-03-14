<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require_once("controllers/configManager.php");
require 'templateEngine.php';

## configuration ##
$config =  new ConfigManager();
$config->set('initialize','OK');
$config::loadConfig();
//echo ConfigManager::get('xxx');
//$cfg = ConfigManager::loadConfig(); 
//$config::set($cfg);
$cfg='';
//echo var_dump(ConfigManager::get('database'));

$view = new Template("views/pure.php");
$content = new Template("views/posts.php");

$content->config = $cfg;

$view->title =  Index::getTitle();
$view->description = Index::getDescription();
$view->content = $content;
 
echo $view;