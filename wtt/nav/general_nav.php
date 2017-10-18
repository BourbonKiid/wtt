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
        <?php 
        include $_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php';
            foreach ($db->query('SELECT site_name, idsites, has_sub_sites FROM sites ;') as $row) {
                if ($row['has_sub_sites'] != 0) {
                    echo '<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">'.$row['site_name'].'
                    <span class="caret"></span></a>
                        <ul class="dropdown-menu">';
                            foreach ($db->query('SELECT idsubsite, sub_name FROM subsites WHERE parent='.$row['idsites'].' ;') as $ss) {
                                echo '<li><a href="info.php?subsite='.$ss['idsubsite'].'">'.$ss['sub_name'].'</a></li>';
                            }
                    echo '    </ul>
                    </li>';
                }else{
                    echo '<li><a href="info.php?site='.$row['idsites'].'">'.$row['site_name'].'</a></li>';
                }
            }
        ?>
        <li><a href="/wtt/forum/forum.php">Forum</a></li>
      </ul>
    </div>
  </div>
</nav>
</header>
<div class="hide" id="content-puscher"></div>