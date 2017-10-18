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
?>
    <div class="container">
        <div class="content">
            <div class="post">
                <form name="myForm" action="/wtt/general/savesite.php" method="post">
                    <?php 
                        if (isset($_GET['site'])) {
                            echo '<input type="hidden" id="art" name="art" value="'.$_GET['site'].'"></h2>';
                        }else{
                            echo '<input type="hidden" id="sart" name="sart" value="'.$_GET['subsite'].'"></h2>';
                        }
                    ?>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <?php echo '<h2><input type="text" id="title" name="title" value="'.$row['title'].'"></h2>' ?>
                    </div>
                    <div class="form-group">
                        <label for="text">Text</label>
                        <?php echo '<textarea rows="35" cols="50" id="text" name="text" >'.$row['text'].'</textarea>' ?>
                    </div>
                    <button type="submit" class="btn btn-default postbtn" value="Submit">Save edit</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
