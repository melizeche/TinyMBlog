<!DOCTYPE html>
<?php 
  require_once("../controllers/controllerIndex.php");
  require_once("../controllers/controllerUser.php");
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $this->title; ?></title>
  <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.3.0/pure-min.css">
  <link rel="stylesheet" href="css/FontAwesome/font-awesome.min.css">
  <link rel="stylesheet" href="css/syntax.css">
  <link rel="stylesheet" href="css/blog.css">
</head>
  <body>
    <div class="pure-g-r" id="layout">
      <div class="sidebar pure-u">
        <header class="header">
          <hgroup>
            <h1 class="brand-title"><?php echo $this->title; ?></h1>
            <h2 class="brand-tagline"><?php echo $this->description; ?></h2>
          </hgroup>
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
        <?php }else{  ?>
        <li><a href="login.php">Login</a><li>
        <?php } ?>
      </ul>
</nav>
          <nav class="nav">
            <ul class="nav-list">
              <li class="nav-item">
                <a class="fa fa-envelope fa-3x" href="mailto:"></a>
              </li>
              <li class="nav-item">
                <a class="fa fa-rss-square fa-3x" href="/feed.xml"></a>
              </li>
              <li class="nav-item">
                <a class="fa fa-github fa-3x" href="https://github.com/"></a>
              </li>
              <li class="nav-item">
                <a class="fa fa-twitter fa-3x"  href="https://twitter.com/"></a>
              </li>
              <li class="nav-item">
                <a class="fa fa-linkedin fa-3x" href="http://www.linkedin.com/in/"></a>
              </li>
            </ul>
          </nav>
          
        </header>
      </div>

      <div class="pure-u-1">
        <div class="content">
          <div class="posts">
            <?php echo $this->content; ?>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      var links = document.getElementsByTagName('a');
      for (var i = 0, len = links.length; i < len; i++) {
        var link = links[i];
        if (link.hostname !== window.location.hostname) {
          link.target = "_blank";
          }
      }
    </script>
  </body>
</html>
