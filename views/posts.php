<?php

$posts=Index::listarPosts(); 
foreach ($posts as $post) {

?>
  <section class="post">
    <header class="post-header">


      <a href='<?php echo "post.php?id=" . $post["_id"]  ?>' ><h2 class="post-title"><?php echo $post["titulo"]; ?></h2></a>
      <p class="post-short"><?php  echo substr($post["text"], 0, 300); if(strlen($post["text"])>300) echo "...<b>(cont)</b>"; ?></p>
      <p class="post-meta"><?php  echo date("F j, Y, g:i a",$post["fecha"]) ?></p>
    </header>
  </section>

<?php
}
?>	
