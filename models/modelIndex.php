<?php

	class mIndex {
		

		function getInstance() {
			static $mIndex ;
			if (!$mIndex) $mIndex = new mIndex; 
			return $mIndex;
		}
	
	
		function connect($collection){
			static $mon;
			static $db;

			//print var_dump();
			//echo ConfigManager::get('connection');
			//echo "  - " . var_dump(ConfigManager::get('database'));
			try{
				if (!$mon) {
					$mon = new MongoClient(ConfigManager::get('connection'));
					$db = $mon->selectDB(ConfigManager::get('database'));
				}
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
			try{
				$query=  array('_id' => new MongoID ($id));
				$cursor = $collec->findOne($query);
			}catch(Exception $e){
                echo "<p>Post not found :(";
                return false;
            }
			
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
