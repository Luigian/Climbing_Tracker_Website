<?php
include("header_gym.php");
?>

<?php
if (!empty($_POST) && $_SERVER["REQUEST_METHOD"] == "POST")
{
	if (empty($_POST['_date']))
	{
		echo '<script language="javascript">';
		echo "alert('Date is required')";
		echo '</script>';
	}
	else
		add_to_database();
}
function add_to_database()
{	
	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	$q_grade = mysqli_query($conn, "SELECT grade FROM tb_route WHERE route_id = '$_POST[route]'");
	$row_grade = mysqli_fetch_array($q_grade);
	$grade = $row_grade[0];
	$user = "tb_".$_COOKIE["user"];
	$q_attempt = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE route_id = '$_POST[route]'");
	$row_attempt = mysqli_fetch_array($q_attempt);
	$att = $row_attempt[0] + 1;
	$q_sequence = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE climb_date = '$_POST[_date]'");
	$row_sequence = mysqli_fetch_array($q_sequence);
	$seq = $row_sequence[0] + 1;
	mysqli_query($conn, "INSERT INTO $user (climb_date, route_id, grade, attempt, status, sequence) VALUES ('$_POST[_date]', '$_POST[route]', '$grade', '$att', '$_POST[status]', '$seq')");
	mysqli_close($conn);
	echo '<script language="javascript">';
	echo "window.location.href = 'history.php';";
	echo '</script>';
}
$conn = mysqli_connect("localhost", "luis", "", "db_climb");
$q_menu = mysqli_query($conn, "SELECT route_id, grade, color FROM tb_route WHERE active = 1 ORDER BY line, route_id");
?>

<!DOCTYPE html>
<html>
<head>
	<title>New</title>
	<link rel="stylesheet" type="text/css" href="new.css">
</head>

<body>
<div class="new-container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="newform" method="post">
		<div><select id="new_grade" name="grade">
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
		<div><select id="new_color" name="color">
			<option value="red">red</option>
			<option value="green">green</option>
			<option value="blue">blue</option>
			<option value="yellow">yellow</option>
			<option value="purple">purple</option>
			<option value="orange">orange</option>
		</select></div>
		<div><select id="new_line" name="line">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
		</select></div>
		<div><input type="date" id="new_date" name="_date"></div>
		<div><input id="new_submit" type="submit" value="ADD ROUTE"></div>
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
