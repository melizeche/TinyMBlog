<?php

	if (array_key_exists('_submit_check',$_POST) ) {
		Post::getInstance()->deletePost($_POST['SelPost']);
		echo "Post deleted!";

	} else { ?>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
		
			<p><select name="SelPost" size="1">
				<?php
					$posts=listarPosts(); 
					foreach ($posts as $post) {
						echo '<option value="' . $post["_id"] . '" label="'.$post["titulo"] . '" >' .  $post["titulo"] . '</option>';
					}
				?>
			</select>
			<input type="hidden" name="_submit_check" value="1"/> 
			<input type="submit" name="submitted" value="Delete Post" /></p>
		</form>
	<?php } 

	?>
