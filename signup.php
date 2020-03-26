<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="login_signup.css">
</head>

<?php

if ($_POST["submit"] == "SIGN UP")
{
	if ($_POST["username"] && $_POST["password"])
	{
		$conn = mysqli_connect("localhost", "luis", "", "db_climb");	
		$q_username = mysqli_query($conn, "SELECT COUNT(*) FROM tb_users WHERE username = '$_POST[username]'");
		$row_username = mysqli_fetch_array($q_username);
		if ($row_username[0] == '0')
		{
			mysqli_query($conn, "INSERT INTO tb_users (username, password) VALUES ('$_POST[username]', '$_POST[password]')");
			$text = "User created";
		}
		else
			$text = "Please choose another username";
		mysqli_close($conn);
	}
	else if (!$_POST["username"] && !$_POST["password"])
			$text = "Username and password are required";
	else if (!$_POST["username"])
			$text = "Username is required";
	else if (!$_POST["password"])
			$text = "Password is required";
	echo "<script language='javascript'>";
	echo "alert('$text')";
	echo "</script>";
}

?>

<body>
<div class="signup-container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="add" method="post">
	<div class="signup-inside">
		<div><input type="text" id="username" name="username" placeholder="User Name"></div>
		<div><input type="password" id="password" name="password" placeholder="Password"></div>
		<br>
		<div><input type="submit" id="submit" name ="submit" value="SIGN UP"></div>
	</div>
	</form>
</div>
</body>
	
<script>
	if (window.history.replaceState) 
		  window.history.replaceState( null, null, window.location.href );
</script>
</html>

<?php
include("footer.php");
?>
