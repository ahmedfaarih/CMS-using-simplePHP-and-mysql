<?php 
	session_start();
 // if(! isset($_SESSION['user_logged_in'])){
 //   header('location: http://localhost/cms/admin/sign-in.php');
 // }
	
    require('../partials/header.php');
    require('../../database.php');

    $id = $_GET['id'];

    $query = "SELECT * FROM users WHERE UserId = $id";

    $result = mysqli_query($db_link, $query);

    $data = mysqli_fetch_assoc($result);
?>		
	<h1 class="h2">Edit User</h1>

	<form action="http://localhost/cms/admin/users/update.php?id=<?php echo $data['UserId'] ?>" method="POST">
		
		<div class="form-group">
			<label for="name">Name</label>
			<input type="text" class="form-control" id="name" name="name" required value="<?php echo $data['Name'] ?>">
		</div>

		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" class="form-control" id="email" name="email" required value="<?php echo $data['Email'] ?>">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password">
		</div>

		<div class="form-group">
			<label for="dob">Date of Birth</label>
			<input type="date" class="form-control" id="dob" name="dob" required value="<?php echo $data['DOB'] ?>">
		</div>

		<div class="btn-group">
			<button class="btn btn-primary">Update</button>
			<a href="http://localhost/cms/admin/posts/" class="btn btn-danger">Cancel</a>
		</div>

	</form>


<?php 
    require('../partials/footer.php');
?>