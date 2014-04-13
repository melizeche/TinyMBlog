<?php

class ConfigManager {

	protected static $config;

    public function loadConfig() {
    	
    	 $cfg = include 'config.php';
       if(!$cfg){
        $view = new Template("views/pure.php"); 
        $view->content = "<h1>config.php not found, please run <a href='setup.php'>Setup</a></h1>";
        echo '<link rel="stylesheet" href="../css/pure-min.css"><h1>config.php not found, please run <a href="setup.php">Setup</a></h1>';
        exit;
       }
     
      if($cfg){
    	 if($cfg['user']){
            $connstr = "mongodb://${cfg['user']}:${cfg['password']}@${cfg['host']}:${cfg['port']}/${cfg['database']}";
        }else{
            $connstr = "mongodb://${cfg['host']}:${cfg['port']}/${cfg['database']}";
        }
        $cfg['connection'] = $connstr;
        ConfigManager::set($cfg);

        mIndex::connect('users')->ensureIndex(['user' => 1], ['unique' => true, 'background' => true]);

    	return $cfg;
    }else{
      return false;
    }
	}
 
   public static function set($key, $value = NULL) 
   {
      if (is_array($key)) {
         self::$config = array_merge(self::$config, $key);
      } else {
         // single value
         self::$config[$key] = $value;
      }
   }
  
   public static function get($key)
   {
       if (array_key_exists($key, self::$config)) {
          return self::$config[$key]; 
       }
       return NULL;
   }
        
}