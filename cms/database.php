<?php


	$datababse = 'cmsdb';
	$host = 'localhost';
	$user = 'root';
	$password = '';

	$db_link = mysqli_connect($host, $user, $password, $datababse);

	if(! $db_link) {
		die('Error Connecting to Database!');
	} else {
		
	}
 
?>