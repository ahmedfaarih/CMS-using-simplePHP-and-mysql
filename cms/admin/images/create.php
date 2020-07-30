<?php 
	session_start();
	if(! isset($_SESSION['user_logged_in'])){
		header('location: http://localhost/cms/admin/sign-in.php');
	}
	 
	
    require('../partials/header.php');
?>		
	<h1 class="h2">Create New Image</h1>

	<?php 
                echo isset($_SESSION['message']) ? "<div class='alert alert-danger'>".$_SESSION['message']."</div>" : '';
                unset($_SESSION['message']);
    ?>


	<form action="http://localhost/cms/admin/images/store.php" method="POST"
	enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
		</div>

		<div class="form-group">
			<label for="image">Select Image</label>
			<input type="file" class="form-control" id="image" name="image" required>
		</div>

		 


		<div class="btn-group">
			<button class="btn btn-primary">Save</button>
			<a href="http://localhost/cms/admin/images/" class="btn btn-danger">Cancel</a>
		</div>

	</form>


<?php 
    require('../partials/footer.php');
?>