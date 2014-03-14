<?php
	require("models/modelIndex.php");
	//require("config.php");
class Index{
	
	function getInstance() {
		static $Index ;
		if (!$Index) $Index = new Index; 
		return $Index;
	}
	
	function listarPosts(){
		$cursor = mIndex::getInstance()->getPosts();
		return $cursor;
		
	}
	
	function linkPost($id){
		$cursor = mIndex::getInstance()->getSinglePost($id);
		

		return $cursor;
		
	}
	
	function  getTitle(){
		$info = mIndex::getInstance()->getInfo();
		return  $info['titulo'];
		
	}
	function getDescription(){
		$info = mIndex::getInstance()->getInfo();
		return  $info['description'];
		
	}
	function getUrl(){
		$info = mIndex::getInstance()->getInfo();
		return  $info['titulo'];
		
	}
}
?>
