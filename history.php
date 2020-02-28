<html>

<head>
	<title>Climbing History</title>
	<style>
	table, h2
	{
		font-family: arial, sans-serif;
		border-collapse: collapse;
		width: 100%;
	}
	td, th
	{
		border: 1px solid #dddddd;
		text-align: left;
		padding: 8px;
	}
	tr:nth-child(even)
	{
		background-color: #dddddd;
	}	
	</style>
</head>

<body>
	<h2>Climbing History</h2>

	<table>
	<?php
	$conn = mysqli_connect("localhost", "root", "root", "db_climb");
	$user = "tb_julian";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		if ($_POST['delbutton'] > 151)
			$q_del = mysqli_query($conn, "DELETE FROM $user WHERE climb_id = $_POST[delbutton]");
	}

	$q_table = mysqli_query($conn, "SELECT * FROM $user ORDER BY climb_date, sequence");
	echo	'<tr>
				<th>Date</th>
				<th>Route</th>
				<th>Attempt</th>
				<th>Status</th>
				<th>Remove</th>
			</tr>';
	while ($row_table = mysqli_fetch_array($q_table))
	{
		$q_color = mysqli_query($conn, "SELECT color FROM tb_route WHERE
			route_id = '$row_table[2]'");
		$row_color = mysqli_fetch_array($q_color);
		echo '<tr>
				<td>'.$row_table[1].'</td>
				<td>'.$row_table[3].' '.$row_color[0].'</td>
				<td>'.$row_table[4].'</td>
				<td>'.$row_table[5].'</td>
				<td>
					<form method="post">
					<button type="submit" name="delbutton" value='.$row_table[0].'>x</button>
					</form>
				</td>
			</tr>';
	}
	mysqli_close($conn);
	?>
	</table>
</body>
	
<script>
	if (window.history.replaceState)
		  window.history.replaceState( null, null, window.location.href );
</script>

</html>
