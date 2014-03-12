<?php

	class Post {
		function getInstance() {
			static $Post ;
			if (!$Post) $Post = new Post; 
			return $Post;
		}
		
		function newPost($titu,$text,$autor){
			$collec = mIndex::getInstance()->connect("posts");
			$a = array('titulo' => $titu, 'text' =>$text, 'autor'=>$autor, 'fecha'=>time());
			$collec->insert($a);
		}
		
		function deletePost($id){
			$ii = new MongoID( $id );
			$collec = mIndex::getInstance()->connect("posts");
			$collec->remove(array('_id' => $ii));
		}
	}
