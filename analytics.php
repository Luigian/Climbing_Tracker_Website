<html>

<head>
	<title>Climbing Analytics</title>
	<style>
	</style>
</head>

<body>
	<h2>Climbing Analytics</h2>
	<table>
		<tr>
			<th>Grade</th>
			<th>Efficacy</th>
			<th>Efficiency</th>
			<th>Climbs</th>
			<th>Distinct-Climbs</th>
			<th>Tops</th>
			<th>Distinct-Tops</th>
		</tr>
		<tr>
			<td>5.8</td>
	<?php
	$conn = mysqli_connect("localhost", "root", "root", "db_climb");
	$result = mysqli_query($conn, "SELECT * FROM tb_luis");
	
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
