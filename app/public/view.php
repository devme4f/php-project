<?php
	// session_start();

	// if(!isset($_SESSION['username'])){
	// 	header('Location: index.php', true, 302);
	//    die();	
	// }

	// sql query check co that la user
	$_SESSION['username'] = 'admin';
	
	$username = $_SESSION['username'];

	$user_images = './uploads/' . $username; // username path traversall????
	$images = scandir($user_images);
	foreach ($images as $image){
		echo $image. "\n";
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View page</title>
</head>
<body>
	<p>Hello there!!</p>
</body>
</html>