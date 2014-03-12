<?php
	
	include("controllers/controllerInfo.php");
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['titulo'])) { 
		
		//newp::getInstance()->newPost($_POST['titulo'],$_POST['texto'],'admin');
		setInfo($_POST['titulo'],$_POST['url']);
		include("views/header.php");
		echo "Se Modifico el Blog!!";
		
	}else{
		include("views/header.php");
	}
	
	?>
	<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<p class="form">Titulo:</p>
			<p><input type="text" name="titulo" value="<?php echo getTitulo(); ?>" /></p>
			<p class="form">Url:</p>
			<p><input type="text" name="url" value="<?php echo getDir(); ?>" /></p>
			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input type="submit" name="submitted" value="Modificar Blog!" /></p>
		</form>

	<?php

	include("views/footer.php");
?>

