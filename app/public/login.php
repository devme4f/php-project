<?php
	exit();
	session_start();
	$message = '';
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="">
	<title>Login page</title>
</head>
<body>
	<form method="POST" name="login" action="" aligh="center">
		<div class="message"><?php if($message!="") {echo $message;} ?></div>
		<h3 align="center">Login</h3>
		 Username:<br>
		 <input type="text" name="username">
		 <br>
		 Password:<br>
		<input type="password" name="password">
		<br><br>
		<input type="submit" name="submit" value="Submit">
		<input type="reset">
	</form>
</body>
</html>
<?php
	
?>