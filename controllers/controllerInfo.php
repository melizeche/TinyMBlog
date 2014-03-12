<?php
	require("models/modelInfo.php");
	
	function getTitulo(){
		$cursor = mInfo::getInstance()->getInfo();
		$titulo = $cursor->getNext();
		return $titulo['titulo'];
		
	}
	
	function getDir(){
		$cursor = mInfo::getInstance()->getInfo();
		$titulo = $cursor->getNext();
		return $titulo['url'];
		
	}
	function setInfo($titulo,$url){
		
		 mInfo::getInstance()->modInfo($titulo,$url);
		
	}
?>
