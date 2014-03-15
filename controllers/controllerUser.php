<?php
	require("models/modelUser.php");
	
class UserInfo{
	function getInstance() {
		static $Info ;
		if (!$Info) $Info = new Info; 
		return $Info;
	}

	function checkUser($user,$password){ //Recuperamos 1 Post
			global $mon;
			$collec = mIndex::connect("users");
			$query =  array('user' => $user, 'password' => $password);
			$cursor = $collec->find($query);
			return $cursor;
	}
	function checkSession($id){ //Recuperamos 1 Post
			global $mon;
			$collec = mIndex::connect("users");
			$query =  array('_id' => $id);
			$cursor = $collec->find($query);
			return $cursor;
	}

	function getUser($id){
			
			$collec = mIndex::connect("users");
			$query =  array('_id' => $id);
			$cursor = $collec->findOne($query);
			
			return $cursor;	
	}

	function isAuth($id){
		if (empty($_SESSION['user_id'])) {
			return false;
		}

 		$ses = UserInfo::checkSession($_SESSION['user_id'])->getNext();
        $user = $ses['user'];
        if(empty($user)) {
            return false;
        }
        
        return true;
	}
}		
	
?>
