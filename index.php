<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require_once("controllers/configManager.php");
require 'templateEngine.php';
require 'views.php';

## configuration ##

$config =  new ConfigManager();
$config->set('initialize','OK');
$config::loadConfig();

#urlrewrite
$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes
var_dump($elements);
if(count($elements) == 0)                       // No path elements means home
    echo "realindex";
else switch(array_shift($elements))             // Pop off first item and switch
{
    case '':
        echo "index"; // passes rest of parameters to internal function
        break;
    case 'more':
    	echo "more";
    	break;
    case 'post':
    	echo "post";
        $content = View::post();

    	break;
        
    default:
        header('HTTP/1.1 404 Not Found');
       echo "Show404Error()";
}


//echo ConfigManager::get('xxx');
//$cfg = ConfigManager::loadConfig(); 
//$config::set($cfg);
$cfg='';
//echo var_dump(ConfigManager::get('database'));

$view = new Template("views/pure.php");
//$content = new Template("views/posts.php");

//$content->config = $cfg;

$view->title =  Index::getTitle();
$view->description = Index::getDescription();
$view->content = $content;
 
echo $view;