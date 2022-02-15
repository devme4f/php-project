<?php
	$conn =  new PDO('mysql:dbname=test;host=mysql', 'test', 'test', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>