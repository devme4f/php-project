<?php
	
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
		die('You have to log in first, redirecting...');
	}
	$username = $_SESSION['username'];

	if(isset($_GET['message']) || isset($_GET['code'])){
		$message = htmlspecialchars($_GET['message']); // XSS
		$code = htmlspecialchars($_GET['code']);
	}

	// get pictures
	$user_path = 'uploads/' . $username . '/'; // username path traversall????
	$images = scandir($user_path);
	unset($images[0]);
	unset($images[1]);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Files</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="static/style.css">
	<link rel="icon" href="./favicon.jpg">
</head>
<body>

	<div>
		<img src="adven.gif" class="theme">
	<div>
	<div class="main_box">
		<form action="upload.php" method="post" enctype="multipart/form-data">
			Select image to upload:
			<input class="button" type="file" name="fileToUpload" id="file">
			<input class="button" style="background-color: gray;" type="submit" name="submit" value="Upload Image">
			<?php
				if(isset($code) || isset($message)){
					if($code){
						$msg = '<p style="color:green">';
					}
					else{
						$msg = '<p style="color:red">';
					}
					$msg .= $message . '</p>';
					echo $msg;
				}
			?>
		</form>
		<br>
		<?php
			foreach ($images as $image) {
				$src = '<a target="_blank" href="';
				$src .= $user_path . $image;
				$src .= "\" >" . $image . "</a>&emsp;";

				echo $src;
			}
		?>
	</div>
	<br>
</body>
</html>
