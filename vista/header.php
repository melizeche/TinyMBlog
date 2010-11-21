<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<?php include("controlador/controllerIndex.php"); ?>
<html lang="en" xml:lang="es"  xmlns="http://www.w3.org/1999/xhtml"> 
	<head> 
		<title><?php echo getTitle(); ?></title> 
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head> 
	<body>
	
<div id="container">
		<div id="header">
			<h1><a id="titulo" href="<?php echo getUrl().'">'. getTitle() ?> </a></h1>
		</div>
		<div id="horizontal">
			<a href="index.php">Home</a>' 
			<a href="#">Login</a>
			<a href="newPost.php">Agregar un Post!</a>
			<a href="delPost.php">Eliminar un Post!</a>
			<a href="editBlog.php">Editar Informacion del Blog!</a>
		</div>
		<div id="right-column">
		
			TinyMBlog es un CMS para hacer un blog simple y liviano.<br/>
			Ultimos Comentarios
			<br/><br/>
			Important links:
			<br/>
			<a href="http://validator.w3.org/check?uri=referer">Valid XHTML 1.0 Strict!</a><br/>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">Valid CSS</a><br/>
			<br/>
		</div> 
		<div id="content">
