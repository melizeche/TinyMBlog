<?php

class ConfigManager {

	protected static $config;

    public function loadConfig() {
    	
    	$cfg = require 'config.php';
    	 if($cfg['user']){
            $connstr = "mongodb://${cfg['user']}:${cfg['password']}@${cfg['host']}:${cfg['port']}/${cfg['database']}";
        }else{
            $connstr = "mongodb://${cfg['host']}:${cfg['port']}/${cfg['database']}";
        }
        $cfg['connection'] = $connstr;
        ConfigManager::set($cfg);

        mIndex::connect('users')->ensureIndex(['user' => 1], ['unique' => true, 'background' => true]);

    	return $cfg;
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