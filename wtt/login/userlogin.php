<?php
include('login.php'); // Includes Login Script
?>
<!DOCTYPE html>
<html>
<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/wtt/css/link.php' ?>
</head>
<body>
<div class="container" id="content">
	<div id="main">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4 login">
				<h1>Login</h1>
				<div id="login">
					<form action="" method="post">
						<input type="hidden" name="cur" value="<?php echo $_POST['cursite'] ?>">
						<label>UserName :</label>
						<input id="name" name="username" placeholder="username" type="text">
						<label>Password :</label>
						<input id="password" name="password" placeholder="**********" type="password">
						<input id="loginbtn" name="submit" type="submit" value=" Login ">
						<span><?php echo $error; ?></span>
					</form>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
</div>
</body>
</html>