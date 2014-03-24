<?php
require_once("controllers/controllerIndex.php");
require_once("controllers/controllerUser.php");
require_once("controllers/controllerInfo.php");
require_once("controllers/configManager.php");
require_once("models/modelPost.php");
require 'templateEngine.php';
require 'views.php';

## configuration ##

$config =  new ConfigManager();
$config->set('initialize','OK');
$config::loadConfig();

#urlrewrite
$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes
//print_r($elements);

if(count($elements) == 0)                       // No path elements means home
    echo "realindex";
else switch(array_shift($elements))             // Pop off first item and switch
{
    case '':
        echo "index"; // passes rest of parameters to internal function
        $content = View::index($elements);
        break;
    case 'delPost':
        $content = View::delPost($elements);
        break;
    case 'editBlog':
        $content = View::editBlog($elements);
        break;
    case 'editPost':
        $content = View::editPost($elements);
        break;
    case 'index.php':
        echo "index.php"; // passes rest of parameters to internal function
        $content = View::index($elements);
        break;
    case 'login':
    	echo "login";
        $content = View::login($elements);
    	break;
    case 'logout':
        $content = View::logout($elements);
        break;
    case 'newPost':
        $content = View::newPost($elements);
        break;
    case 'newUser':
        $content = View::newUser($elements);
        break;
    case 'post':
        $content = View::post($elements);
    	break;
        
    default:
        header('HTTP/1.1 404 Not Found');
       $content =  "Show404Error()";
}


$view = new Template("views/pure.php");
$view->title =  Index::getTitle();
$view->description = Index::getDescription();
$view->content = $content;
 
echo $view;