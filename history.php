<?php
	include("header_in.php");
	setcookie("gymAdmOn", "");

	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	if (isset($_COOKIE["removeClimb"]))
	{
		if ($_COOKIE["removeClimb"] > "73")
			$q_remove = mysqli_query($conn, "DELETE FROM climbs WHERE id = $_COOKIE[removeClimb]");
		setcookie("removeClimb", "");
	}
	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM climbs WHERE userId = '$_COOKIE[userId]'");
	$row_count = mysqli_fetch_array($q_count);
?>

<html>
<head>
	<title>History</title>
	<link rel="stylesheet" type="text/css" href="history.css">	
</head>

<body>
	<?php
		if ($row_count[0] == '0')
		{
			echo "<div class='msg-container'>";
			echo "<a id='addmessage' href='add.php'>Add your first climb here</a>";
			echo "</div>";
		}
		else
		{
			$q_table = mysqli_query($conn, "SELECT id, climbDate, routeId, status FROM climbs WHERE userId = '$_COOKIE[userId]' ORDER BY climbDate DESC, id DESC");
			echo	'<div class="table-container">';
			echo	'<table>';
			echo	'<tr>
					<th>Date</th>
					<th>Gym</th>
					<th>Route</th>
					<th>Status</th>
					<th>Attempt</th>
					<th>Remove</th>
				</tr>';
			while ($row_table = mysqli_fetch_array($q_table))
			{
				$q_route_info = mysqli_query($conn, "SELECT routes.grade, routes.color, gyms.name FROM routes LEFT JOIN gyms ON gyms.id = routes.gymId WHERE routes.id = '$row_table[2]'");
				$row_route_info = mysqli_fetch_array($q_route_info);
				$q_attempt = mysqli_query($conn, "SELECT COUNT(*) FROM climbs WHERE routeId = '$row_table[2]' AND userId = '$_COOKIE[userId]' AND id <= '$row_table[0]' AND climbDate <= '$row_table[1]'");
				$row_attempt = mysqli_fetch_array($q_attempt);
				echo '<tr>
						<td>'.$row_table[1].'</td>
						<td>'.$row_route_info[2].'</td>
						<td>'.$row_route_info[0].' '.$row_route_info[1].'</td>
						<td>'.$row_table[3].'</td>
						<td>'.$row_attempt[0].'</td>
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

	function remFunction(id)
	{
		var rem_confirm = confirm('Do you want to remove this climb?');
		if (rem_confirm == true)
			document.cookie = 'removeClimb=' + id;
		window.location.href = 'history.php';
	}
</script>

<?php
	include("footer.php");
?>
