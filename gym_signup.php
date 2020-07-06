<?php
	require_once("authentication.php");
	if (!user_authentication())
	{
		logout();
		relocate("login.php");
	}
	if (!new_admin_authentication())
		relocate("routes.php");
	
	setcookie("actualPage", "gymsignup");
	include("header_in.php");

	if (isset($_POST["submit"]) && $_POST["submit"] == "SIGN UP")
	{
		if (isset($_POST["gymname"]) && isset($_POST["gymlocation"]))
		{
			$conn = mysqli_connect("localhost", "luis", "", "db_climb");	
			$q_gymname = mysqli_query($conn, "SELECT COUNT(*) FROM gyms WHERE name = '$_POST[gymname]'");
			$row_gymname = mysqli_fetch_array($q_gymname);
			if ($row_gymname[0] == '0')
			{
				mysqli_query($conn, "INSERT INTO gyms (name, location, userId) VALUES ('$_POST[gymname]', '$_POST[gymlocation]', '$_COOKIE[userId]')");
				$q_gymid = mysqli_query($conn, "SELECT id FROM gyms WHERE name = '$_POST[gymname]'");
				$row_gymid = mysqli_fetch_array($q_gymid);
				setcookie("gymAdmId", $row_gymid[0]);
				setcookie("gymAdmName", $_POST["gymname"]);
				$text = "Gym succesfull registered";
			}
			else
				$text = "Gym name already exists";
			mysqli_close($conn);
		}
		else if (!isset($_POST["gymname"]) && !isset($_POST["gymlocation"]))
			$text = "Gym name and location are required";
		else if (!isset($_POST["gymname"]))
			$text = "Gym name is required";
		else if (!isset($_POST["gymlocation"]))
			$text = "Location is required";
		echo "<script type='text/javascript'>";
		echo "alert('$text');";
		if ($row_gymname[0] == '0')
			echo "window.location.href = 'routes.php';";
		echo "</script>";
	}
?>

<html>
<head>
	<title>Gym Sign Up</title>
	<link rel="stylesheet" type="text/css" href="gym_signup.css">
</head>

<body>
	<div class="gym_signup-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="gym_signform" method="post">
			<div><input type="text" id="sign_gym_name" name="gymname" placeholder="Gym Name"></div>
			<div><input type="text" id="sign_gym_location" name="gymlocation" placeholder="Location"></div>
			<div><input type="submit" id="sign_gym_submit" name="submit" value="SIGN UP"></div>
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