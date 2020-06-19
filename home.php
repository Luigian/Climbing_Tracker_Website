<?php
	if (isset($_COOKIE["logoutCancel"]) && $_COOKIE["logoutCancel"] == "1")
	{
		echo "<script type='text/javascript'>";
		setcookie("logoutCancel", "0");
		if ($_COOKIE["actualPage"] == "homein")
			$previousPage = "home";
		else
			$previousPage = $_COOKIE["actualPage"];
		echo "window.location.href = '$previousPage.php';";
		echo "</script>";
	}
	else
	{
		if (isset($_COOKIE["userId"]))
		{	
			if ($_COOKIE["actualPage"] == "homein" || $_COOKIE["actualPage"] == "gyms" || $_COOKIE["actualPage"] == "add" || $_COOKIE["actualPage"] == "history" || $_COOKIE["actualPage"] == "analytics")
			{
				include "header_in.php";
				setcookie("actualPage", "homein");
			}
			else
			{
				include "header_gym.php";
				setcookie("actualPage", "homegym");
			}
		}
		else
		{
			include "header_out.php";
			// setcookie("actualPage", "homeout");
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
	if (isset($_COOKIE["gymAdmOn"]))
		include "footer_gym.php";
	else
		include "footer.php";
?>
