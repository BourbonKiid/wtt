<?php
	include $_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php';
	$tosave= '';
	$where='';
	if (isset($_POST['title'])) {
		if (isset($_POST['text'])) {
			if (isset($_POST['art'])) {
				$sql = $db->prepare('UPDATE article_info SET title="'.$_POST['title'].'", text="'.$_POST['text'].'" WHERE site='.$_POST['art'].';');
			}else{
				if (isset($_POST['sart'])) {
					$sql = $db->prepare('UPDATE article_info SET title="'.$_POST['title'].'", text="'.$_POST['text'].'" WHERE sub='.$_POST['sart'].';');
				}
			}
	        if ($sql->execute() === TRUE) {
	        	if (isset($_POST['art'])) {
	        		header('Location: /wtt/general/info.php?site='.$_POST['art'].'');
	        	}else{
	        		header('Location: /wtt/general/info.php?subsite='.$_POST['sart'].'');
	        	}
	            $db->close();
	            echo 'succsess';
	        } else {
	            echo '<div class="unsuccsessfull">Error: ' . $sql . '</div><br>' . $db->error;
	            $db->close();
	        }
		}
	}
?>