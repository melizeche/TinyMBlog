<?php

class View{
	function getInstance() {
		static $View ;
		if (!$View) $View = new View; 
		return $View;
	}

	function post(){
		echo "llegue aca";
		$content = new Template("views/post.php");
		return $content;
	}
}




?>