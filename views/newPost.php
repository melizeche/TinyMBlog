<?php
	
	
	
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['titulo'])) { 
		$title = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
		$text = filter_var($_POST['texto'], FILTER_SANITIZE_STRING);
		$user = checkSession($_SESSION['user_id'])->getNext();
		Post::getInstance()->newPost($title,$text,$user['_id']);
		echo "Post added!";
		
	} else { ?>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<p class="form">Title:</p>
			<p><input type="text" name="titulo" value="<?php if (isset($titulo)) { echo $titulo; } ?>" /></p>
			<p class="form">Text:</p>
			<p><textarea name="texto" rows="20" cols="40"><?php if (isset($texto)) { echo $texto; } ?></textarea></p>
			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input type="submit" name="submitted" value="Add Post" /></p>
		</form>
	
	<?php } 
	
?>
