<?php
	foreach ($db->query('SELECT fp.idforum_post, fp.title, fp.text, fp.cat, fp.user, fp.date, fc.cat_name, l.username, COUNT(pl.idpost_likes) AS likes FROM forum_post fp 
        LEFT JOIN forum_cats fc ON fp.cat=fc.idforum_cats 
        LEFT JOIN login l ON fp.user=l.idlogin 
        LEFT JOIN post_likes pl ON fp.idforum_post=pl.id_post WHERE user='.$login_session.' GROUP BY fp.idforum_post ORDER BY date;') as $key) {
        $result = $db->query('SELECT COUNT(idcomments) AS count FROM comments WHERE fk_idpost='.$key['idforum_post'].';');
        $rowt = $result->fetch_assoc();
        $count = $rowt['count'];
?>
<?php echo '<a href="/wtt/forum/forum.php?sart='.$key['idforum_post'].'">' ?>
    <div class="mainpost">
        <div class="title">
            <h2><?php echo $key['title']?></h2>
        </div>
        <div class="poster">
            Posted by <?php echo $key['username'].' in '.$key['cat_name']?>
            <?php calcDateDiff($key['date']); ?>
        </div>
        <div class="text">
            <?php echo $key['text']?>
        </div>

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
                        <?php echo $count ?> Comments
                    </div>
                </a>
                <div class="col-md-2">

                </div>
            </div>
        </div>
    </div>
</a>
<?php
}
?>