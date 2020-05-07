<?php
include("header_gym.php");
?>

<html>
<head>
	<title>Routes</title>
	<link rel="stylesheet" type="text/css" href="routes.css">	
</head>
<script>
function allFunction()
{
	document.cookie = 'route_display=all' ;
	alert(document.cookie);
	window.location.href = 'routes.php';
}
function actFunction(id)
{
	var act_confirm = confirm('Do you want to inactivate this route?');
	if (act_confirm == true)
		document.cookie = 'inactivate=' + id;
	else
		document.cookie = 'inactivate=0';
	alert(document.cookie);
	window.location.href = 'routes.php';
}
function remFunction(id)
{
	var rem_confirm = confirm('Do you want to remove this route?');
	if (rem_confirm == true)
		document.cookie = 'remove=' + id;
	else
		document.cookie = 'remove=0';
	alert(document.cookie);
	window.location.href = 'routes.php';
}
</script>
<body>
	<?php
	$user = "tb_".$_COOKIE["user"];
	$gym = "tb_route";
	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	if ($_COOKIE["inactivate"] != "0")
		$q_inact = mysqli_query($conn, "UPDATE $gym SET active = 0 WHERE route_id = $_COOKIE[inactivate]");
	if ($_COOKIE["remove"] != "0" && ($_COOKIE["user"] != "julian" || $_COOKIE["remove"] > "29"))
		$q_remove = mysqli_query($conn, "DELETE FROM $gym WHERE route_id = $_COOKIE[remove]");
	setcookie("inactivate", "0");
	setcookie("remove", "0");
		
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
		if ($_COOKIE["route_display"] == "all")
			$q_table = mysqli_query($conn, "SELECT * FROM $gym ORDER BY line ASC");
		else
			$q_table = mysqli_query($conn, "SELECT * FROM $gym WHERE active = 1 ORDER BY line ASC");
		echo	'<div class="table-container">';
		echo '<input id="all-button" src="trash.png" onclick="allFunction()" type="image"></input>';
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
			if ($row_table[5])
				$color_button = "green-button.png";
			else
				$color_button = "red-button.png";
			echo '<tr>
					<td>'.$row_table[1].'</td>
					<td>'.$row_table[2].'</td>
					<td>'.$row_table[3].'</td>
					<td>'.$row_table[4].'</td>
			 		<td><input src='.$color_button.' onclick="actFunction('.$row_table[0].')" type="image"></input></td>
			 		<td><input src="trash.png" onclick="remFunction('.$row_table[0].')" type="image"></input></td>
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
