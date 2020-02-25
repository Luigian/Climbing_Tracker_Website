<?php

$conn = mysqli_connect("localhost", "root", "root", "db_climb");
if ($conn)
	echo "Connection successfully";
else
	echo "Connection failed";
echo '<br>';

$q_grade = mysqli_query($conn, "SELECT grade FROM tb_route WHERE route_id = '$_GET[route]'");
$row_grade = mysqli_fetch_array($q_grade);
$grade = $row_grade[0];

//$user = "tb_luis";
$user = "tb_julian";

$q_attempt = mysqli_query($conn, "SELECT COUNT(*) FROM $user WHERE route_id = '$_GET[route]'");
$row_attempt = mysqli_fetch_array($q_attempt);
$attempt = $row_attempt[0] + 1;

if (mysqli_query($conn, "INSERT INTO $user (date, route_id, grade, attempt, status)
   	VALUES ('$_GET[_date]', '$_GET[route]',	'$grade', '$attempt', '$_GET[status]')"))
	echo "Addition successfully";
else
	echo "Addition failed";
echo '<br>';

mysqli_close($conn);
?>
