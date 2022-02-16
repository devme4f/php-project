<?php
	
	function redirect($url, $statusCode = 303){
	   header('Location: ' . $url, true, $statusCode);
	   die();
	}

	if(!isset($_POST['submit'])){
		redirect('index.php');
	}

	session_start();
	if(!isset($_SESSION['username'])){
		redirect('login.php');
	}

	$file_name = basename($_FILES['fileToUpload']['name']);
	$path_tmp = $_FILES['fileToUpload']['tmp_name'];


	function whitelist($allow_ext_list, $ext){
		foreach ($allow_ext_list as $allow_ext){
			if ($ext === $allow_ext){
				return true;
			}
		}

		return false;
	}

	function check($file_name, $path_tmp){
	
		//check file size
		if(filesize($path_tmp) > 100000){ // 100 000 bytes(1MB
			return "Error, file is too large!!";
		}

		// Allow certain file format
		$allow_ext_list = array('jpg', 'png', 'jpeg', 'gif');
		$ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION)); // all trong cay vao day, more filter??

		if(!whitelist($allow_ext_list, $ext) === true){
			$message = "Error, only ";
			foreach ($allow_ext_list as $allow_ext){
				$message .= $allow_ext . ', ';
			}
			$message .= "extensions are allowed!!";

			return $message;
		}

		// Them so khi ten file trung nhau
		// if(file_exists())

		return true;
	}

	$message = check($file_name, $path_tmp);
	$code = 0;

	if($message === true){
		$target_dir = '../uploads/' . $_SESSION['username'];

		if (!file_exists($target_dir)) {
    		mkdir($target_dir, 0777, true);
		}
		$target_file = $target_dir . '/' . $file_name;

		if(move_uploaded_file($path_tmp, $target_file)){
			$message = "The file " . htmlspecialchars(basename($file_name)) . " has been uploaded.";
			$code = 1;
		}
		else {
			$message = "Sorry, there was an erro uploading your file!!";
		}
	}

	$msg = '?message=' . urlencode($message) . '&code=' . $code;
	redirect('index.php' . $msg);

?>