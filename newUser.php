<!DOCTYPE html>
<html>

<head>
	<title>New User</title>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1">


	<script src="http://www.iclubz.com/js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="http://www.iclubz.com/js/chosen.jquery.js"></script>
	<script src="http://www.iclubz.com/js/jquery.validate.min.js"></script>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="home.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>

<body>

	<nav class="navbar navbar-static-top c-header-bar">
		<div class="c-header-text-container">
			<img alt="[Fannie Mae logo]" src="http://www.fanniemae.com/resources/img/fannie_mae_logo.gif" class="left">
			<ul class="nav nav-pills">
				<li> <a href="home.php"> HOME </a></li>
			</ul>
		</div>
	</nav>

	<div class="login-page">
		<div class="form">
			<form class="login-form" method="post" >
				<input tpye="text" name="vendor" placeholder="Vendor Name" />
				<input type="text" name="name" placeholder="Username"/>
				<input type="password" name="password" placeholder="Password"/>
				<input type="password" name="repwd" placeholder="Retype password" />
				<input type="submit" name="submit"  class="loginBUTT" value="CREATE USER" />
			</form>
		</div>
	</div>
	<?php
	if(isset($_POST["submit"])) {
		try {
			$conn = new PDO('mysql:host=localhost;dbname=appointment','FMAdmin','pwd123');
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "INSERT INTO userinfo (username, password, vendor) VALUES ('".$_POST[name]."','".$_POST[password]."','".$_POST[vendor]."')";
			if($conn->query($sql)){
				echo "<script type='text/javascript'> alert('New Record Inserted Successfully');</script>";
				echo "Connected Successfully. Account created";
			} else {
				echo "<script type='text/javascript'> alert('Data not successfully Inserted');</script>";
			}
			$conn = null;
		} catch(PDOException $e) {
			echo "User not created. Error: " .$e->getMessage();
		}
		header('Location: home.php');
	}
	?>

</body>
</html>