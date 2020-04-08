<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="home.css">
	<script src="jquery.js"></script>
	<script>
		$(function() {
			$("#incl").load("footer.php");
		});
	</script>
	
</head>

<body>
<div class="all">
<?php
if (isset($_COOKIE["user"]))
	include("header_in.php");
else
	include("header_out.php");
?>
	<div class="home-container">
		<div class="photo">
			<img id="pic" src="betamonkeys.jpeg" alt="betamonkeys">
		</div>
	</div>
	<div id="incl"></div>
<?php
include("footer.php");
?>
</div>
</body>
</html>
