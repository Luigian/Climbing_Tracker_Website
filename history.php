<?php
include("header_in.php");
?>

<html>
<head>
	<title>History</title>
	<link rel="stylesheet" type="text/css" href="history.css">	
</head>

<body>
	<?php
	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		setcookie("delbutton", $_POST["delbutton"]);
		echo "<script>";
		echo "var r = confirm('Do you want to delete this climb?');";
		echo "if (r == true){";
		echo "document.cookie = 'r=1';";
		echo "}";
		echo "else {";
		echo "document.cookie = 'r=0';";
 		echo "}";
		echo "window.location.href = 'history.php';";
		echo "</script>";
 	}
	if ($_COOKIE['delbutton'] || $_COOKIE['r'] == "1")
	{
		if ($_COOKIE["user"] != "julian" || $_COOKIE['delbutton'] > 73)
			$q_del = mysqli_query($conn, "DELETE FROM climbs WHERE id = $_COOKIE[delbutton]");
		setcookie("r", "0");		
		setcookie("delbutton", "");		
	}

	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM climbs WHERE userId = '$_COOKIE[userId]'");
	$row_count = mysqli_fetch_array($q_count);
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
					<td>
						<form class="but" method="post">
							<button type="submit" name="delbutton" value='.$row_table[0].'>x</button>
						</form>
					</td>
				</tr>';
		}
		echo '</table>';
		echo '</div>';
	}
	mysqli_close($conn);
	?>
</body>
	
<script>
	if (window.history.replaceState)
		  window.history.replaceState( null, null, window.location.href );
alert(document.cookie);
</script>
</html>

<?php
include("footer.php");
?>
