<?php
include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="login_signup.css">
</head>


<body>
<div class="signup-container">
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="add" method="post">
	<div class="signup-inside">
		<div><input type="text" id="username" name="username" placeholder="User Name"></div>
		<div><input type="password" id="pass" name="pass" placeholder="Password"></div>
		<br>
		<div><input type="submit" id="submit" value="LOGIN"></div>
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
