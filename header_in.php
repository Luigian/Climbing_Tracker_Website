<!DOCTYPE html>
<?php
echo $_COOKIE["user"];
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="header_in.css">
</head>

<body>
	<div class="head-container">
		<div class="logo">
			<a href="home.php">
				<img  src="logo_1.png" height="70" alt="Panic.bear">
			</a>
		</div>
		<div class="navi">
			<a id="add" href="add.php">ADD</a>
			<a id="history" href="history.php">HISTORY</a>
			<a id="analytics" href="analytics.php">ANALYTICS</a>
			<div class="dropdown">
				<img class="dropbtn" src="cashew_icon.svg" height="20">
				<div class="dropdown-content">
					<a id="logout" href="home_out.php">LOGOUT</a>
				</div>
			</div>
		</div>
	</div>
</body>
