<!DOCTYPE html>
<?php
  function writeConfig($data){

    $content = '<?php' . PHP_EOL . 'return ' . var_export($data, true) . ';';
    return is_numeric(file_put_contents('config.php', $content));
    
  }
  function loadConfig() 
{
    return require 'config.php';
}
?>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TinyMBlog Setup></title>
  <link rel="stylesheet" href="css/pure-min.css">
  <link rel="stylesheet" href="css/FontAwesome/font-awesome.min.css">
  <link rel="stylesheet" href="css/blog.css">
</head>
  <body>
    <div class="pure-g-r" id="layout">
      <div class="sidebar pure-u">
        <header class="header">
          <hgroup>
            <h1 class="brand-title">SETUP</h1>
            <h2 class="brand-tagline">Set the DB parameters, username and password</h2>
          </hgroup>
          
        </header>
      </div>

      <div class="pure-u-1">
        <div class="content">
          <div class="posts">
            <?php 
              

              #$newdata = array("host" => "localhost" , "port" => "27017", "database" => "blog", "user" =>"admin", "password"=>"admin");
              if (array_key_exists('step',$_GET) && !empty($_GET['host'])) { 
                  if($_GET['step']=='1'){
                          $host = filter_var($_GET['host'], FILTER_SANITIZE_STRING);
                          $port = filter_var($_GET['port'], FILTER_SANITIZE_STRING);
                          $database = filter_var($_GET['database'], FILTER_SANITIZE_STRING);
                          $user = filter_var($_GET['dbuser'], FILTER_SANITIZE_STRING);
                          $password = filter_var($_GET['dbpassword'], FILTER_SANITIZE_STRING);
                          $path = filter_var($_GET['path'], FILTER_SANITIZE_STRING);
                          $newdata = array("host" =>  $host, "port" => $port, "database" => $database, "user" =>$user, "password"=>$password, "path"=>$path);
                          
                          if(writeConfig($newdata)){
                            echo "config.php OK";
                            echo "<p><a href='setup.php?step=2&host=$host'> Check DB Connection</a></p>";  
                          }else{
                            echo "Can't write config.php, check write permissions on " . str_replace('setup.php', '', $_SERVER['SCRIPT_FILENAME']) . " and try again";
                          }
                          
                          
                          
                  }elseif($_GET['step']=='2'){
                    echo "check connection<br>";
                    $cfg =  loadConfig();
                    if($cfg['user']){
                      
                      $connstr = "mongodb://${cfg['user']}:${cfg['password']}@${cfg['host']}:${cfg['port']}/${cfg['database']}";
                    }else{
                      
                      $connstr = "mongodb://${cfg['host']}:${cfg['port']}/${cfg['database']}";
                    }
                     
                    echo $connstr;
                    try{
                      $m = new MongoClient($connstr);  

                      echo "<p>Succes!!</p>";
                      echo "<p>Now lets <a href='setup.php?step=3&host=${cfg["host"]}'>create an admin user</a></p>";
                    }catch(Exception $e){
                      echo $e;
                    }
                    
                  }elseif($_GET['step']=='3'){
                    $cfg =  loadConfig();
                    
                    ?>
                    <form class="pure-form" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                    <p class="form">Username:</p>
                    <p><input type="text" name="user" value="admin"/></p>
                    <p class="form">Passwor:</p>
                    <p><input type="text" name="password" value="admin"/></p> 
                    <p><input type="hidden" name="step" value="4"/> </p>
                    <p><input type="hidden" name="host" value="<?php echo $cfg['host']; ?>"/> </p>
                    <p><input class="pure-button" type="submit" name="submitted" value="Create user" /></p>
                    
                    <?php
                  }elseif($_GET['step']=='4'){
                    $cfg =  loadConfig();
                    $user = filter_var($_GET['user'], FILTER_SANITIZE_STRING);
                    $password = filter_var($_GET['password'], FILTER_SANITIZE_STRING);
                    if($cfg['user']){ 
                      $connstr = "mongodb://${cfg['user']}:${cfg['password']}@${cfg['host']}:${cfg['port']}/${cfg['database']}";
                    }else{
                      $connstr = "mongodb://${cfg['host']}:${cfg['port']}/${cfg['database']}";
                    }
                    try{
                      $m = new MongoClient($connstr);  
                      
                      $db = $m->selectDB($cfg['database']);
                      $col = $db->users;
                      $a = array('user' => $user, 'password' =>md5($password), 'email'=>'', 'name'=>'Admin', 'role'=>'0');
                      $col->insert($a);
                      #####
                      // $col = $db->counters;
                      // $a = array('_id' => 'postid', 'seq' => 0);
                      // $col->insert($a);
                      // #####
                      // $fun = "function getNextId(name) { var ret = db.counters.findAndModify({query: { _id: name }, update: { $inc: { seq: 1 } }, new: true }); return ret.seq;}";
                      // $col = $db->func;
                      // $col->save(array(
                      //           '_id'   => 'getNextId',
                      //           'value' => new MongoCode($fun),
                      //           ));
                      //'_id' => 'getNextId("postid")'
                      #####
                      $col = $db->posts;
                      $a = array('titulo' => "Hello World!", 
                                  'text'=>"## Hello World! \r\n###This is your first post! \r\n\r\nYou can use Markdown in your posts so you can do: \r\n*Italic*, **bold**, `monospace`.  \r\n\r\n##Lists: \r\n\r\n* Like this one \r\n* that one \r\n* the other one \r\n\r\nAnd many other things like quoting. \r\n\r\n> You can find more info about Markdown [here](http://daringfireball.net/projects/markdown/syntax)" ,
                                  'autor' => "0", 
                                  'fecha'=>time());
                      $col->insert($a);
                      $col = $db->info;
                      $a = array('_id' => '1', 'titulo' => "Just A TinyM Blog", 'description' => "A ultra light blogging CMS", 'url'=>'');
                      $col->insert($a);
                      $a = array('_id' => '2', 'email' => "", 'twitter' => "", 'linkedin'=>'', 'github'=>'');
                      $col->insert($a);
                      var_dump($cfg);
                      echo "<p>That's it! <a href='/" . $cfg['path'] . "'>Lets check the Blog!</a></p>";
                    }catch(Exception $e){
                      echo $e;
                    }
                    
                  }

              }else{
                if (class_exists('Mongo')) {
              echo "MongoDB driver for PHP is installed<br>";

              }
              else {
                echo "MongoDB driver for PHP is not installed";
                exit();
              } 
            ?>
                <p>These settings should be ok</p>
                <form class="pure-form" method="get" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <p class="form">MongoDB Server:</p>
                <p><input type="text" name="host" value="localhost"/></p>
                <p class="form">Port:</p>
                <p><input type="text" name="port" value="27017"/></p>
                <p class="form">Database:</p>
                <p><input type="text" name="database" value="TinyM"/></p>
                <p class="form">DB Username:</p>
                <p><input type="text" name="dbuser" value=""/></p>
                <p class="form">DB Password:</p>
                <p><input type="text" name="dbpassword" value=""/></p>
                <p class="form">Blog path:</p>
                <p><input type="text" name="path" value="<?php echo str_replace('setup.php', '',  ltrim($_SERVER['REQUEST_URI'], '/')); ?>"/></p>
                <p><input type="hidden" name="step" value="1"/> </p>

                <p><input class="pure-button" type="submit" name="submitted" value="Save Config" /></p>
                </form>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
    
  </body>
</html>