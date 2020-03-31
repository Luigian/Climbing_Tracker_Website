<?php
echo $_COOKIE["user"];

if ($_POST["submit"] == "LOGOUT")
{
	setcookie("user", "empty");
	echo "<script type='text/javascript'>";
	echo "window.location.href = 'home.php';";
	echo "</script>";
}
?>

<!DOCTYPE html>
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
<!--					<a id="logout" href="home_out.php">LOGOUT</a>-->
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="logoutform" method="post">
						<input type="submit" id="logout" name="submit" value="LOGOUT">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
