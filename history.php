<html>

<head>
	<title>Climbing History</title>
	<style>
	</style>
</head>

<body>
	<h2>Climbing History</h2>
	<?php
	$conn = mysqli_connect("localhost", "root", "root", "db_climb");
	$user = "tb_julian";
	$q_table = mysqli_query($conn, "SELECT * FROM $user ORDER BY climb_date, sequence");
	echo '<table>
			<tr>
				<th>Date</th>
				<th>Route</th>
				<th>Attempt</th>
				<th>Status</th>
			</tr>';
	while ($row_table = mysqli_fetch_array($q_table))
	{
		$q_color = mysqli_query($conn, "SELECT color FROM tb_route WHERE
			route_id = '$row_table[2]'");
		$row_color = mysqli_fetch_array($q_color);
		echo 	'<tr>
					<td>'.$row_table[1].'</td>
					<td>'.$row_table[3].' '.$row_color[0].'</td>
					<td>'.$row_table[4].'</td>
					<td>'.$row_table[5].'</td>
				</tr>';
	}
	mysqli_close($conn);
	?>
</body>
</html>
