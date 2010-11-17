<?php
	include("vista/header.php");
	$posts=listarPosts(); 
	foreach ($posts as $post) {
			echo "<div><h2>" . $post["titulo"] . "</h2></div>\n";
			echo "<p>" . date("F j, Y, g:i a",$post["fecha"]) . "</p>\n";
			echo "<p>" . $post["text"] . "</p>\n";
			echo "<p>Posteado por:" . $post["autor"] . "</p>\n" ;
	}
	include("vista/footer.php");
?>

