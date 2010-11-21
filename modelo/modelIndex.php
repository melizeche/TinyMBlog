<?php
	class mIndex {
		function getInstance() {
			static $mIndex ;
			if (!$mIndex) $mIndex = new mIndex; 
			return $mIndex;
		}
	
	
		function connect($collection){
			global $mon;
			$mon = new Mongo();
			$db = $mon->selectDB("blog");
			$col = $db->$collection;
			return $col;
		}
		function getPosts(){ //Recuperamos los Posts
			global $mon;
			$collec = mIndex::connect("posts");
			$cursor = $collec->find()->sort(array('fecha'=>-1));
			
			$mon->close();
			return $cursor;
		}
		function getSinglePost($id){ //Recuperamos 1 Post
			global $mon;
			$collec = mIndex::connect("posts");
			$query=  array('_id' => new MongoID ($id));
			$cursor = $collec->find($query);
			
			$mon->close();
			return $cursor;
		}
		
		function getInfo(){// Recuperamos la informacion del blog
			global $mon;
			$collec=mIndex::getInstance()->connect("info");
			$cursor = $collec->find()->limit(1);
			$mon->close();
			return $cursor;
		}
	}
?>
