<?php
	include("vista/header.php");
	require("modelo/modelDel.php");
	
	if (array_key_exists('_submit_check',$_POST) ) {
		 echo "Se Elimino el Post!!!";
		  delp::getInstance()->delPost($_POST['SelPost']);

	} else { ?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		
			<p><select name="SelPost" size="1">
				<?php
					$posts=listarPosts(); 
					foreach ($posts as $post) {
						//echo '<option value="' . $post["_id"] . '" label="'.$post["titulo"] . '" ></option>';
						echo '<option value="' . $post["_id"] . '" label="'.$post["titulo"] . '" >' .  $post["titulo"] . '</option>';
					}
				?>
			</select>
			<input type="hidden" name="_submit_check" value="1"/> 
			<input type="submit" name="submitted" value="Eliminar Post!" /></p>
		</form>
	<?php } 
	include("vista/footer.php");
	?>
