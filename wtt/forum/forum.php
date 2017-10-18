<!DOCTYPE html>
<html>
<head>
    <title>Info</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/wtt/css/link.php' ?>
    
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/wtt/nav/user_nav.php';
include $_SERVER['DOCUMENT_ROOT'].'/wtt/nav/forum_nav.php';
include $_SERVER['DOCUMENT_ROOT'].'/wtt/functions/calcDiff.php';
    
?>
    <div class="container">
        <div class="content">
            <div class="post">
            <?php
            	if (isset($_GET['sart'])) {
            		include $_SERVER['DOCUMENT_ROOT'].'/wtt/forum/posts/singlepost.php';
            	}else{
            		include $_SERVER['DOCUMENT_ROOT'].'/wtt/forum/posts/allposts.php';
            	}
            ?>
            
        </div>
    </div>
</body>
</html>
