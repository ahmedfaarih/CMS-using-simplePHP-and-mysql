  <?php 
	session_start();
	if(! isset($_SESSION['user_logged_in'])){
		//header('location: http://localhost/cms/admin/sign-in.php');
	}
	require ('../../database.php');
	
    require('../partials/header.php');
?>		
	<h1 class="h2">Create New Post</h1>

	<form action="http://localhost/cms/admin/posts/store.php" method="POST">
		
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" required>
		</div>

		<div class="form-group">
			<label for="Content">Content</label>
			<textarea name="content" id="content" cols="30" rows="10" class="form-control"></textarea>
		</div>

		<div class="form-group">
			<label for="published_date">Published Date</label>
			<input type="date" class="form-control" id="published_date" name="published_date" required>
		</div>

		<div class="form-group">
			<label for="status">Status</label>
			<select name="status" id="status" class="form-control">
				<option value="draft">Draft</option>
				<option value="pending">Pending</option>
				<option value="published">Publish</option>
			</select>
		</div>

		<div class="form-group">
			<label for="image">Select Image</label>
			<select name="image" id="image" class="form-control">
				<?php 
					$query = "SELECT * FROM images";
					$result = mysqli_query($db_link, $query);
					while($row = mysqli_fetch_assoc($result)):
				?>
					<option value="<?php echo $row['ImageId'] ?>"><?php echo $row['Title']?> </option>
				<?php endwhile; ?>
			</select>
		</div>

		<div class="btn-group">
			<button class="btn btn-primary">Save</button>
			<a href="http://localhost/cms/admin/posts/" class="btn btn-danger">Cancel</a>
		</div>

	</form>


<?php 
    require('../partials/footer.php');
?>