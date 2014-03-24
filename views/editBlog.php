<?php
	echo $this->auth;
	
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['titulo'])) { 
//		echo "2";
		//newp::getInstance()->newPost($_POST['titulo'],$_POST['texto'],'admin');
		Info::setInfo($_POST['titulo'],$_POST['url'],$_POST['description']);
		echo "Info updated!";
		echo "<script>location.reload(true);</script>";
		
	}else{
		//$tit = new Info;
	}
	
	?>
	<form class="pure-form" class="pure-form" method="post" action="editBlog">
			<p class="form">Titulo:</p>
			<p><input type="text" name="titulo" value="<?php echo Info::getTitulo(); ?>" /></p>
			<p class="form">Url:</p>
			<p><input type="text" name="url" value="<?php echo Info::getBlogUrl(); ?>" /></p>
			<p class="form">Blog description:</p>
			<p><input type="text" name="description" value="<?php echo Info::getBlogDescription(); ?>" /></p>

			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input class="pure-button" type="submit" name="submitted" value="Save info" /></p>
		</form>

	

