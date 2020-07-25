<?php
	require_once("service/authentication.php");
	if (!user_authentication())
	{
		logout();
		relocate("login.php");
	}

	setcookie("actualPage", "analytics");
	include("header_in.php");
	
	if (isset($_COOKIE["userId"]))
		$userId = $_COOKIE["userId"];
	else
		$userId = "";
	
	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM climbs WHERE userId = '$userId'");
	$row_count = mysqli_fetch_array($q_count);
?>

<html>
<head>
	<title>Analytics</title>
	<link rel="stylesheet" type="text/css" href="style/analytics.css">
</head>

<body>
	<?php
		if ($row_count[0] == '0')
		{
			echo
			"<div class='msg-container'>
				<a id='addmessage' href='add.php'>Add your first climb here</a>
			</div>";
		}
		else
		{
			$q_c = mysqli_query($conn, "SELECT COUNT(*) FROM climbs WHERE userId = '$_COOKIE[userId]'");
			$q_t = mysqli_query($conn, "SELECT COUNT(*) FROM climbs WHERE userId = '$_COOKIE[userId]' AND status = 'Top'");
			$q_dc = mysqli_query($conn, "SELECT COUNT(DISTINCT routeId) FROM climbs WHERE userId = '$_COOKIE[userId]'");
			$q_dt = mysqli_query($conn, "SELECT COUNT(DISTINCT routeId) FROM climbs WHERE userId = '$_COOKIE[userId]' AND status = 'Top'");
			$row_c = mysqli_fetch_array($q_c);
			$row_t = mysqli_fetch_array($q_t);
			$row_dc = mysqli_fetch_array($q_dc);
			$row_dt = mysqli_fetch_array($q_dt);
			$efc = ($row_dt[0] / $row_dc[0]) * 100;
			$efc = (int)$efc;
			$efn = ($row_t[0] / $row_c[0]) * 100;
			$efn = (int)$efn;
			$clm = $row_c[0];
			$top = $row_t[0];
			$dclm = $row_dc[0];
			$dtop = $row_dt[0];
			echo
			'<div class="table-container">
				<table>
					<tr>
						<th>Grade</th>
						<th>Efficacy</th>
						<th>Efficiency</th>
						<th>Distinct Climbs</th>
						<th>Distinct Tops</th>
						<th>Climbs</th>
						<th>Tops</th>
					</tr>
					<tr id="analyt-totals">
						<th>Totals</th>
						<th>'.$efc.'%</th>
						<th>'.$efn.'%</th>
						<th>'.$dclm.'</th>
						<th>'.$dtop.'</th>
						<th>'.$clm.'</th>
						<th>'.$top.'</th>
					</tr>';
		
			$gr = array("5.8", "5.9", "5.10a", "5.10b", "5.10c", "5.10d", "5.11a", "5.11b", "5.11c", "5.11d", "5.12a", "5.12b", "5.12c", "5.12d");
			$i = 0;
			while ($i < 14)
			{
				$x = $gr[$i];
				$q_c = mysqli_query($conn, "SELECT COUNT(*) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE climbs.userId = '$_COOKIE[userId]' AND routes.grade = '$x'");
				$q_t = mysqli_query($conn, "SELECT COUNT(*) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE climbs.userId = '$_COOKIE[userId]' AND routes.grade = '$x' AND climbs.status = 'Top'");
				$q_dc = mysqli_query($conn, "SELECT COUNT(DISTINCT climbs.routeId) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE climbs.userId = '$_COOKIE[userId]' AND routes.grade = '$x'");
				$q_dt = mysqli_query($conn, "SELECT COUNT(DISTINCT climbs.routeId) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE climbs.userId = '$_COOKIE[userId]' AND routes.grade = '$x' AND climbs.status = 'Top'");
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
					$top = $row_t[0];
					$dclm = $row_dc[0];
					$dtop = $row_dt[0];
					echo
					'<tr>
						<td class="analytics-row">'.$x.'</td>
						<td>'.$efc.'%</td>
						<td>'.$efn.'%</td>
						<td>'.$dclm.'</td>
						<td>'.$dtop.'</td>
						<td>'.$clm.'</td>
						<td>'.$top.'</td>
					</tr>';
				}
				$i = $i + 1;
			}
			echo
				'</table>
			</div>';
		}
		mysqli_close($conn);
	?>
</body>
</html>

<?php
	include("footer.php");
?>
