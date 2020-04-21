<?php
include("header_in.php");
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
	<title>Add</title>
	<link rel="stylesheet" type="text/css" href="add.css">
</head>

<body>
<div class="add-container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="addform" method="post">
		<div><input type="date" id="add_date" name="_date"></div>
		<div><select id="add_route" name="route">
			<?php
			while ($row_menu = mysqli_fetch_array($q_menu))
			{
				echo '<option value="'.$row_menu[0].'">'.$row_menu[1].' '.$row_menu[2].'</option>';
			}
			mysqli_close($conn);
			?>
		</select></div>
		<div><select id="add_status" name="status">
			<option id="add_top" value="Top">Top</option>
			<option value="Fall">Fall</option>
		</select></div>
		<div><input id="add_submit" type="submit" value="ADD CLIMB"></div>
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
