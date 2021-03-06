<?php
	require_once("service/authentication.php");
	if (!user_authentication())
	{
		logout();
		relocate("login.php");
	}
	if (!admin_authentication())
		relocate("gym_signup.php");

	setcookie("actualPage", "dashboard");
	include("header_gym.php");

	if (isset($_COOKIE["gymAdmId"]))
		$gymAdmId = $_COOKIE["gymAdmId"];
	else
		$gymAdmId = "";

	$conn = mysqli_connect("localhost", "luis", "", "db_climb");
	if ($q_count = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = $gymAdmId"))
		$row_count = mysqli_fetch_array($q_count);
	else
		$row_count = NULL;
?>

<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="style/dashboard.css">
</head>

<body>
	<?php
		if (!$row_count[0])
		{
			echo
			"<div class='dash-msg-container'>
				<a id='addmessage' href='new.php'>Add your first route here</a>
			</div>";
		}
		else
		{
			$q_at = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]' AND active = '1'");
			$q_st = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]'");
			$q_ct = mysqli_query($conn, "SELECT COUNT(*) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE routes.gymId = '$_COOKIE[gymAdmId]'");
			$row_at = mysqli_fetch_array($q_at);
			$row_st = mysqli_fetch_array($q_st);
			$row_ct = mysqli_fetch_array($q_ct);
			$active_totals = $row_at[0];
			$setted_totals = $row_st[0];
			$climbs_totals = $row_ct[0];
			
			echo
			'<div class="dashboard-container">
				<table>
					<tr>
						<th>Grade</th>
						<th>Now Active</th>
						<th class="percent">Percent</th>
						<th>Setted Overall</th>
						<th class="percent">Percent</th>
						<th>Users Climbs</th>
						<th class="percent">Percent</th>
					</tr>
					<tr id="dash-totals">
						<th>Totals</th>
						<th>'.$active_totals.'</th>
						<th class="percent">100%</th>
						<th>'.$setted_totals.'</th>
						<th class="percent">100%</th>
						<th>'.$climbs_totals.'</th>
						<th class="percent">100%</th>
					</tr>';
			
			$gr = array("5.8", "5.9", "5.10a", "5.10b", "5.10c", "5.10d", "5.11a", "5.11b", "5.11c", "5.11d", "5.12a", "5.12b", "5.12c", "5.12d");
			$i = 0;
			while ($i < 14)
			{
				$x = $gr[$i];
				$q_a = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]' AND grade = '$x' AND active = '1'");
				$q_s = mysqli_query($conn, "SELECT COUNT(*) FROM routes WHERE gymId = '$_COOKIE[gymAdmId]' AND grade = '$x'");
				$q_c = mysqli_query($conn, "SELECT COUNT(*) FROM climbs LEFT JOIN routes ON routes.id = climbs.routeId WHERE routes.gymId = '$_COOKIE[gymAdmId]' AND grade = '$x'");
				$row_a = mysqli_fetch_array($q_a);
				$row_s = mysqli_fetch_array($q_s);
				$row_c = mysqli_fetch_array($q_c);
				
				if ($row_s[0] != 0)
				{	
					$active = $row_a[0];
					if ($active_totals)
						$active_percent = ($active / $active_totals) * 100;
					else
						$active_percent = 0;
					if ($active_percent - (int)$active_percent > .49)
						$active_percent += .5;
					$active_percent = (int)$active_percent;

					$setted = $row_s[0];
					if ($setted_totals)
						$setted_percent = ($setted / $setted_totals) * 100;
					else
						$setted_percent = 0;
					if ($setted_percent - (int)$setted_percent > .49)
						$setted_percent += .5;
					$setted_percent = (int)$setted_percent;
					
					$climbs = $row_c[0];
					if ($climbs_totals)
						$climbs_percent = ($climbs / $climbs_totals) * 100;
					else
						$climbs_percent = 0;	
					if ($climbs_percent - (int)$climbs_percent > .49)
						$climbs_percent += .5;
					$climbs_percent = (int)$climbs_percent;

					echo
					'<tr">
						<td class="dash-row">'.$x.'</td>
						<td>'.$active.'</td>
						<td class="percent">'.$active_percent.'%</td>
						<td>'.$setted.'</td>
						<td class="percent">'.$setted_percent.'%</td>
						<td>'.$climbs.'</td>
						<td class="percent">'.$climbs_percent.'%</td>
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
	include("footer_gym.php");
?>
