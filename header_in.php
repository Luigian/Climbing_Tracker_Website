<?php
if ($_POST["submit"] == "LOGOUT")
{
	setcookie("userName", "");
	setcookie("userId", "");
	setcookie("gymAdmId", "");
	setcookie("gymAdmName", "");
	setcookie("gymClimbId", "");
	setcookie("gymClimbName", "");
	setcookie("display", "0");
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
	<div class="header-container">
		<div class="logo">
			<a href="home.php">
				<img id="header_logo" src="logo_1.png" alt="Panic.bear">
			</a>
		</div>
		<div class="navi">
			<div id="outmenu">
				<?php
				if ($_COOKIE["gymClimbId"])
					echo '<a id="add" href="add.php">ADD</a>';
				else	
					echo '<a id="add" href="gyms.php">ADD</a>';
				?>
				<a id="history" href="history.php">HISTORY</a>
				<a id="analytics" href="analytics.php">ANALYTICS</a>
			</div>
			<div class="in-dropdown">
				<img class="dropbtn" src="cashew_icon_black.png">
				<div class="dropdown-content">
					<?php
					if ($_COOKIE["gymAdmId"])
						echo '<a class="inmenu" id="gymadmin" href="routes.php">GYM ADMIN</a>';
					else	
						echo '<a class="inmenu" id="gymadmin" href="gym_signup.php">GYM ADMIN</a>';
					?>
					<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="logoutform" method="post">
						<input type="submit" class="inmenu" name="submit" value="LOGOUT">
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

<script>

	alert(document.cookie);

</script>
