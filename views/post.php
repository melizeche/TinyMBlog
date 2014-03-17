<section class="post">
  <header class="post-header">

  <a href="/"><i class="fa fa-arrow-circle-left fa-lg"></i> Back to blog index</a>
<?php


if (array_key_exists('id',$_GET) && !empty($_GET['id'])) {
    
    $id = filter_var($_GET['id'], FILTER_SANITIZE_STRING);
    

    $post= Index::linkPost($id);
    //$post=$posts->getNext();
    $name =  UserInfo::getUser($post["autor"]);
    $html =  \Michelf\MarkdownExtra::defaultTransform($post["text"]);

    echo "<h2 class='post-title'><a href='post.php?id=" . $post['_id'] . "'>". $post["titulo"] . "</a></h2>\n";
    echo "<p class='post-meta'>" . date("F j, Y, g:i a",$post["fecha"]) . "</p>\n";
    echo "<p class='post-meta'>Author:" . $name . "</p>\n" ;
    //echo "<div class='post-description'><p>" . $html . "</p>\n";
    
    ?>
    <script src="vendors/EpicEditor/js/epiceditor.js"></script>

    <script>
    var opts = {
        container: 'epiceditor',
        textarea: "texto",
        basePath: 'vendors/EpicEditor',
        clientSideStorage: false,
        localStorageName: 'epiceditor',
        useNativeFullscreen: true,
        parser: marked,
       

        theme: {
          base: '/themes/base/epiceditor.css',
          preview: '/themes/preview/bootstrap.min.css',
          editor: '/themes/editor/epic-dark.css'
      },
        button: {
        preview: false,
        fullscreen: false,
        bar: "hide"
      },
        autogrow: true
    }
    window.onload = function() {
      var editor = new EpicEditor(opts).load();
      editor.preview();
      //var editor = new EpicEditor(opts2).load();
    }
    </script>
    <textarea style="display:none;" name="texto" id="texto"><?php echo $post["text"]; ?></textarea>
    
<?php
  } else { ?>
  <h1>ERROR 404: No se encuentra el Post</h1>
  
  
  <?php } ?>

    </p>
    <div id="epiceditor"></div>
  </div>

</section>

