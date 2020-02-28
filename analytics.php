<html>

<head>
	<title>Climbing Analytics</title>
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
	}	</style>
</head>

<body>
	<h2>Climbing Analytics</h2>
	<table>
		<tr>
			<th>Grade</th>
			<th>Efficacy</th>
			<th>Efficiency</th>
			<th>Climbs</th>
			<th>Distinct Climbs</th>
			<th>Tops</th>
			<th>Distinct Tops</th>
		</tr>
	<?php
	$gr = array("5.8", "5.9", "5.10a", "5.10b", "5.10c", "5.10d", "5.11a", "5.11b", "5.11c", 
	"5.11d", "5.12a", "5.12b", "5.12c", "5.12d");
	$conn = mysqli_connect("localhost", "root", "root", "db_climb");
	$user = "tb_julian";
	$i = 0;
	while ($gr[$i])
	{
		$x = $gr[$i];
		$q_c = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE grade = '$x'");
		$q_t = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE grade = '$x'
		   	AND status = 'Top'");
		$q_dc = mysqli_query($conn, "SELECT COUNT(DISTINCT route_id) FROM $user
		   	WHERE grade = '$x'");
		$q_dt = mysqli_query($conn, "SELECT COUNT(DISTINCT route_id) FROM $user
		   	WHERE grade = '$x' AND status = 'Top'");

		$row_c = mysqli_fetch_array($q_c);
		$row_t = mysqli_fetch_array($q_t);
		$row_dc = mysqli_fetch_array($q_dc);
		$row_dt = mysqli_fetch_array($q_dt);

		if ($row_c[0] == 0)
			break;
		$efc = ($row_dt[0] / $row_dc[0]) * 100;
		$efc = (int)$efc;
		$efn = ($row_t[0] / $row_c[0]) * 100;
		$efn = (int)$efn;
		$clm = $row_c[0];
		$dclm = $row_dc[0];
		$top = $row_t[0];
		$dtop = $row_dt[0];

		echo	'<tr>';
		echo	'<td>'.$x.'</td>';
		echo	'<td>'.$efc.'%</td>';
		echo	'<td>'.$efn.'%</td>';
		echo	'<td>'.$clm.'</td>';
		echo	'<td>'.$dclm.'</td>';
		echo	'<td>'.$top.'</td>';
		echo	'<td>'.$dtop.'</td>';
		echo	'</tr>';
		
		$i = $i + 1;
	}
	$q_c = mysqli_query($conn, "SELECT COUNT(*) FROM $user");
	$q_t = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE status = 'Top'");
	$q_dc = mysqli_query($conn, "SELECT COUNT(DISTINCT route_id) FROM $user");
	$q_dt = mysqli_query($conn, "SELECT COUNT(DISTINCT route_id) FROM $user WHERE status = 'Top'");
	
	$row_c = mysqli_fetch_array($q_c);
	$row_t = mysqli_fetch_array($q_t);
	$row_dc = mysqli_fetch_array($q_dc);
	$row_dt = mysqli_fetch_array($q_dt);

	$efc = ($row_dt[0] / $row_dc[0]) * 100;
	$efc = (int)$efc;
	$efn = ($row_t[0] / $row_c[0]) * 100;
	$efn = (int)$efn;
	$clm = $row_c[0];
	$dclm = $row_dc[0];
	$top = $row_t[0];
	$dtop = $row_dt[0];

	echo	'<tr>';
	echo	'<th>Totals</th>';
	echo	'<th>'.$efc.'%</th>';
	echo	'<th>'.$efn.'%</th>';
	echo	'<th>'.$clm.'</th>';
	echo	'<th>'.$dclm.'</th>';
	echo	'<th>'.$top.'</th>';
	echo	'<th>'.$dtop.'</th>';
	echo	'</tr>';

	mysqli_close($conn);
	?>
</body>
</html>
