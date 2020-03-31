<?php
echo $_COOKIE["user"];
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="header_out.css">
</head>

<body>
	<div class="head-container">
		<div class="logo">
			<a href="home.php">
				<img src="logo_1.png" height="70" alt="Panic.bear">
			</a>
		</div>
		<div class="navi">
			<div class="dropdown">
				<img class="dropbtn" src="cashew_icon.svg" height="20">
				<div class="dropdown-content">
					<a id="login" href="login.php">LOGIN</a>
					<a id="signup" href="signup.php">SIGN UP</a>
				</div>
			</div>
		</div>
	</div>
</body>
