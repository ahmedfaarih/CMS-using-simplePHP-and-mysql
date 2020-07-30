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
	$image_id = mysqli_real_escape_string($db_link, $_POST['image']);

	$id = $_GET['id'];

	$query = "UPDATE posts SET
				Title='$title',
				Content='$content',
				Published_Date='$published_date',
				Status='$status'
				WHERE PostId = $id";

	mysqli_query($db_link, $query);

	$query = "UPDATE images_posts SET
				ImageId = $image_id
				WHERE postid = $id";
	mysqli_query($db_link, $query);
	
	//echo mysqli_error($db_link);

	header('location: http://localhost/cms/admin/posts/');
?>