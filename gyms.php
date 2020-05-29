<?php
include("header_in.php");
?>

<?php
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST")
{
	setcookie("gym", $_POST["gym"]);
	//add_to_database();
	echo '<script language="javascript">';
	echo "window.location.href = 'add.php';";
	echo '</script>';
}
function add_to_database()
{	
	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	mysqli_query($conn, "INSERT INTO climbs (climbDate, routeId, status, userId) VALUES ('$_POST[_date]', '$_POST[route]', '$_POST[status]', '$_COOKIE[userId]')");
	mysqli_close($conn);
}
$conn = mysqli_connect("localhost", "luis", "", "db_climb");
$q_gyms = mysqli_query($conn, "SELECT * FROM gyms");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Gyms</title>
	<link rel="stylesheet" type="text/css" href="gyms.css">
</head>

<body>
<div class="gyms-container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="gymsform" method="post">
		<div><select id="add_gym" name="gym">
			<?php
			while ($row_gyms = mysqli_fetch_array($q_gyms))
			{
				echo '<option value="'.$row_gyms[0].'">'.$row_gyms[1].'</option>';
			}
			mysqli_close($conn);
			?>
		</select></div>
		<div><input id="gyms_submit" type="submit" value="SELECT"></div>
	</form>
</div>
</body>
	
<script>
	if (window.history.replaceState) 
		  window.history.replaceState( null, null, window.location.href );
</script>
</html>

<?php
include("footer.php");
?>
