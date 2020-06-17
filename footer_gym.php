<?php
	if (isset($_COOKIE["gymAdmName"]))
		$gymName = $_COOKIE["gymAdmName"];
	else	
		$gymName = "";
?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="footer.css">
</head>

<body>
	<div class="foot-main-container">
		<div class="foot-container">
			<?php
				echo "<i class='text'>".$gymName."</i>";
				echo "<img id='cashew_white' src='cashew_icon_white.png' alt='cashew_white'>";
				echo "<i class='text'>Panic Bear</i>";
			?>
		</div>
	</div>
</body>
</html>
