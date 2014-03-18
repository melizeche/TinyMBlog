<?php

class View{
	
	function getInstance() {
		static $View ;
		if (!$View) $View = new View; 
		return $View;
	}

	function index($request){
		return $content = new Template("views/posts.php");
	}

	function login($request){
		$content = new Template("views/login.php");
		return $content;
	}

	function logout($request){
		session_start();
		$_SESSION = array();
		if(session_destroy()){
			return $content = "Log out <br> <script>location.assign('/')</script>";
		}
	}

	function post($request){
		$content = new Template("views/post.php");
		if (array_key_exists('0',$request)){
			$content->id = $request[0];
			$content->post= Index::linkPost($content->id);
    		$content->name =  UserInfo::getUser($content->post["autor"])['name'];
	    		//print_r($content);
		}else{
			$content->post = false;
		}
		return $content;
	}
	
}




?>