<?php
include $_SERVER['DOCUMENT_ROOT'].'/wtt/login/session.php';
    if(isset($_GET['art'])&&isset($login_session)) {
        $art=$_GET['art'];
        echo $art;
        echo $login_session;
        $sql = $db->prepare("INSERT INTO post_likes (id_user,id_post) 
            SELECT ".$login_session.", ".$art." FROM forum_post
            WHERE EXISTS(
                    SELECT idforum_post
                    FROM forum_post
                    WHERE idforum_post=".$art.")
                AND NOT EXISTS (
                        SELECT id_post
                        FROM post_likes
                        WHERE id_user=".$login_session." 
                        AND id_post=".$art.")
                    LIMIT 1");
        if ($sql->execute() === TRUE) {

            header('Location: '.$_GET['site'].'#'.$art.'');
            $db->close();
        }else{
            echo "Adding user did not work<br>";
            $db->close();
        }
    }else{
        header('Location: '.$_GET['site'].'#'.$art.'');
    }
?>