<?php
	include("views/header.php");
	$posts=listarPosts(); 
	
	foreach ($posts as $post) {
			$name =  getUser($post["autor"])['name'];
			
			echo "<div><h2><a href='post.php?id=" . $post['_id'] . "'>". $post["titulo"] . "</a></h2></div>\n";
			echo "<p>" . date("F j, Y, g:i a",$post["fecha"]) . "</p>\n";
			echo "<p>" . substr($post["text"], 0, 350) . "</p>\n";
			echo "<p>Posted by:" . $name . "</p>\n" ;
	}
	include("views/footer.php");
?>

