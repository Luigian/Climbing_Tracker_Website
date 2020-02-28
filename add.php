<!DOCTYPE html>
<html>
<head>
	<title>Add New Climbing</title>
	<style>
	body
	{
		text-align: center;
	}
	h2, form
	{
		font-family: arial, sans-serif;
	}
	form
	{
		display: inline-block;
	}
	</style>
</head>

	<?php
	$add = "";
	if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST")
	{
		if (empty($_POST['_date']))
			$add = "Date is required";
		else
			add_to_database($add);
		echo '<script language="javascript">';
		echo 'alert("'.$add.'")';
		echo '</script>';
	}
	function add_to_database(&$add)
	{	
		$conn = mysqli_connect("localhost", "root", "root", "db_climb");
		$q_grade = mysqli_query($conn, "SELECT grade FROM tb_route WHERE route_id = '$_POST[route]'");
		$row_grade = mysqli_fetch_array($q_grade);
		$grade = $row_grade[0];
		$user = "tb_julian";
		$q_attempt = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE route_id = '$_POST[route]'");
		$row_attempt = mysqli_fetch_array($q_attempt);
		$att = $row_attempt[0] + 1;
		$q_sequence = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE climb_date = '$_POST[_date]'");
		$row_sequence = mysqli_fetch_array($q_sequence);
		$seq = $row_sequence[0] + 1;
		if (mysqli_query($conn, "INSERT INTO $user (climb_date, route_id, grade, attempt, status, sequence)
	   	VALUES ('$_POST[_date]', '$_POST[route]',	'$grade', '$att', '$_POST[status]', '$seq')"))
			$add = "Climb added";
		else
			$add = "Addition failed";
		mysqli_close($conn);
	}
 	?>

<body>
	<h2>Add New Climb</h2><br>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="add" method="post">
		<label for="_date">Date:</label><br>
		<input type="date" id="_date" name="_date"><br><br>
		<label for="route">Route:</label><br>
		<select id="route" name="route">
			<option value="10">5.8 Purple</option>
			<option value="5">5.9 Red</option>
			<option value="1">5.10a Orange</option>
			<option value="12">5.10b Yellow</option>
			<option value="8">5.10c Blue</option>
			<option value="14">5.10d Blue</option>
			<option value="4">5.11a Green</option>
			<option value="7">5.11a Orange</option>
			<option value="11">5.11a Red</option>
			<option value="2">5.11b Yellow</option>
			<option value="3">5.11c Purple</option>
			<option value="6">5.11d Blue</option>
			<option value="13">5.11d Green</option>
			<option value="9">5.12a Green</option>
		</select><br><br>
		<label for="status">Status:</label><br>
		<select id="status" name="status">
			<option value="Top">Top</option>
			<option value="Fall">Fall</option>
		</select><br><br><br>
		<input type="submit" value="Add Climb"><br><br>
	</form>
</body>
	
<script>
	if (window.history.replaceState) 
		  window.history.replaceState( null, null, window.location.href );
</script>

</html>
