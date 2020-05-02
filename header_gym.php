<?php
if ($_POST["submit"] == "LOGOUT")
{
	setcookie("user", "");
	echo "<script type='text/javascript'>";
	echo "window.location.href = 'home.php';";
	echo "</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="header_gym.css">
</head>

<body>
	<div class="header-container">
		<div class="logo">
			<a href="home.php">
				<img id="header_logo" src="logo_1.png" alt="Panic.bear">
			</a>
		</div>
		<div class="navi">
			<div id="outmenu">
				<a id="new" href="new.php">NEW</a>
				<a id="routes" href="routes.php">ROUTES</a>
				<a id="dashboard" href="dashboard.php">DASHBOARD</a>
			</div>
			<div class="in-dropdown">
				<img class="dropbtn" src="cashew_icon_black.png">
				<div class="dropdown-content">
					<a class="inmenu" id="climber" href="history.php">CLIMBER</a>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="logoutform" method="post">
						<input type="submit" class="inmenu" name="submit" value="LOGOUT">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>