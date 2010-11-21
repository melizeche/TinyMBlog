<?php
	include("vista/header.php");
	require("modelo/modelNew.php");
	
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['titulo'])) { 
		
		newp::getInstance()->newPost($_POST['titulo'],$_POST['texto'],'admin');
		echo "Se agrego tu post!!";
		
	} else { ?>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<p class="form">Titulo:</p>
			<p><input type="text" name="titulo" value="<?php if (isset($titulo)) { echo $titulo; } ?>" /></p>
			<p class="form">Texto:</p>
			<p><textarea name="texto" rows="20" cols="40"><?php if (isset($texto)) { echo $texto; } ?></textarea></p>
			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input type="submit" name="submitted" value="Agregar Post!" /></p>
		</form>
	
	<?php } 
	include("vista/footer.php");
?>
