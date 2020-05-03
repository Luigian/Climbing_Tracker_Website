<?php
include("header_gym.php");
?>

<html>
<head>
	<title>Routes</title>
	<link rel="stylesheet" type="text/css" href="routes.css">	
</head>
<script>
	function actFunction(id) {
		alert("hello");
		alert(id);
	}
</script>
<body>
	<?php
	$user = "tb_".$_COOKIE["user"];
	$gym = "tb_route";
	
	
	
	
	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		setcookie("delbutton", $_POST["delbutton"]);
		echo "<script>";
		echo "var r = confirm('Do you want to delete this route?');";
		echo "if (r == true){";
		echo "document.cookie = 'r=1';";
		echo "}";
		echo "else {";
		echo "document.cookie = 'r=0';";
 		echo "}";
		echo "window.location.href = 'routes.php';";
		echo "</script>";
 	}
	if (($_COOKIE["user"] != "julian" || $_COOKIE['delbutton'] > 29) && $_COOKIE["r"] == "1")
	{
		$q_del = mysqli_query($conn, "DELETE FROM $gym WHERE route_id = $_COOKIE[delbutton]");
		setcookie("r", "0");		
	}
	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM $gym");
	$row_count = mysqli_fetch_array($q_count);
	if ($row_count[0] == '0')
	{
		echo "<div class='msg-container'>";
		echo "<a id='addmessage' href='add.php'>Add your first route here</a>";
		echo "</div>";
	}
	else
	{
		$q_table = mysqli_query($conn, "SELECT * FROM $gym WHERE active = 1 ORDER BY line ASC");
		echo	'<div class="table-container">';
		echo	'<table>';
		echo	'<tr>
				<th>Grade</th>
				<th>Color</th>
				<th>Line</th>
				<th>Setting Date</th>
				<th>Inactivate</th>
				<th>Remove</th>
			</tr>';
		while ($row_table = mysqli_fetch_array($q_table))
		{
			echo '<tr>
					<td>'.$row_table[1].'</td>
					<td>'.$row_table[2].'</td>
					<td>'.$row_table[3].'</td>
					<td>'.$row_table[4].'</td>';
			echo		'<td><input onclick="actFunction('.$row_table[0].')" type="button" name="actbutton" value='.$row_table[0].'></button></td>
					<td><input type="button" name="delbutton" value='.$row_table[0].'></button></td>
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
