<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./static/login.css">
	<title>Login page</title>
</head>
<body>
	<div class="container">
		<?php 
			if(isset($_SESSION['message'])) echo "<script>alert('".$_SESSION['message']."')</script>";
		?>
		<h1 id='text1'>LOGIN</h1>
		<form method="POST" action="login_p.php" >
			<div class="txt">
				<span></span>
				<input type="text" required name="username" />
				<label>Username</label>
			</div>
			<div class="txt">
				<input type="password" required name="password" />
 				<label>Password</label>	
				 <span></span>
			</div>
			<button type="submit" name="login">Login</button>
			<div class="signup">
				Not a member? 
				<a href="register.php">Sign up</a>
			</div>
		</form>
	</div>
</body>
</html>
