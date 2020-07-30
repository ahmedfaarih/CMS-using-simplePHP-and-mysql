<?php 	
	session_start();
	
	$_SESSION['user_logged_in']= null;
 	header('location: http://localhost/cms/admin/sign-in.php');
 	
?>