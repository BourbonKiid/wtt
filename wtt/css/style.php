<?php
header("Content-type: text/css; charset: UTF-8");
include $_SERVER['DOCUMENT_ROOT'].'/wtt/db/database.php';
 include $_SERVER['DOCUMENT_ROOT'].'/wtt/login/session.php';
//$body_bg = "red";//"#DBF5F3";
//$box_bg = "blue";//"#DBF5F3";
$img_bg = "/wtt/site_img/background1.jpg";
?>
body{
	background: url("<?php echo $img_bg ?>") no-repeat fixed;
}
