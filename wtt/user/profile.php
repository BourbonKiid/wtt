<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include $_SERVER['DOCUMENT_ROOT'].'/wtt/css/link.php' ;

	include $_SERVER['DOCUMENT_ROOT'].'/wtt/functions/calcDiff.php';
	$firstname;
	$lastname;
	$country_name;
	$bday;
	$banner;
	$profile_pic;
	foreach ($db->query("SELECT * FROM user LEFT JOIN countries ON country=idcountry WHERE idlogin=".$login_session.";")as $row) {
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$country_name = $row['country_name'];
		$bday = $row['bday'];
		$banner = $row['banner'];
		$profile_pic = $row['profilepic'];

		$timestamp = strtotime($bday);
		$age=floor((time()-$timestamp)/31536000);
	}
	?>
</head>
<body>
<?php
include $_SERVER['DOCUMENT_ROOT'].'/wtt/nav/user_nav.php';
include $_SERVER['DOCUMENT_ROOT'].'/wtt/nav/usersite_nav.php';?>
	<div class="container">
	<div class="usersite">
		<div class="row">
			
			<div class="col-md-3">
				<div class="userinfo">
					<?php
							echo '<div>'.$firstname.' '.$lastname.'</div>';
							echo '<div>'.$country_name.'</div>';
							echo '<div>Level '.$age.'</div>';
					?>
				</div>
			</div>
			<div class="col-md-9">

				<?php include $_SERVER['DOCUMENT_ROOT'].'/wtt/forum/posts/userposts.php'; ?>
				
			</div>
		</div>
	</div>

</body>
</html>