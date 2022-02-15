<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./static/register.css">
	<title>register page</title>
</head>
<body>
    <div class="container">
        <form action="register_p.php" method="POST">	
            <h1 class="text1">REGISTER</h1>
            <div class="txt">
                <span></span>
                <input type="text" required name="username" />
                <label>Username</label>
            </div>
            <div class="txt">
                <input type="password" required  name="password" />
                <label>Password</label>
                <span></span>
            </div>
            <button class="btn btn-primary form-control" name="register">Register</button>
            <div class="login">
				Already have an account?
				<a href="login.php">Login</a>
			</div>
        </form>
    </div>

</body>