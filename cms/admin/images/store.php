<?php
	session_start();
  if(! isset($_SESSION['user_logged_in'])){
    header('location: http://localhost/cms/admin/sign-in.php');
  }
  
	
	require('../../database.php');
	
	$title = mysqli_real_escape_string($db_link, $_POST['title']);
	$image = $_FILES['image'];
	

	$name = $image['name'];
	$type = $image['type'];
	$size = $image['size']/(1024*1024); //in MB
	$location = $image['tmp_name'];

	$accepted_formats = ['image/png', 'image/jpg' , 'image/jpeg'];

	//only upload images
	if(in_array($type, $accepted_formats)){

		if($size <= 2){	



			$target = '../../uploads/'.$name;
			$url = 'http://localhost/cms/uploads/'.$name;

				if(move_uploaded_file($location, $target)){
					

					$query = "INSERT INTO images (Title, URL)
						VALUES ('$title', '$url')";

					mysqli_query($db_link, $query);

					$_SESSION['message'] = 'New Image succesfully Added';

				}else{
					$_SESSION['message'] = 'New was not added Please try again';

				}

				header('Location: http://localhost/cms/admin/images');

				}else{

					$_SESSION['message']= 'File Size Too Big';
					header('Location: http://localhost/cms/admin/images/create.php');
				}
		}else{
			$_SESSION['message']= 'Unsuported Format';
			header('Location: http://localhost/cms/admin/images/create.php');
		}

?>