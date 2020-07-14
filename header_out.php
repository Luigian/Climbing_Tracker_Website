<html>
<head>
	<link rel="stylesheet" type="text/css" href="style/header_out.css">
</head>

<body>
	<!-- Print Cookies -->
	<a id="cookie" onclick="funCookie()">O</a>
	<div class="header-container">
		<div class="logo">
			<a href="home.php">
				<img id="header_logo" src="img/logo_1.png" alt="Panic.bear">
			</a>
		</div>
		<div class="navi">
			<div class="out-dropdown">
				<img class="dropbtn" src="img/cashew_icon_black.png">
				<div class="dropdown-content">
					<a class="inmenu" href="login.php">LOGIN</a>
					<a class="inmenu" href="signup.php">SIGN UP</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<script>
	function funCookie()
	{
		alert(document.cookie);
	}
</script>