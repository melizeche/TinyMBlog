<?php


	/*** begin our session ***/

	//session_start();

	/*** check if the users is already logged in ***/
	if(isset( $_SESSION['user_id'] ))
	{
	    $message = 'User is already logged in';
	}
	/*** check that both the username, password have been submitted ***/
	if(!isset( $_POST['user'], $_POST['password']))
	{
	    $message = 'Please enter a valid username and password';
	}
	/*** check the password is the correct length ***/
	elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
	{
	    $message = 'Incorrect Length for Password';
	}
	/*** check the username has only alpha numeric characters ***/
	elseif (ctype_alnum($_POST['user']) != true)
	{
	    /*** if there is no match ***/
	    $message = "Username must be alpha numeric";
	}
	/*** check the password has only alpha numeric characters ***/
	elseif (ctype_alnum($_POST['password']) != true)
	{
	        /*** if there is no match ***/
	        $message = "Password must be alpha numeric";
	}
	else
	{
	    /*** if we are here the data is valid and we can insert it into database ***/
	    $user = filter_var($_POST['user'], FILTER_SANITIZE_STRING);
	    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
	    /*** now we can encrypt the password ***/
	    $password = md5($password);
		try
    	{
		    $log = UserInfo::checkUser($user, $password)->getNext();
		   # $login=$log->getNext();
		    if($log == false)
	        {
	                $message = 'Login Failed';
	        }else{

		    	$_SESSION['user_id'] = $log['_id'];

	                /*** tell the user we are logged in ***/
	                $message = 'You are now logged in';
		    
		    }
		}
		catch(Exception $e)
		{
			 /*** if we are here, something has gone wrong with the database ***/
        	$message = 'We are unable to process your request. Please try again later"';
		}
	}
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['user'])) { 
		
		echo $message;
		echo "<script>location.assign('/')</script>";
	}else{
?>
<form class="pure-form" class="pure-form" action="login.php" method="post"> 
	<fieldset> 
		<p> <label for="user">Username</label> 
			<input type="text" id="user" name="user" value="" maxlength="20" /> </p> 
		<p> <label for="password">Password</label> <input type="password" id="password" name="password" value="" maxlength="20" /> </p>
		<p><input type="hidden" name="_submit_check" value="1"/> </p>
		<p> <input class="pure-button" type="submit" value="Login" /> </p> 
	</fieldset> 
</form> 

<?php } 

?>