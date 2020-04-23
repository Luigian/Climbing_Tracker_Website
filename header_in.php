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
	<link rel="stylesheet" type="text/css" href="header_out.css">
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
				<a id="h_add" href="add.php">ADD</a>
				<a id="h_history" href="history.php">HISTORY</a>
				<a id="h_analytics" href="analytics.php">ANALYTICS</a>
			</div>
			<div class="in-dropdown">
				<img class="dropbtn" src="cashew_icon_black.png">
				<div class="dropdown-content">
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="logoutform" method="post">
						<input type="submit" class="inmenu" name="submit" value="LOGOUT">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
