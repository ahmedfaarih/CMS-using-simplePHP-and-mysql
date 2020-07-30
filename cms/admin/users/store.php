<?php
	session_start();
 // if(! isset($_SESSION['user_logged_in'])){
  //  header('location: http://localhost/cms/admin/sign-in.php');
 // }
	require('../../database.php');
	
	$name = mysqli_real_escape_string($db_link, $_POST['name']);
	$email = mysqli_real_escape_string($db_link, $_POST['email']);
	$password = mysqli_real_escape_string($db_link, $_POST['password']);
	$dob = mysqli_real_escape_string($db_link, $_POST['dob']);

	$password = password_hash($password, PASSWORD_DEFAULT);

	$query = "INSERT INTO users
			(Name, Email, Password, DOB)
			VALUES ('$name', '$email', '$password', '$dob')";

	mysqli_query($db_link, $query);

	//echo mysqli_error($db_link);

	header('location: http://localhost/cms/admin/users/');
?>