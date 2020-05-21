<?php
include("header_out.php");
?>

<?php
if ($_POST["submit"] == "LOGIN")
{
	if ($_POST["username"] && $_POST["password"])
	{
		$conn = mysqli_connect("localhost", "luis", "", "db_climb");
		$q_userid_a = mysqli_query($conn, "SELECT id, username FROM users WHERE username = '$_POST[username]'");
		$q_userid_b = mysqli_query($conn, "SELECT id FROM users WHERE password = '$_POST[password]'");
		$row_userid_a = mysqli_fetch_array($q_userid_a);
		$row_userid_b = mysqli_fetch_array($q_userid_b);
		
		if ($row_userid_a[0] != '' && $row_userid_a[0] == $row_userid_b[0])
		{
			setcookie("user", $row_userid_a[1]);
			echo "<script type='text/javascript'>";
			echo "window.location.href = 'history.php';";
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('Username and/or password are invalid')";
		}
		echo "</script>";
	}
	else
	{
		if (!$_POST["username"] && !$_POST["password"])
			$text = "Username and password are required";
		else if (!$_POST["username"])
			$text = "Username is required";
		else if (!$_POST["password"])
			$text = "Password is required";
		echo "<script type='text/javascript'>";
		echo "alert('$text');";
		echo "</script>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
<div class="login-container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="loginform" method="post">
		<div><input type="text" id="log_user" name="username" placeholder="User Name"></div>
		<div><input type="password" id="log_pass" name="password" placeholder="Password"></div>
		<div><input type="submit" id="log_submit" name="submit" value="LOGIN"></div>
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
