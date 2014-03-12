<!DOCTYPE html> 
<?php 
	require_once("controllers/controllerIndex.php");
	require_once("controllers/controllerUser.php");
?>
<html> 
	<head> 
		<title><?php echo getTitle(); ?></title> 
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head> 
	<body>
	
<div id="container">
		<div id="header">
			<h1><a id="titulo" href="<?php echo getUrl() ?>" > <?php echo getTitle() ?> </a></h1>
		</div>
<nav id="horizontal">
			<ul>
				<li><a href="index.php">Home</a></li>
				
				
				
				<?php session_start(); if(isAuth($_SESSION['user_id'])) { ?>
				<li><a href="#">Posts</a>
					<ul>
						<li><a href="newPost.php">New post!</a></li>
						<li><a href="delPost.php">Delete post!</a></li>
						<li><a href="editBlog.php">Edit Blog info!</a></li>
					</ul>
				</li>
				<li><a href="logout.php">Logout</a><li>
				<?php }else{	?>
				<li><a href="login.php">Login</a><li>
				<?php } ?>
			</ul>
</nav>
	
		<div id="right-column">
		
			TinyMBlog is a ultra light blogging CMS platform .<br/>
			Last comments
			<br/><br/>
			Important links:
			<br/>
			<a href="http://validator.w3.org/check?uri=referer">Valid XHTML 1.0 Strict!</a><br/>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">Valid CSS</a><br/>
			<br/>
		</div> 
		<div id="content">
