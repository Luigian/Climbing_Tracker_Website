<?php
	if (isset($_COOKIE["userName"]))
		$userName = $_COOKIE["userName"];
	else	
		$userName = "";
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="footer.css">
</head>

<body>
	<div class="foot-main-container">
		<div class="foot-container">
			<?php
				echo "<i class='text'>".$userName."</i>";
				echo "<img id='cashew_white' src='cashew_icon_white.png' alt='cashew_white'>";
				echo "<i class='text'>Panic Bear</i>";
			?>
		</div>
	</div>
</body>
</html>