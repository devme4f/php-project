<?php 
    session_start();
    require_once 'connect.php';

    // func sanitize
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    if(isset($_POST['register'])){ //&& !empty($_POST['g-recaptcha-response'])){
        // $secret = '6LcbnIAeAAAAACHu-VRa8u1qMYSytumPDlwb_tCY';
        // $verify_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        // $response_data = json_decode($verify_response);
        // if ($responseData->susscess){
            try{
                $username = test_input($_POST["username"]); 
                // check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z0-9' ]*$/",$username)) {
                    $_SESSION['err'] = "Only letters, numbers and white space allowed";
                echo "<script>window.location = 'register.php'</script>";
                exit();
                }
                ##reminder:  encrypt password  
                $password = test_input($_POST["password"]);
                $select=$conn->prepare("SELECT * FROM users WHERE username =:user");
                $select->bindValue(':user',$username);
                $select->execute();
                if(($select->rowCount()) > 0){
                    $_SESSION['err'] = "User already exists, try again!";
                    echo "<script>window.location = 'register.php'</script>";
                }
                else{
                    $exec= $conn->prepare("INSERT INTO users (username, password) VALUES (:user, :pass)");
                    $exec->bindValue(':user',$username);
                    $exec->bindValue(':pass',$password);
                    $exec->execute();
                }
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
            $_SESSION['message']="User successfully created";
            //reset connect
            $conn = null;
            //chuyen huong
            header('location:login.php');
        }
    // }
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./static/register.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="icon" href="./favicon.jpg">
	<title>register page</title>
</head>
<body>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">	
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
            <div class="mess">
                <?php 
					if(isset($_SESSION['err'])){
						echo $_SESSION['err'] ;
					}
				?>
            </div>
            <script>
				(function(){
					setTimeout(function(){
						document.querySelector(".mess").remove();
					},3000)
				})();
			</script>
            <div class="g-recaptcha" data-sitekey="6LcbnIAeAAAAAAUS8OfziJMDQM7X-0n6m_8EAEdY"></div>
            <button class="btn btn-primary form-control" name="password-reset-token">Register</button>
            <div class="login">
				Already have an account?
				<a href="login.php">Login</a>
			</div>
            
        </form>
    </div>
</body>