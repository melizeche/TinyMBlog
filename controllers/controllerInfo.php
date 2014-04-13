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

	function getLinks(){
		$links = mInfo::getInstance()->getLinks();
		return $links;
		
	}

	function setInfo($titulo,$url,$description){
		
		 mInfo::getInstance()->modInfo($titulo,$url,$description);
		
	}
	function setLinks($email,$twitter,$linkedin,$github){
		echo "1";
		 mInfo::getInstance()->setLinks($email,$twitter,$linkedin,$github);
		
	}
}
?>
