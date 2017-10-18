<!DOCTYPE html>
<html>
<head>
    <title>Info</title>
    <?php include $_SERVER['DOCUMENT_ROOT'].'/wtt/css/link.php' ?>
</head>
<body>

<?php
include $_SERVER['DOCUMENT_ROOT'].'/wtt/nav/user_nav.php';
include $_SERVER['DOCUMENT_ROOT'].'/wtt/nav/general_nav.php';
    if (isset($_GET['site'])) {
        $result = $db->query('SELECT * FROM article_info WHERE site='.$_GET['site'].';');
    }else{
        if (isset($_GET['subsite'])) {
            $result = $db->query('SELECT * FROM article_info WHERE sub='.$_GET['subsite'].';');
        }else{
            $result = $db->query('SELECT * FROM article_info WHERE site=1;');
        }
    }
    $row = $result->fetch_assoc();
    $title=$row['title'];
    $text=$row['text'];
?>
    <div class="container">
        <div class="content">
            <div class="post">
                <div class="title"><h2><?php echo $title; ?></h2></div>
                <div class="text"><?php echo $text; ?></div>
            </div>
            <?php
            if (isset($login_session)&&$login_session<3) {
                if (isset($_GET['site'])) {
                    echo '<a href="/wtt/general/editsite.php?site='.$_GET['site'].'" class="edit">EDIT</a> ';
                }else{
                    if (isset($_GET['subsite'])) {
                        echo '<a href="/wtt/general/editsite.php?subsite='.$_GET['subsite'].'" class="edit">EDIT</a> ';
                    }else{
                        echo '<a href="/wtt/general/editsite.php?site=1" class="edit">EDIT</a> ';
                    }
                }
               
            }
        ?>
        </div>
    </div>
</body>
</html>
