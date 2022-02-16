<?php
	
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
		exit('You have to log in first, redirecting...');
	}

	$username = $_SESSION['username'];
	if(isset($_GET['message']) || isset($_GET['code'])){
		$message = htmlspecialchars($_GET['message']); // XSS
		$code = htmlspecialchars($_GET['code']);
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Files</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="static/style.css">
</head>
<body>

	<div class="center-screen">
	<form action="upload.php" method="post" enctype="multipart/form-data">
		Select image to upload:
		<input type="file" name="fileToUpload" id="file">
		<input type="submit" name="submit" value="upload-file">
		<?php
			if(isset($code)){
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
	</div>

</body>
</html>