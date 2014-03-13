<?php
	require("models/modelInfo.php");
	
	function getTitulo(){
		$cursor = mInfo::getInstance()->getInfo();
		$titulo = $cursor->getNext();
		return $titulo['titulo'];
		
	}
	
	function getBlogUrl(){
		$cursor = mInfo::getInstance()->getInfo();
		$titulo = $cursor->getNext();
		return $titulo['url'];
		
	}
	function getBlogDescription(){
		$cursor = mInfo::getInstance()->getInfo();
		$titulo = $cursor->getNext();
		return $titulo['description'];
		
	}
	function setInfo($titulo,$url,$description){
		
		 mInfo::getInstance()->modInfo($titulo,$url,$description);
		
	}
?>
