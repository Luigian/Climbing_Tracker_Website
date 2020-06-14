<?php
	include("header_gym.php");

	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	$q_count = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = $_COOKIE[gymAdmId]");
	$row_count = mysqli_fetch_array($q_count);
?>

<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="dashboard.css">
</head>

<body>
	<?php
		if ($row_count[0] == '0')
		{
			echo
			"<div class='dash-msg-container'>
				<a id='addmessage' href='new.php'>Add your first route here</a>
			</div>";
		}
		else
		{
			echo
			'<div class="dashboard-container">
				<table>
					<tr>
						<th>Grade</th>
						<th>Setted</th>
						<th>%</th>
						<th>Actives</th>
						<th>%</th>
						<th>Climbs</th>
						<th>%</th>
					</tr>';
		
			$q_st = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]'");
			$q_at = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]' AND active = '1'");
			$q_ct = mysqli_query($conn, "SELECT COUNT(*) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE routes.gymId = '$_COOKIE[gymAdmId]'");
			$row_st = mysqli_fetch_array($q_st);
			$row_at = mysqli_fetch_array($q_at);
			$row_ct = mysqli_fetch_array($q_ct);
			$setted_totals = $row_st[0];
			$actives_totals = $row_at[0];
			$climbs_totals = $row_ct[0];
			
			$gr = array("5.8", "5.9", "5.10a", "5.10b", "5.10c", "5.10d", "5.11a", "5.11b", "5.11c", "5.11d", "5.12a", "5.12b", "5.12c", "5.12d");
			$i = 0;
			while ($i < 14)
			{
				$x = $gr[$i];
				$q_s = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]' AND grade = '$x'");
				$q_a = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]' AND grade = '$x' AND active = '1'");
				$q_c = mysqli_query($conn, "SELECT COUNT(*) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE routes.gymId = '$_COOKIE[gymAdmId]' AND grade = '$x'");
				$row_s = mysqli_fetch_array($q_s);
				$row_a = mysqli_fetch_array($q_a);
				$row_c = mysqli_fetch_array($q_c);
				
				if ($row_s[0] != 0)
				{	
					$setted = $row_s[0];
					$setted_percent = ($setted / $setted_totals) * 100;
					if ($setted_percent - (int)$setted_percent > .49)
						$setted_percent += .5;
					$setted_percent = (int)$setted_percent;

					$actives = $row_a[0];
					$actives_percent = ($actives / $actives_totals) * 100;
					if ($actives_percent - (int)$actives_percent > .49)
						$actives_percent += .5;
					$actives_percent = (int)$actives_percent;

					$climbs = $row_c[0];
					$climbs_percent = ($climbs / $climbs_totals) * 100;
					if ($climbs_percent - (int)$climbs_percent > .49)
						$climbs_percent += .5;
					$climbs_percent = (int)$climbs_percent;

					echo
					'<tr>
						<td class="dashboard-row">'.$x.'</td>
						<td>'.$setted.'</td>
						<td>'.$setted_percent.'%</td>
						<td>'.$actives.'</td>
						<td>'.$actives_percent.'%</td>
						<td>'.$climbs.'</td>
						<td>'.$climbs_percent.'%</td>
					</tr>';
				}
				$i = $i + 1;
			}
					echo
					'<tr>
						<th>Totals</th>
						<th>'.$setted_totals.'</th>
						<th>100%</th>
						<th>'.$actives_totals.'</th>
						<th>100%</th>
						<th>'.$climbs_totals.'</th>
						<th>100%</th>
					</tr>
				</table>
			</div>';
		}
		mysqli_close($conn);
	?>
</body>
</html>

<?php
	include("footer_gym.php");
?>
