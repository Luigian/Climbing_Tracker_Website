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
	$user = "tb_".$_COOKIE["user"];
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
	if (($_COOKIE["user"] != "julian" || $_COOKIE['delbutton'] > 73) && $_COOKIE["r"] == "1")
	{
		$q_del = mysqli_query($conn, "DELETE FROM $user WHERE climb_id = $_COOKIE[delbutton]");
		setcookie("r", "0");		
	}
	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM $user");
	$row_count = mysqli_fetch_array($q_count);
	if ($row_count[0] == '0')
	{
		echo "<div class='msg-container'>";
		echo "<a id='addmessage' href='add.php'>Add your first climb here</a>";
		echo "</div>";
	}
	else
	{
		$q_table = mysqli_query($conn, "SELECT * FROM $user ORDER BY climb_date DESC, sequence DESC");
		echo	'<div class="table-container">';
		echo	'<table>';
		echo	'<tr>
				<th>Date</th>
				<th>Route</th>
				<th>Attempt</th>
				<th>Status</th>
				<th>Remove</th>
			</tr>';
		while ($row_table = mysqli_fetch_array($q_table))
		{
			$q_color = mysqli_query($conn, "SELECT color FROM tb_route WHERE route_id = '$row_table[2]'");
			$row_color = mysqli_fetch_array($q_color);
			echo '<tr>
					<td>'.$row_table[1].'</td>
					<td>'.$row_table[3].' '.$row_color[0].'</td>
					<td>'.$row_table[4].'</td>
					<td>'.$row_table[5].'</td>
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
</script>
</html>

<?php
include("footer.php");
?>
