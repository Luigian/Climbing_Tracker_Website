<?php
	require_once("service/authentication.php");
	require_once("service/validation.php");
	if (user_authentication())
		relocate("home.php");
	
	include("header_out.php");

	if (isset($_POST["submit"]) && $_POST["submit"] == "LOGIN")
	{
		$text = "";
		unset_post("username");
		unset_post("password");
		if (isset($_POST["username"]) && isset($_POST["password"]))
		{
			if (!len_between($_POST["username"], 3, 10))
				$text = "Username has a bad format.";
			else if (!len_between($_POST["password"], 3, 10))
				$text = "Password has a bad format.";
			else if (!only_alpha($_POST["username"]))
				$text = "Username has a bad format.";
			else if (!only_alpha_num($_POST["password"]))
				$text = "Password has a bad format.";
			else
			{
				$conn = mysqli_connect("localhost", "luis", "", "db_climb");
				$q_userid_a = mysqli_query($conn, "SELECT id, username FROM users WHERE username = '$_POST[username]'");
				$q_userid_b = mysqli_query($conn, "SELECT id FROM users WHERE password = '$_POST[password]'");
				$row_userid_a = mysqli_fetch_array($q_userid_a);
				$row_userid_b = mysqli_fetch_array($q_userid_b);
				
				if ($row_userid_a[0] != '' && $row_userid_a[0] == $row_userid_b[0])
				{
					setcookie("userId", $row_userid_a[0]);
					setcookie("userName", $row_userid_a[1]);
					$q_gym_adm = mysqli_query($conn, "SELECT id, name FROM gyms WHERE userId = $row_userid_a[0]");
					if ($q_gym_adm) 
					{
						$row_gym_adm = mysqli_fetch_array($q_gym_adm);
						setcookie("gymAdmId", $row_gym_adm[0]);
						setcookie("gymAdmName", $row_gym_adm[1]);
					}
					$token = rand(1000, 9999);
					mysqli_query($conn, "UPDATE users SET token = '$token' WHERE username = '$_POST[username]'");
					setcookie("token", $token);
					echo "<script type='text/javascript'>";
					echo "window.location.href = 'history.php';";
					echo "</script>";
				}
				else
					$text = "Username and/or password do not exist.";
			}
		}
		else
		{
			if (!isset($_POST["username"]) && !isset($_POST["password"]))
				$text = "Username and password are required.";
			else if (!isset($_POST["username"]))
				$text = "Username is required.";
			else if (!isset($_POST["password"]))
				$text = "Password is required.";
		}
		if ($text != "")
		{
			echo "<script type='text/javascript'>";
			echo "alert('$text');";
			echo "</script>";
		}
	}
?>

<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="style/login.css">
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
</html>
	
<script>
	if (window.history.replaceState) 
		  window.history.replaceState( null, null, window.location.href );
</script>

<?php
	include("footer.php");
?>
