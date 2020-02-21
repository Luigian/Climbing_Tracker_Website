<?php
$conn = mysqli_connect("localhost", "root", "root", "db_climb");
/*
if (!$conn)
	die('Connection Failed: ' . mysqli_connect_error());
else
	echo "Connected successfully";
*/
$sql = "INSERT INTO tb_luis VALUES ('$_GET[_date]', '$_GET[route_id]', '$_GET[grade]', '$_GET[attempt]', '$_GET[status]')"; 
if (mysqli_query($conn, $sql))
	echo "Climb successfully added!\n";
else
	echo "Error while adding the data\n";
mysqli_close($conn);
?>
