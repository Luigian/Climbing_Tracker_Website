<?php
	// echo "<script type='text/javascript'>";
	// echo 'document.cookie = "gymAdmOn=; expires=Thu, 01 Jan 1970 00:00:00 UTC";';
	// echo "</script>";
	
	if (isset($_COOKIE["logoutCancel"]) && $_COOKIE["logoutCancel"] == "1")
	{
		echo "<script type='text/javascript'>";
		setcookie("logoutCancel", "0");
		if ($_COOKIE["actualPage"] == "homein" || $_COOKIE["actualPage"] == "homegym")
			$previousPage = "home";
		else
			$previousPage = $_COOKIE["actualPage"];
		echo "window.location.href = '$previousPage.php';";
		echo "</script>";
	}
	else
	{
		if (isset($_COOKIE["actualPage"]))
		{	
			if ($_COOKIE["actualPage"] == "homein" || $_COOKIE["actualPage"] == "gyms" || $_COOKIE["actualPage"] == "add" || $_COOKIE["actualPage"] == "history" || $_COOKIE["actualPage"] == "analytics" || $_COOKIE["actualPage"] == "gymsignup")
			{
				include "header_in.php";
				setcookie("actualPage", "homein");
			}
			else if ($_COOKIE["actualPage"] == "homegym" || $_COOKIE["actualPage"] == "new" || $_COOKIE["actualPage"] == "routes" || $_COOKIE["actualPage"] == "dashboard")
			{
				include "header_gym.php";
				setcookie("actualPage", "homegym");
			}
		}
		else
		{
			$token = rand(1000, 9999);
			$conn = mysqli_connect("localhost", "luis", "", "db_climb");
			mysqli_query($conn, "UPDATE users SET token = '$token' WHERE id = '$_COOKIE[userId]'");
			setcookie("userId", "", time() - 3600);
			include "header_out.php";
		}
	}
?>

<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
	<div class="home-container">
		<div class="photo">
			<img id="pic" src="betamonkeys.jpeg" alt="betamonkeys"/>
		</div>
	</div>
</body>
</html>

<?php
	if (isset($_COOKIE["actualPage"]))
	{	
		if ($_COOKIE["actualPage"] == "homein" || $_COOKIE["actualPage"] == "gyms" || $_COOKIE["actualPage"] == "add" || $_COOKIE["actualPage"] == "history" || $_COOKIE["actualPage"] == "analytics" || $_COOKIE["actualPage"] == "gymsignup")
			include "footer.php";
		else if ($_COOKIE["actualPage"] == "homegym" || $_COOKIE["actualPage"] == "new" || $_COOKIE["actualPage"] == "routes" || $_COOKIE["actualPage"] == "dashboard")
			include "footer_gym.php";
	}
	else
		include "footer.php";
?>
