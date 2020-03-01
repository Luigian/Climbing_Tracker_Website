<!DOCTYPE html>
<html>
<head>
	<title>Add New Climbing</title>
	<style>

	img {
	max-width: 100%;
	height: auto;
	}

	.container {
	width: 960px;
	max-width: 100%;
	padding: 20px;
	margin: 0 auto;
	}

	.main-header .container {
	display: flex;
	align-items: center;
	justify-content: space-around;
	flex-wrap: wrap;
	}
	
	.main-nav ul {
	margin: 1em 0 .5em;
	text-align: center;
	}

	.main-nav li {
	display: inline;
	}

	.main-nav a {
	display: inline-block;
	padding: .5em 1.5em;
	}	

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
	$conn = mysqli_connect("localhost", "root", "root", "db_climb");
	$q_menu = mysqli_query($conn, "SELECT route_id, grade, color FROM tb_route WHERE active = 1 ORDER BY line, route_id");
	?>

<body>
	
	<header class="main-header">
		<div class="container">
			<h1 class="mh-logo">
				<img src="http://flexbox.ninja/assets/images/logo.svg" width="170" height="95" alt="Flexbox.ninja">
			</h1>
			<nav class="main-nav">
				<ul class="main-nav-list">
					<li>
						<a href="#">Add</a>
					</li>
					<li>
						<a href="#">History</a>
					</li>
					<li>
						<a href="#">Analytics</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>


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
