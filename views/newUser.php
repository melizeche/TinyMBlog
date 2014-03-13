<?php
	
	include("views/auth.php");

	
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['user'])) { 
		#Sanitize input
		$user=filter_var($_POST['user'], FILTER_SANITIZE_STRING);
		$password=filter_var($_POST['password'], FILTER_SANITIZE_STRING);
		$email=filter_var($_POST['email'], FILTER_SANITIZE_STRING);
		$name=filter_var($_POST['name'], FILTER_SANITIZE_STRING);

		User::getInstance()->newUser($user,$password,$email,$name);
		echo "Se agrego el usuario!!";
		
	} else { ?>
		
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
			<p class="form">Nombre:</p>
			<p><input name="name" value="<?php if (isset($name)) { echo $name; } ?>" /></p>
			<p class="form">Username:</p>
			<p><input type="text" name="user" value="<?php if (isset($user)) { echo $user; } ?>" /></p>
			<p class="form">Password:</p>
			<p><input name="password" value="<?php if (isset($password)) { echo $password; } ?>" /></p>
			<p class="form">Email:</p>
			<p><input name="email" value="<?php if (isset($email)) { echo $email; } ?>" /></p>
			<input type="hidden" name="form_token" value="<?php echo $form_token; ?>" />
			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input type="submit" name="submitted" value="Agregar Usuario!" /></p>
		</form>
	
	<?php } 

?>
