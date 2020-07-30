<?php
	session_start();
  if(! isset($_SESSION['user_logged_in'])){
    header('location: http://localhost/cms/admin/sign-in.php');
  }
  
	  
	require('../../database.php');
	
	$title = mysqli_real_escape_string($db_link, $_POST['title']);
	$content = mysqli_real_escape_string($db_link, $_POST['content']);
	$published_date = mysqli_real_escape_string($db_link, $_POST['published_date']);
	$status = mysqli_real_escape_string($db_link, $_POST['status']);
	$image = mysqli_real_escape_string($db_link, $_POST['image']);

	$user_id = $_SESSION['user_logged_in'];

	$query = "INSERT INTO posts
			(Title, Content, Published_Date, Status, UserId)
			VALUES ('$title', '$content', '$published_date', '$status', $user_id)";

	mysqli_query($db_link, $query);

	$post_id = mysqli_insert_id($db_link);
	

	$query = "INSERT INTO images_posts (ImageId, PostId) VALUES ($image, $post_id)";

	mysqli_query($db_link, $query);

	
	//echo mysqli_error($db_link);
	header('location: http://localhost/cms/admin/posts/');
?>