<?php
	include("views/header.php");
	$posts=listarPosts(); 
	foreach ($posts as $post) {
			echo "<div><h2><a href='post.php?id=" . $post['_id'] . "'>". $post["titulo"] . "</a></h2></div>\n";
			echo "<p>" . date("F j, Y, g:i a",$post["fecha"]) . "</p>\n";
			echo "<p>" . $post["text"] . "</p>\n";
			echo "<p>Posteado por:" . $post["autor"] . "</p>\n" ;
	}
	include("views/footer.php");
?>

