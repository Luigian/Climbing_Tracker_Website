<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
</head>

<body>
<?php
if (isset($_COOKIE["user"]))
	include "header_in.php";
else
	include "header_out.php";
?>
	<div class="home-container">
		<div class="photo">
			<img id="pic" src="betamonkeys.jpeg" alt="betamonkeys"/>
		</div>
	</div>
<?php
include "footer.php";
?>
</body>
</html>
