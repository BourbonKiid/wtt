<?php
    $filter="";
    if (isset($_GET['cat'])) {
        if ($_GET['cat']!=0) {
            $filter="WHERE cat=".$_GET['cat']." ";
        }
    }
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
        $results_per_page = 20;
        $start_from = ($page-1) * $results_per_page;

        $result = $db->query("SELECT COUNT(idforum_post) AS total FROM forum_post ".$filter."");
        $rowt = $result->fetch_assoc();
        $total_pages = ceil($rowt["total"] / $results_per_page);

    foreach ($db->query('SELECT fp.idforum_post, fp.title, fp.text, fp.cat, fp.user, fp.date, fc.cat_name, l.username, COUNT(pl.idpost_likes) AS likes 
        FROM forum_post fp 
        LEFT JOIN forum_cats fc ON fp.cat=fc.idforum_cats 
        LEFT JOIN login l ON fp.user=l.idlogin 
        LEFT JOIN post_likes pl ON fp.idforum_post=pl.id_post
        '.$filter.'GROUP BY fp.idforum_post ORDER BY date DESC LIMIT '.$start_from.','.$results_per_page.' ;') as $key) {
        $result = $db->query('SELECT COUNT(idcomments) AS count FROM comments WHERE fk_idpost='.$key['idforum_post'].';');
        $rowt = $result->fetch_assoc();
        $count = $rowt['count'];
?>
<?php echo '<a href="/wtt/forum/forum.php?sart='.$key['idforum_post'].'">' ?>
    <?php echo '<div id="'.$key['idforum_post'].'" class="mainpost">' ?>
        <div class="title">
            <h2><?php echo $key['title'] ?></h2>
        </div>
        <div class="poster">
            Posted by <?php echo $key['username'].' in '.$key['cat_name']. calcDateDiff($key['date']); ?>
        </div>
        <div class="text">
            <?php echo $key['text'] ?>
        </div>
    </a>
    <hr>
        <div class="comment">
            <div class="row">
                <?php echo '<a href="/wtt/forum/posts/like.php?art='.$key['idforum_post'].'&site='.$_SERVER['PHP_SELF'].'">' ?>
                    <div class="col-md-2">
                        <?php echo $key['likes'] ?> Likes
                    </div>
                </a>
                <?php echo '<a href="/wtt/forum/forum.php?sart='.$key['idforum_post'].'">' ?>
                    <div class="col-md-2">
                        <?php echo $count ?> comments
                    </div>
                </a>
                <div class="col-md-2">
                    
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    
    echo '</div>';
    echo '<div class="page_space">';
    echo '<div class="pagenumbers">';
    if ($page <= 2) {
        $first = 1;
        $last = 5;
    }else if ($page >= $total_pages - 2) {
        $last = $total_pages;
        $first = $total_pages - 4;
    }else{
        $last = $page+2;
        $first = $page-2;
    }
    if (isset($_GET["cat"])) {
       echo '<a href="'.$_SERVER['PHP_SELF'].'?cat='.$_GET["cat"].'&page=1"><div class="pages first">Page 1</div></a> ';
    }else{
        echo '<a href="'.$_SERVER['PHP_SELF'].'?page=1"><div class="pages first">Page 1</div></a> ';
    }
    for ($i=1; $i<=$total_pages; $i++) { 
        if ($i >= $first && $i <= $last) {
            if ($i == $page) {
                if (isset($_GET["cat"])) {
                   echo '<a href="'.$_SERVER['PHP_SELF'].'?cat='.$_GET["cat"].'&page='.$i.'"><div class="pages active">'.$i.'</div></a> ';
                }else{
                    echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'"><div class="pages active">'.$i.'</div></a> ';
                }
            }else{
                if (isset($_GET["cat"])) {
                    echo '<a href="'.$_SERVER['PHP_SELF'].'?cat='.$_GET["cat"].'&page='.$i.'"><div class="pages">'.$i.'</div></a> ';
                }else{
                    echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$i.'"><div class="pages">'.$i.'</div></a> '; 
                }
            }
        }
    };
    if (isset($_GET["cat"])) {
        echo '<a href="'.$_SERVER['PHP_SELF'].'?cat='.$_GET["cat"].'&page='.$total_pages.'"><div class="pages first">Page '.$total_pages.'</div></a> ';
    }else{
        echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$total_pages.'"><div class="pages first">Page '.$total_pages.'</div></a> ';
    }
            
?>