<?php
	require_once("authentication.php");
	if (user_authentication())
	{
		if (isset($_COOKIE["logout"]))
		{
			if ($_COOKIE["logout"] == "cancel")
			{
				if ($_COOKIE["actualPage"] == "homein" || $_COOKIE["actualPage"] == "homegym")
					$previousPage = "home";
				else
					$previousPage = $_COOKIE["actualPage"];
				echo "<script type='text/javascript'>
					document.cookie = 'logout=; expires=Thu, 01 Jan 1970 00:00:00 UTC';
					window.location.href = '$previousPage.php';
					</script>";
			}
			else if ($_COOKIE["logout"] == "true")
			{
				logout();
				include "header_out.php";
			}
		}
		else if (isset($_COOKIE["actualPage"]))
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
	}
	else
	{
		logout();
		include "header_out.php";
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
	if (user_authentication())
	{	
		if ($_COOKIE["actualPage"] == "homein" || $_COOKIE["actualPage"] == "gyms" || $_COOKIE["actualPage"] == "add" || $_COOKIE["actualPage"] == "history" || $_COOKIE["actualPage"] == "analytics" || $_COOKIE["actualPage"] == "gymsignup")
			include "footer.php";
		else if ($_COOKIE["actualPage"] == "homegym" || $_COOKIE["actualPage"] == "new" || $_COOKIE["actualPage"] == "routes" || $_COOKIE["actualPage"] == "dashboard")
			include "footer_gym.php";
	}
	else
		include "footer_out.php";
?>
