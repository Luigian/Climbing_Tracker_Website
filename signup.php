<?php
	require_once("authentication.php");
	if (user_authentication())
		relocate("home.php");
	
	include("header_out.php");

	if (isset($_POST["submit"]) && $_POST["submit"] == "SIGN UP")
	{
		$relocate = 0;
		$text = "";
		if (isset($_POST["username"]) && isset($_POST["password"]))
		{
			if (!(strlen($_POST["username"]) >= 3 && strlen($_POST["username"]) <= 10))
				$text = "Username must contain between 3 and 10 characters length";
			else
			{
				$array = str_split($_POST["username"]);
				foreach ($array as $char)
				{
					if ($char < 65 || $char > 90)
						$text = "Username must contain only alphabetical characters";
				}
			}
			if ($text == "")
			{
				$conn = mysqli_connect("localhost", "luis", "", "db_climb");	
				$q_username = mysqli_query($conn, "SELECT COUNT(*) FROM users WHERE username = '$_POST[username]'");
				$row_username = mysqli_fetch_array($q_username);
				if ($row_username[0] == '0')
				{
					$relocate = 1;
					$token = rand(1000, 9999);
					mysqli_query($conn, "INSERT INTO users (username, password, token) VALUES ('$_POST[username]', '$_POST[password]', '$token')");
					$q_userid = mysqli_query($conn, "SELECT id FROM users WHERE username = '$_POST[username]'");
					$row_userid = mysqli_fetch_array($q_userid);
					setcookie("userId", $row_userid[0]);
					setcookie("userName", $_POST["username"]);
					setcookie("token", $token);
					$text = "User created";
				}
				else
					$text = "Username already exists";
				mysqli_close($conn);
			}
		}
		else if (!isset($_POST["username"]) && !isset($_POST["password"]))
			$text = "Username and password are required";
		else if (!isset($_POST["username"]))
			$text = "Username is required";
		else if (!isset($_POST["password"]))
			$text = "Password is required";
		echo "<script type='text/javascript'>";
		echo "alert('$text');";
		if ($relocate)
			echo "window.location.href = 'history.php';";
		echo "</script>";
	}
?>

<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="signup.css">
</head>

<body>
	<div class="signup-container">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="signform" method="post">
			<div><input type="text" id="sign_user" name="username" placeholder="User Name"></div>
			<div><input type="password" id="sign_pass" name="password" placeholder="Password"></div>
			<div><input type="submit" id="sign_submit" name="submit" value="SIGN UP"></div>
		</form>
	</div>
</body>
</html>
	
<script>
	if (window.history.replaceState) 
		  window.history.replaceState( null, null, window.location.href );
</script>

<?php
	include("footer.php");
?>
