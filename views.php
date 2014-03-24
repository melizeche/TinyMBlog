<?php

class View{

	
	function getInstance() {
		static $View ;
		if (!$View) $View = new View; 
		return $View;
	}

	function delPost($request){
		$content = new Template("views/delPost.php");
		$content->auth = new Template("views/auth.php");
		print_r($request);
		return $content;
	}
	function editBlog($request){
		$content = new Template("views/editBlog.php");
		$content->auth = new Template("views/auth.php");
		print_r($request);
		return $content;
	}
	function editPost($request){
		$content = new Template("views/editPost.php");
		$content->auth = new Template("views/auth.php");
		print_r($request);
		if (array_key_exists('0',$request)){
			$content->id = $request[0];
			$content->post= Index::linkPost($content->id);
	    	//print_r($content);
		}else{
			$content->post = false;
		}
		return $content;
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

	function newPost($request){
		$content = new Template("views/newPost.php");
		$content->auth = new Template("views/auth.php");
		print_r($request);
		return $content;
	}
	function newUser($request){
		$content = new Template("views/newUser.php");
		$content->auth = new Template("views/auth.php");

		print_r($request);
		return $content;
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