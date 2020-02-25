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
	/*
	if ($conn)
		echo "Connection successfully";
	else
		echo "Connection failed";
	echo '<br>';
	*/
	$user = "tb_luis";
	$result = mysqli_query($conn, "SELECT * FROM $user");
	/*
	if ($result)
		echo "Selection successfully";
	else
		echo "Selection failed";
	echo '<br>';
	*/
	echo '<table>
			<tr>
				<th>Date</th>
				<th>RouteID</th>
				<th>Grade</th>
				<th>Attempt</th>
				<th>Status</th>
			</tr>';
	while ($row = mysqli_fetch_array($result))
	{
		$field1 = $row[0];
		$field2 = $row[1];
		$field3 = $row[2];
		$field4 = $row[3];
		$field5 = $row[4];
		echo 	'<tr>
					<td>'.$field1.'</td>
					<td>'.$field2.'</td>
					<td>'.$field3.'</td>
					<td>'.$field4.'</td>
					<td>'.$field5.'</td>
				</tr>';
	}
	mysqli_close($conn);
	?>
</body>
</html>
