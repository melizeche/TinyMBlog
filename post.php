<?php
	include("vista/header.php");
	//require("modelo/modelIndex.php");
	
	if (array_key_exists('id',$_GET) && !empty($_GET['id'])) {
		$id=$_GET['id'];
		//echo "post!! " . $_GET['id'];
		$posts= linkPost($id);
		$post=$posts->getNext();
		echo "<div><h2><a href='post.php?id=" . $post['_id'] . "'>". $post["titulo"] . "</a></h2></div>\n";
		echo "<p>" . date("F j, Y, g:i a",$post["fecha"]) . "</p>\n";
		echo "<p>" . $post["text"] . "</p>\n";
		echo "<p>Posteado por:" . $post["autor"] . "</p>\n" ;

	} else { ?>
	<h1>ERROR 404: No se encuentra el Post</h1>
	
	
	<?php } 
	include("vista/footer.php");
?>
