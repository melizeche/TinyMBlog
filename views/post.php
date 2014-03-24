<script src="../vendors/EpicEditor/js/epiceditor.js"></script>
<section class="post">
  <header class="post-header">
  <a href="/"><i class="fa fa-arrow-circle-left fa-lg"></i> Back to blog index</a>
  <?php
    if ($this->post){
      echo "<h2 class='post-title'><a href='" . $this->post['_id'] . "'>". $this->post["titulo"] . "</a></h2>\n";
      echo "<p class='post-meta'>" . date("F j, Y, g:i a",$this->post["fecha"]) . "</p>\n";
      echo "<p class='post-meta'>Author:" . $this->name . "</p>\n" ;    
  ?>
  <script>
    var opts = {
        container: 'epiceditor',
        textarea: "texto",
        basePath: '../vendors/EpicEditor',
        clientSideStorage: false,
        localStorageName: 'epiceditor',
        useNativeFullscreen: true,
        parser: marked,
        theme: {
          preview: '/themes/preview/bootstrap.min.css',
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
    }
  </script>
    <textarea style="display:none;" name="texto" id="texto"><?php echo $this->post["text"]; ?></textarea>
    <div id="epiceditor"></div>
    <?php 
      if(isset($_SESSION['user_id']) && UserInfo::isAuth($_SESSION['user_id'])) { 
        echo "<p><a href='../editPost/". $this->id . "'>Edit Post</a></p>";
      }
      }else{ ?>
    <h1>ERROR 404: Post not found :(</h1>
    </p>
    <?php } ?>
  </div>
</section>
