<?php

	if (array_key_exists('_submit_check',$_POST) ) {
		Post::getInstance()->deletePost($_POST['SelPost']);
		echo "Post deleted!";

	} else { ?>
		<form class="pure-form" method="post" action="delPost" >
		
			<p><select name="SelPost" size="1">
				<?php
					$posts=Index::listarPosts(); 
					foreach ($posts as $post) {
						echo '<option value="' . $post["_id"] . '" label="'.$post["titulo"] . '" >' .  $post["titulo"] . '</option>';
					}
				?>
			</select>
			<input type="hidden" name="_submit_check" value="1"/> 
			<input class="pure-button" type="submit" name="submitted" value="Delete Post" /></p>
		</form>
	<?php } 

	?>
