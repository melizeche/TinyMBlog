<?php

	class User {
		function getInstance() {
			static $User ;
			if (!$User) $User = new User; 
			return $User;
		}
		
		function newUser($user,$password,$email,$name){
			$collec = mIndex::getInstance()->connect("users");
			$a = array('user' => $user, 'password' =>md5($password), 'email'=>$email, 'name'=>$name);
			$collec->insert($a);
		}


		function deleteUser($id){
			$ii = new MongoID( $id );
			$collec = mIndex::getInstance()->connect("users");
			$collec->remove(array('_id' => $ii));
		}
	}