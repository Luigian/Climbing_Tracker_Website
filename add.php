<?php
$conn = mysqli_connect("localhost", "root", "root", "db_climb");
if ($conn)
	echo "Connection successfully";
else
	echo "Connection failed";
echo '<br>';

if (mysqli_query($conn, "INSERT INTO tb_luis VALUES ('$_GET[_date]', '$_GET[route_id]', '$_GET[grade]', '$_GET[attempt]', '$_GET[status]')")) 
	echo "Addition successfully";
else
	echo "Addition failed";
echo '<br>';

mysqli_close($conn);
?>
