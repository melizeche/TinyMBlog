<?php
	require("modelo/modelIndex.php");
	
	
	function listarPosts(){
		$cursor = mIndex::getInstance()->getPosts();
		return $cursor;
		
	}
	
	function getTitle(){
		$cursor = mIndex::getInstance()->getInfo();
		
		foreach ($cursor as $obj) {
					return $obj['titulo'];
		}
	}
	function getUrl(){
		$cursor = mIndex::getInstance()->getInfo();
		foreach ($cursor as $obj) {
					echo $obj['url'];
		}
	}
?>
