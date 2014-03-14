<?php
	require("models/modelInfo.php");

class Info {
	function getInstance() {
		static $Info ;
		if (!$Info) $Info = new Info; 
		return $Info;
	}

	function getTitulo(){
		$info = mInfo::getInstance()->getInfo();
		return $info['titulo'];
		
	}
	
	function getBlogUrl(){
		$info = mInfo::getInstance()->getInfo();
		return $info['url'];
		
	}
	function getBlogDescription(){
		$info = mInfo::getInstance()->getInfo();
		return $info['description'];
		
	}
	function setInfo($titulo,$url,$description){
		
		 mInfo::getInstance()->modInfo($titulo,$url,$description);
		
	}
}
?>
