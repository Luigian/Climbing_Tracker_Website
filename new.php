<?php
	include("header_gym.php");

	if (isset($_POST["submit"]) && $_POST["submit"] == "ADD ROUTE")
	{
		if (empty($_POST['newdate']))
		{
			echo '<script language="javascript">';
			echo "alert('Setting Date is required')";
			echo '</script>';
		}
		else
			add_to_database();
	}
	function add_to_database()
	{	
		$conn = mysqli_connect("localhost", "luis", "", "db_climb");
		mysqli_query($conn, "INSERT INTO routes (grade, color, line, settingDate, active, gymId) VALUES ('$_POST[newgrade]', '$_POST[newcolor]', '$_POST[newline]', '$_POST[newdate]', '1', '$_COOKIE[gymAdmId]')");
		mysqli_close($conn);
		echo '<script language="javascript">';
		echo "window.location.href = 'routes.php';";
		echo '</script>';
	}
?>

<html>
<head>
	<title>New</title>
	<link rel="stylesheet" type="text/css" href="new.css">
</head>

<body>
	<div class="new-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="newform" method="post">
			<div><select id="new_grade" name="newgrade">
				<option value="5.8">5.8</option>
				<option value="5.9">5.9</option>
				<option value="5.10a">10a</option>
				<option value="5.10b">10b</option>
				<option value="5.10c">10c</option>
				<option value="5.10d">10d</option>
				<option value="5.11a">11a</option>
				<option value="5.11b">11b</option>
				<option value="5.11c">11c</option>
				<option value="5.11d">11d</option>
				<option value="5.12a">12a</option>
				<option value="5.12b">12b</option>
				<option value="5.12c">12c</option>
				<option value="5.12d">12d</option>
			</select></div>
			<div><select id="new_color" name="newcolor">
				<option value="red">red</option>
				<option value="green">green</option>
				<option value="blue">blue</option>
				<option value="yellow">yellow</option>
				<option value="purple">purple</option>
				<option value="orange">orange</option>
			</select></div>
			<div><select id="new_line" name="newline">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
			</select></div>
			<div><input type="date" id="new_date" name="newdate"></div>
			<div><input id="new_submit" type="submit" name="submit" value="ADD ROUTE"></div>
		</form>
	</div>
</body>
</html>
	
<script>
	if (window.history.replaceState) 
		  window.history.replaceState( null, null, window.location.href );
</script>

<?php
	include("footer_gym.php");
?>