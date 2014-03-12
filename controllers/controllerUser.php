<?php
	require("models/modelUser.php");
	
	
	function checkUser($user,$password){ //Recuperamos 1 Post
			global $mon;
			$collec = mIndex::connect("users");
			$query =  array('user' => $user, 'password' => $password);
			$cursor = $collec->find($query);
			$mon->close();
			return $cursor;
	}
	function checkSession($id){ //Recuperamos 1 Post
			global $mon;
			$collec = mIndex::connect("users");
			$query =  array('_id' => $id);
			$cursor = $collec->find($query);
			$mon->close();
			return $cursor;
	}

	function isAuth($id){
		
		$ses = checkSession($id)->getNext();
        $user = $ses['user'];
        if($user == false)
        {
            return false;
        }
        else
        {
            return true;
        }
	}
	
	
?>
