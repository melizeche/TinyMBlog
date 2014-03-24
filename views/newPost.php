<?php
	echo $this->auth;
	
	
	if (array_key_exists('_submit_check',$_POST) && !empty($_POST['titulo'])) { 
		$title = filter_var($_POST['titulo'], FILTER_SANITIZE_STRING);
		$text = filter_var($_POST['texto'], FILTER_SANITIZE_STRING);//$_POST['texto'];//
		$user = UserInfo::checkSession($_SESSION['user_id'])->getNext();
		Post::getInstance()->newPost($title,$text,$user['_id']);
		echo "Post added!";
		
	} else { ?>
	<script src="vendors/EpicEditor/js/epiceditor.js"></script>

		<script>
		var opts = {
			  container: 'epiceditor',
			  textarea: 'texto',
			  basePath: 'vendors/EpicEditor',
			  clientSideStorage: false,
			  localStorageName: 'epiceditor',
			  useNativeFullscreen: true,
			  parser: marked,
			 

			  theme: {
			    base: '/themes/base/epiceditor.css',
			    preview: '/themes/preview/bartik.css',
			    editor: '/themes/editor/epic-dark.css'
			},
			  autogrow: false
		}
		window.onload = function() {
			var editor = new EpicEditor(opts).load();
			//var editor = new EpicEditor(opts2).load();
		}
		</script>
				
				

		<form class="pure-form" class="pure-form" method="post" action="newPost">
			<p class="form">Post Title:</p>
			<p><input style="width:100%;" type="text" name="titulo" value="<?php if (isset($titulo)) { echo $titulo; } ?>" /></p>
			<p class="form">Text:</p>
			<div id="epiceditor" style="height: 350px;"></div>
			<p><textarea style="display:none;" name="texto" id="texto" rows="20" cols="40"><?php if (isset($texto)) { echo $texto; } ?></textarea></p>
			<p><input type="hidden" name="_submit_check" value="1"/> </p>
			<p><input class="pure-button" type="submit" name="submitted" value="Add Post" /></p>
		</form>
		
<p>Markdown Syntax <a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='block';document.getElementById('fade').style.display='block'">Cheat Sheet</a></p>
    <div id="light" class="white_content">
    	<div><section class="markdown-help-container">
    		<a href = "javascript:void(0)" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'">Close</a>
    <table class="modal-markdown-help-table">

        <thead>
            <tr>

                <th>Result</th>
                <th>Markdown</th>
          
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><strong>Bold</strong></td>
                <td>**text**</td>
                
            </tr>
            <tr>
                <td><em>Emphasize</em></td>
                <td>*text*</td>
                
            </tr>
            <tr>
                <td><code>Inline Code</code></td>
                <td>`code`</td>
                
            </tr>
            <tr>
                <td>Strike-through</td>
                <td>~~text~~</td>

            </tr>
            <tr>
                <td><a href="#">Link</a></td>
                <td>[title](http://)</td>

            </tr>
            <tr>
                <td>Image</td>
                <td>![alt](http://)</td>

            </tr>
            <tr>
                <td>List</td>
                <td>* item</td>
                
            </tr>
            <tr>
                <td>Blockquote</td>
                <td>&gt; quote</td>
                
            </tr>
            <tr>
                <td>H1</td>
                <td># Heading</td>

            </tr>
            <tr>
                <td>H2</td>
                <td>## Heading</td>

            </tr>
            <tr>
                <td>H3</td>
                <td>### Heading</td>

            </tr>
            <tr>
                <td>H4</td>
                <td>#### Heading</td>

            </tr>
            <tr>
                <td>H5</td>
                <td>##### Heading</td>

            </tr>
            <tr>
                <td>H6</td>
                <td>###### Heading</td>

            </tr>


            </tr>
        </tbody>
    </table>
    For further syntax reference: <a href="http://daringfireball.net/projects/markdown/syntax" target="_blank">Markdown Documentation</a>
</section>
</div> </div>
    <div id="fade" class="black_overlay" onclick = "document.getElementById('light').style.display='none';document.getElementById('fade').style.display='none'"></div>


	<?php } 
	
?>
