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
if(!$config){
    echo "NO CONFIG";
}
$config->set('initialize','OK');
$config::loadConfig();
define('PATH',ConfigManager::get('path'));

#urlrewrite
$path = ltrim($_SERVER['REQUEST_URI'], '/');    // Trim leading slash(es)
$elements = explode('/', $path);                // Split path on slashes

if(count($elements) == 0)                       // No path elements means home
    echo "realindex";
else switch(array_shift($elements))             // Pop off first item and switch
{
    case '':
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
        $content = View::index($elements);
        break;
    case 'login':
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

$view = new Template("views/pure.php");     //load the deafault template
$view->title =  Index::getTitle();          
$view->description = Index::getDescription();
$view->content = $content;

$all = Info::getLinks();    //display available links 
$links = "";
if($all['github']){
     $links = $links . '<li class="nav-item"><a class="fa fa-github fa-3x"  href="http://github.com/' . $all['github'] . '"></a></li>';
}
if($all['email']){
     $links = $links . '<li class="nav-item"><a class="fa fa-envelope fa-3x"  href="mailto:' . $all['email'] . '"></a></li>';
}
if($all['twitter']){
     $links = $links . '<li class="nav-item"><a class="fa fa-twitter fa-3x"  href="http://twitter.com/' . $all['twitter'] . '"></a></li>';
}
if($all['linkedin']){
     $links = $links . '<li class="nav-item"><a class="fa fa-linkedin fa-3x"  href="http://linkedin.com/in/' . $all['linkedin'] . '"></a></li>';
}

$view->links = $links;
 
echo $view;         //display view