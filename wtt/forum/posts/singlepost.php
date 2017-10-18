<?php 
    foreach ($db->query('SELECT fp.idforum_post, fp.title, fp.text, fp.cat, fp.user, fp.date, fc.cat_name, l.username, COUNT(pl.idpost_likes) AS likes FROM forum_post fp 
            LEFT JOIN forum_cats fc ON fp.cat=fc.idforum_cats 
            LEFT JOIN login l ON fp.user=l.idlogin 
            LEFT JOIN post_likes pl ON fp.idforum_post=pl.id_post 
            WHERE idforum_post='.$_GET['sart'].' GROUP BY fp.idforum_post ORDER BY date;') as $key) {

        $result = $db->query('SELECT COUNT(idcomments) AS count FROM comments WHERE fk_idpost='.$key['idforum_post'].';');
        $rowt = $result->fetch_assoc();
        $count = $rowt['count'];
?>
<script type="text/javascript">
function back(){
    location.replace(document.referrer);
}
</script>
<div class="mainpost">
    <button class="btn backBtn" onclick="back()">Back</button>
    <div class="title">
        <h2>
            <?php echo $key['title'] ?>
        </h2>
    </div>
    <div class="poster">
        Posted by <?php echo $key['username'].' in '.$key['cat_name'].calcDateDiff($key['date']); ?>
    </div>
    <div class="text">
        <?php echo $key['text'] ?>
    </div>
    <hr>
    <div class="comment">
        <div class="row">
            <?php echo '<a href="/wtt/forum/posts/like.php?art='.$key['idforum_post'].'&site='.$_SERVER['REQUEST_URI'].'">'?>
                <div class="col-md-2">
                    <?php echo $key['likes'] ?> Likes
                </div>
            </a>
            <div class="col-md-2">
                <?php echo $count ?> Comments
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <hr>
<?php foreach ($db->query('SELECT * FROM comments LEFT JOIN login l ON fk_idlogin=l.idlogin WHERE fk_idpost='.$key['idforum_post'].';') as $row) { ?>

        <div class="singlecomment">
            <?php echo $row['comment'] ?>
            <div class="poster">
                Commentet by <?php echo $row['username'].calcDateDiff($row['date']); ?>
            </div>
        </div>

<?php    }    ?>
    </div>
</div>

<?php    }  ?>