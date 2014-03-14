<?php
	class mInfo {
		function getInstance() {
			static $mInfo ;
			if (!$mInfo) $mInfo = new mInfo; 
			return $mInfo;
		}

	
		function connect($collection){
			global $mon;
			$mon = new MongoClient(ConfigManager::get('connection'));
			$db = $mon->selectDB(ConfigManager::get('database'));
			$col = $db->$collection;
			return $col;
		}
		function getInfo(){ //Recuperamos los Posts
			global $mon;
			$collec = mIndex::connect("info");
			$a = array('_id' => '1');
			$cursor = $collec->findOne($a);
			return $cursor;
			
		}
		function modInfo($titu,$url,$description){
			$collec = mInfo::getInstance()->connect("info");
			$a = array('_id' => '1');
			$newdata = array('$set' => array("titulo" => $titu , "url" => $url, "description" => $description));
			$collec->update($a,$newdata);
		}
	}
?>
