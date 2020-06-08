<?php
	include("header_gym.php");
	setcookie("gymAdmOn", "1");

	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	if ($_COOKIE["inactivateRoute"])
	{
		$q_inact = mysqli_query($conn, "UPDATE routes SET active = 0 WHERE id = $_COOKIE[inactivateRoute]");
		setcookie("inactivateRoute", "");
	}
	if ($_COOKIE["activateRoute"])
	{
		$q_act = mysqli_query($conn, "UPDATE routes SET active = 1 WHERE id = $_COOKIE[activateRoute]");
		setcookie("activateRoute", "");
	}
	if ($_COOKIE["removeRoute"] && $_COOKIE["removeRoute"] > "29")
	{	
		$q_remove = mysqli_query($conn, "DELETE FROM routes WHERE id = $_COOKIE[removeRoute]");
		setcookie("removeRoute", "");
	}

	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = $_COOKIE[gymAdmId]");
	$row_count = mysqli_fetch_array($q_count);
?>

<html>
<head>
	<title>Routes</title>
	<link rel="stylesheet" type="text/css" href="routes.css">	
</head>

<body>
	<?php
		if ($row_count[0] == '0')
		{
			echo "<div class='msg-container'>";
			echo "<a id='addmessage' href='new.php'>Add your first route here</a>";
			echo "</div>";
		}
		else
		{
			echo '<div class="table-container">';
			if ($_COOKIE["displayRoutes"])
				$button_text = "See Only On";
			else
				$button_text = "See Also Off";
			echo '<div id="disp-div">
				<button id="disp-button" onclick="dispFunction('.$_COOKIE["displayRoutes"].')">'.$button_text.'</button>
				</div>';
			echo '<table>';
			echo '<tr>
				<th>Grade</th>
				<th>Color</th>
				<th>Line</th>
				<th>Setting Date</th>
				<th>On / Off</th>
				<th>Remove</th>
				</tr>';
			if ($_COOKIE["displayRoutes"])
				$q_table = mysqli_query($conn, "SELECT * FROM routes WHERE gymId = $_COOKIE[gymAdmId] ORDER BY line ASC, settingDate ASC");
			else
				$q_table = mysqli_query($conn, "SELECT * FROM routes WHERE gymId = $_COOKIE[gymAdmId] AND active = 1 ORDER BY line ASC, settingDate ASC");
			while ($row_table = mysqli_fetch_array($q_table))
			{
				if ($row_table[5])
					$color_button = "green-button.png";
				else
					$color_button = "gray-button.png";
				echo '<tr>
						<td>'.$row_table[1].'</td>
						<td>'.$row_table[2].'</td>
						<td>'.$row_table[3].'</td>
						<td>'.$row_table[4].'</td>
						<td><input id="actbutt" src='.$color_button.' onclick="actFunction('.$row_table[0].', '.$row_table[5].')" type="image"></input></td>
						<td><input id="rembutt" src="trash.png" onclick="remFunction('.$row_table[0].')" type="image"></input></td>
					</tr>';
			}
			echo '</table>';
			echo '</div>';
		}
		mysqli_close($conn);
	?>	
</body>
</html>
	
<script>
	if (window.history.replaceState)
		  window.history.replaceState( null, null, window.location.href );

	function dispFunction(dispcode)
	{
		if (dispcode)
			document.cookie = 'displayRoutes=';
		else
			document.cookie = 'displayRoutes=1';
		window.location.href = 'routes.php';
	}
	function actFunction(id, act)
	{
		if (act == 1)
			document.cookie = 'inactivateRoute=' + id;
		else
			document.cookie = 'activateRoute=' + id;
		window.location.href = 'routes.php';
	}
	function remFunction(id)
	{
		var rem_confirm = confirm('Do you want to remove this route?');
		if (rem_confirm == true)
			document.cookie = 'removeRoute=' + id;
		window.location.href = 'routes.php';
	}
</script>

<?php
	include("footer_gym.php");
?>