<?php

	class mIndex {
		

		function getInstance() {
			static $mIndex ;
			if (!$mIndex) $mIndex = new mIndex; 
			return $mIndex;
		}
	
	
		function connect($collection){
			global $mon;
			//print var_dump();
			//echo ConfigManager::get('connection');
			//echo "  - " . var_dump(ConfigManager::get('database'));
			try{
				$mon = new MongoClient(ConfigManager::get('connection'));
				$db = $mon->selectDB(ConfigManager::get('database'));
				$col = $db->$collection;

				return $col;
			}catch(Exception $e){
                echo $e->getMessage();
            }
			
		}
		function getPosts(){ //Recuperamos los Posts
			global $mon;
			$collec = mIndex::connect("posts");
			$cursor = $collec->find()->sort(array('fecha'=>-1));
			
			return $cursor;
		}
		function getSinglePost($id){ //Recuperamos 1 Post
			global $mon;
			$collec = mIndex::connect("posts");
			$query=  array('_id' => new MongoID ($id));
			$cursor = $collec->find($query);
			
			
			return $cursor;
		}
		
		function getInfo(){// Recuperamos la informacion del blog
			global $mon;
			$collec=mIndex::getInstance()->connect("info");
			$a = array('_id' => '1');
			$cursor = $collec->findOne($a);
			return $cursor;
		}
	}
?>
