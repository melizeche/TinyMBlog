<?php
	require("modelo/modelIndex.php");
	
	
	function listarPosts(){
		$cursor = mIndex::getInstance()->getPosts();
		return $cursor;
		
	}
	
	function linkPost($id){
		$cursor = mIndex::getInstance()->getSinglePost($id);
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
