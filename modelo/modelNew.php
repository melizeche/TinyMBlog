<?php

	class newp {
		function getInstance() {
			static $newp ;
			if (!$newp) $newp = new newp; 
			return $newp;
		}
		
		function newPost($titu,$text,$autor){
			$collec = mIndex::getInstance()->connect("posts");
			$a = array('titulo' => $titu, 'text' =>$text, 'autor'=>$autor, 'fecha'=>time());
			$collec->insert($a);
		}
	}
