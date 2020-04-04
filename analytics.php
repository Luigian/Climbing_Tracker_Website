<?php
include("header_in.php");
?>

<html>
<head>
	<title>Analytics</title>
	<link rel="stylesheet" type="text/css" href="history.css">
</head>

<body>
	
	<div class="table-container">
	<table>
	<?php
	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	$user = "tb_".$_COOKIE["user"];
	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM $user");
	$row_count = mysqli_fetch_array($q_count);
	if ($row_count[0] == '0')
	{
		echo "<div id= 'firstmsg'>";
		echo "<br>";
		echo "<a id='addmessage' href='add.php'>Add your first climb here</a>";
		echo "<br>";
		echo "</div>";
	}
	else
	{
	?>	
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

		if ($row_c[0] != 0)
		{	
			$efc = ($row_dt[0] / $row_dc[0]) * 100;
			$efc = (int)$efc;
			$efn = ($row_t[0] / $row_c[0]) * 100;
			$efn = (int)$efn;
			$clm = $row_c[0];
			$dclm = $row_dc[0];
			$top = $row_t[0];
			$dtop = $row_dt[0];

			echo	'<tr>';
			echo	'<td class="analytics-row">'.$x.'</td>';
			echo	'<td>'.$efc.'%</td>';
			echo	'<td>'.$efn.'%</td>';
			echo	'<td>'.$clm.'</td>';
			echo	'<td>'.$dclm.'</td>';
			echo	'<td>'.$top.'</td>';
			echo	'<td>'.$dtop.'</td>';
			echo	'</tr>';
		}
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

	}
	mysqli_close($conn);
	?>
	</table>
	</div>
</body>
</html>

<?php
include("footer.php");
?>
