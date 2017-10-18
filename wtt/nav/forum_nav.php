  <script>
    function togglePusher() {
        document.getElementById("content-puscher").classList.toggle("hide");
    }
    </script>
<header role="banner">
<div class="logo"></div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" onclick="togglePusher()" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="/wtt/forum/forum.php">Forum Home</a></li>
        <?php 
        include $_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php';
        foreach ($db->query('SELECT * FROM forum_cats;') as $row) {
            echo '<li><a href="/wtt/forum/forum.php?cat='.$row['idforum_cats'].'">'.$row['cat_name'].'</a></li>';
        }
        ?>
        <li><a href="/wtt/general/info.php">General Info</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>
<div class="hide" id="content-puscher"></div>