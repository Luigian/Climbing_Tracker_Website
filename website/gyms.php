<?php
	require_once("service/authentication.php");
	if (!user_authentication())
	{
		logout();
		relocate("login.php");
	}
	
	setcookie("actualPage", "gyms");
	include("header_in.php");

	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	$q_gyms = mysqli_query($conn, "SELECT * FROM gyms");
	
	if (isset($_POST["submit"]) && $_POST["submit"] == "SELECT")
	{
		$conn = mysqli_connect("localhost", "luis", "", "db_climb");
		$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = $_POST[gym]");
		$row_count = mysqli_fetch_array($q_count);
		if ($row_count[0] == '0')
		{
			echo '<script language="javascript">';
			echo "alert('No routes available for this gym.')";
			echo '</script>';
		}
		else 
		{
			setcookie("gymClimbId", $_POST["gym"]);
			$q_gym = mysqli_query($conn, "SELECT name FROM gyms WHERE id = $_POST[gym]");
			$row_gym = mysqli_fetch_array($q_gym);
			setcookie("gymClimbName", $row_gym[0]);
			echo '<script language="javascript">';
			echo "window.location.href = 'add.php';";
			echo '</script>';
		}
	}
?>

<html>
<head>
	<title>Gyms</title>
	<link rel="stylesheet" type="text/css" href="style/gyms.css">
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
			<div><input id="gyms_submit" type="submit" name="submit" value="SELECT"></div>
		</form>
	</div>
</body>
</html>

<script>
	if (window.history.replaceState) 
		  window.history.replaceState( null, null, window.location.href );
</script>

<?php
	include("footer.php");
?>
