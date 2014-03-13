<?php
	

	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['titulo'])) { 
		
		//newp::getInstance()->newPost($_POST['titulo'],$_POST['texto'],'admin');
		setInfo($_POST['titulo'],$_POST['url'],$_POST['description']);
		echo "Info updated!";
		
	}else{
	}
	
	?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<p class="form">Titulo:</p>
			<p><input type="text" name="titulo" value="<?php echo getTitulo(); ?>" /></p>
			<p class="form">Url:</p>
			<p><input type="text" name="url" value="<?php echo getBlogUrl(); ?>" /></p>
			<p class="form">Blog description:</p>
			<p><input type="text" name="description" value="<?php echo getBlogDescription(); ?>" /></p>

			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input type="submit" name="submitted" value="Save info" /></p>
		</form>

	

