<?php 
	session_start();
  //if(! isset($_SESSION['user_logged_in'])){
  //  header('location: http://localhost/cms/admin/sign-in.php');
  //}

	
    require('../partials/header.php');
?>		
	<h1 class="h2">Create New User</h1>s

	<form action="http://localhost/cms/admin/users/store.php" method="POST">
		
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" name="name" required>
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" required>
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" required>
		</div>

		<div class="form-group">
			<label for="dob">Date of Birth</label>
			<input type="date" class="form-control" id="dob" name="dob" required>
		</div>


		<div class="btn-group">
			<button class="btn btn-primary">Save</button>
			<a href="http://localhost/cms/admin/users/" class="btn btn-danger">Cancel</a>
		</div>

	</form>


<?php 
    require('../partials/footer.php');
?>