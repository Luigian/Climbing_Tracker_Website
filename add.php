<!DOCTYPE html>
<html>
<head>
	<title>Add New Climbing</title>
	<style>

	.main-container .head-container {
	display: flex;
	flex-direction: row;
	flex-wrap: wrap;
	justify-content: space-around;
	align-items: center;
	}
	
	.head-container {
	max-width: 100%;
	width: 1000px;
	margin: 0 auto;
	padding: 20px;
	}
	
	body
	{
		text-align: center;
	}
	h2, form, a
	{
		font-family: arial, sans-serif;
		color: black;
	}
	form
	{
		display: inline-block;
	}
	a:link {
	text-decoration: none;
	}
	a:hover {
	font-weight: bold;
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
	$conn = mysqli_connect("localhost", "root", "root", "db_climb");
	$q_menu = mysqli_query($conn, "SELECT route_id, grade, color FROM tb_route WHERE active = 1 ORDER BY line, route_id");
	?>

<body>
	
	<div class="main-container">
	<div class="head-container">
		<div class="logo">
			<img src="logo.png" width="170" height="95" alt="Flexbox.ninja">
		</div>	
		<div class="navi">
			<a href="#">Add</a>
			<a href="#">History</a>
			<a href="#">Analytics</a>
		</div>
	</div>
	</div>


	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="add" method="post">
		<label for="_date">Date:</label><br>
		<input type="date" id="_date" name="_date"><br><br>
		<label for="route">Route:</label><br>
		<select id="route" name="route">

		<?php
		while ($row_menu = mysqli_fetch_array($q_menu))
		{
			echo '<option value="'.$row_menu[0].'">'.$row_menu[1].' '.$row_menu[2].'</option>';
		}
		mysqli_close($conn);
		?>
	
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
