<?php
if (isset($_COOKIE["userId"]))
{	
	if (isset($_COOKIE["gymAdmOn"]))
		include "header_gym.php";
	else
		include "header_in.php";
}
else
	include "header_out.php";
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
