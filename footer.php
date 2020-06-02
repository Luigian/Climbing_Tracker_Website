<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="footer.css">
</head>
<?php
$conn = mysqli_connect("localhost", "luis", "", "db_climb");
$q_gym = mysqli_query($conn, "SELECT name FROM gyms WHERE id = $_COOKIE[gym]");
$row_gym = mysqli_fetch_array($q_gym);
?>

<body>
	<div class="foot-main-container">
		<div class="foot-container">
			<?php
			echo "<i class='text'>".$_COOKIE[user]."</i>";
			echo "<img id='cashew_white' src='cashew_icon_white.png' alt='cashew_white'>";
			echo "<i class='text'>".$row_gym[0]."</i>";
			?>
		</div>
	</div>
</body>
