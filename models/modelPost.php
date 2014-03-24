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
			$collec = mIndex::getInstance()->connect("posts");
			try{
				$ii = new MongoID( $id );
				$collec->remove(array('_id' => $ii));	
			}catch(Exception $e){
				echo "<p>Post not found :S</p>";
				exit();

			}
			
		}
		function update($id,$titu,$text){
			$collec = mIndex::getInstance()->connect("posts");
			$a = array('_id' => new MongoID ($id));
			$newdata = array('$set' => array("titulo" => $titu , "text" => $text));
			$collec->update($a,$newdata);
		}

	}


