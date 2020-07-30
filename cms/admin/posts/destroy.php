<?php
	session_start();
	if(! isset($_SESSION['user_logged_in'])){
		header('location: http://localhost/cms/admin/sign-in.php');
	}
	
	require('../../database.php');

	$id = $_GET['id'];

	$query = "DELETE FROM posts WHERE PostId = $id";

	mysqli_query($db_link, $query);

	header('location: http://localhost/cms/admin/posts/');
?>	