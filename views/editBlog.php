<?php
	echo $this->auth;
	
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['titulo'])) { 
//		echo "2";
		//newp::getInstance()->newPost($_POST['titulo'],$_POST['texto'],'admin');
		Info::setInfo($_POST['titulo'],$_POST['url'],$_POST['description']);
		Info::setLinks($_POST['email'],$_POST['twitter'],$_POST['linkedin'],$_POST['github']);
		echo "Info updated!";
		echo "<script>location.reload(true);</script>";
		
	}else{
		//$tit = new Info;
	}
	$links = Info::getLinks();
	?>

	<form class="pure-form" class="pure-form" method="post" action="editBlog">
			<p class="form">Name of the Blog:</p>
			<p><input type="text" name="titulo" value="<?php echo Info::getTitulo(); ?>" /></p>
			<p class="form">Url:</p>
			<p><input type="text" name="url" value="<?php echo Info::getBlogUrl(); ?>" /></p>
			<p class="form">Blog description:</p>
			<p><input type="text" name="description" value="<?php echo Info::getBlogDescription(); ?>" /></p>
			<p class="form">Email:</p>
			<p><input type="text" name="email" placeholder="" value="<?php echo $links['email']; ?>" /></p>
			<p class="form">Twitter:</p>
			<p><input type="text" name="twitter" placeholder="Twitter username" value="<?php echo $links['twitter']; ?>" /></p>
			<p class="form">Linked In:</p>
			<p><input type="text" name="linkedin" placeholder="Linkedin username" value="<?php echo $links['linkedin']; ?>" /></p>
			<p class="form">Github:</p>
			<p><input type="text" name="github" placeholder="Github username" value="<?php echo $links['github']; ?>" /></p>
			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input class="pure-button" type="submit" name="submitted" value="Save info" /></p>
		</form>

	

