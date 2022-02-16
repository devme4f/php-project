<?php 
    session_start();
    require_once 'connect.php';

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data); 

        return $data;
    }
    require_once 'connect.php';

    if (isset($_POST['login'])){
        if($_POST['username'] !== "" || $_POST['password'] !== ""){
			# loc specialchars 
            $username= test_input($_POST['username']);
            $password= test_input($_POST['password']);
            $_SESSION['username']=$username;
            $exec = $conn->prepare("SELECT * FROM users WHERE username=:user AND password=:pass ");
            $exec->bindValue(':user',$username);
            $exec->bindValue(':pass',$password);
            $exec->execute();  
            $fetch = $exec -> fetch();  
            if(($exec ->rowCount()) > 0){
                $_SESSION['username']=$fetch['username'];
                header('location: index.php');
            } else {
                echo "
                <script>alert('Wrong username or password !!')</script>
                <script>window.location = 'login.php'</script>
                ";
            }
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./static/login.css">
	<link rel="icon" href="./favicon.jpg">
	<title>Login page</title>
</head>
<body>
	<div class="container">
		<h1 id='text1'>LOGIN</h1>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
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
			<!-- change message  -->
			<div class="mess">
				<?php 
					if(isset($_SESSION['message'])){
						echo $_SESSION['message'];
					}
				?>
			<script>
				(function(){
					setTimeout(function(){
						document.querySelector(".mess").remove();
					},3000)
				})();
			</script>
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
