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
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
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
                          $newdata = array("host" =>  $host, "port" => $port, "database" => $database, "user" =>$user, "password"=>$password);
                          writeConfig($newdata);
                          echo "config.php OK";
                          echo "<p><a href='setup.php?step=2&host=$host'> Check DB Connection</a></p>";
                          
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
                      $a = array('_id' => '0','user' => $user, 'password' =>md5($password), 'email'=>'', 'name'=>'Admin', 'role'=>'0');
                      $col->insert($a);
                      $col = $db->posts;
                      $a = array('titulo' => "Hello World!", 'text'=>"Your first post!" ,'autor' => "0", 'fecha'=>time());
                      $col->insert($a);
                      $col = $db->info;
                      $a = array('titulo' => "Just A TinyMBlog", 'description' => "A ultra light blogging CMS", 'url'=>'#');
                      $col->insert($a);

                      echo "<p>That's it! <a href='index.php'>Lets check the Blog!</a></p>";
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
                <p><input type="text" name="database" value="blog"/></p>
                <p class="form">DB Username:</p>
                <p><input type="text" name="dbuser" value=""/></p>
                <p class="form">DB Password:</p>
                <p><input type="text" name="dbpassword" value=""/></p>
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
