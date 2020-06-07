<?php
include("header_out.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>

<?php

if ($_POST["submit"] == "SIGN UP")
{
	if ($_POST["username"] && $_POST["password"])
	{
		$conn = mysqli_connect("localhost", "luis", "", "db_climb");	
		$q_username = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE username = '$_POST[username]'");
		$row_username = mysqli_fetch_array($q_username);
		if ($row_username[0] == '0')
		{
			mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$_POST[username]', '$_POST[password]')");
			$q_userid = mysqli_query($conn, "SELECT id FROM users WHERE username = '$_POST[username]'");
			$row_userid = mysqli_fetch_array($q_userid);
			setcookie("userId", $row_userid[0]);
			setcookie("userName", $_POST["username"]);
			$text = "User created";
		}
		else
			$text = "Username already exists";
		mysqli_close($conn);
	}
	else if (!$_POST["username"] && !$_POST["password"])
		$text = "Username and password are required";
	else if (!$_POST["username"])
		$text = "Username is required";
	else if (!$_POST["password"])
		$text = "Password is required";
	echo "<script type='text/javascript'>";
	echo "alert('$text');";
	if ($row_username[0] == '0')
		echo "window.location.href = 'add.php';";
	echo "</script>";
}

?>

<body>
<div class="signup-container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="signform" method="post">
		<div><input type="text" id="sign_user" name="username" placeholder="User Name"></div>
		<div><input type="password" id="sign_pass" name="password" placeholder="Password"></div>
		<div><input type="submit" id="sign_submit" name="submit" value="SIGN UP"></div>
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
