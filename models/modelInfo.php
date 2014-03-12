<?php
	class mInfo {
		function getInstance() {
			static $mInfo ;
			if (!$mInfo) $mInfo = new mInfo; 
			return $mInfo;
		}
	
		function connect($collection){
			global $mon;
			$mon = new Mongo();
			$db = $mon->selectDB("blog");
			$col = $db->$collection;
			return $col;
		}
		function getInfo(){ //Recuperamos los Posts
			global $mon;
			$collec = mIndex::connect("info");
			$cursor = $collec->find()->limit(1);
			$mon->close();
			return $cursor;
			
		}
		function modInfo($titu,$url){
			$collec = mInfo::getInstance()->connect("info");
			$a = array('_id' => '1');
			$newdata = array('$set' => array("titulo" => $titu , "url" => $url));
			$collec->update($a,$newdata);
		}
	}
?>
