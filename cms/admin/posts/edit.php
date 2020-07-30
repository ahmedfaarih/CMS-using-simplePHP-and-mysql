<?php 
	session_start();
  	if(! isset($_SESSION['user_logged_in'])){
    header('location: http://localhost/cms/admin/sign-in.php');
  }
    require('../partials/header.php');
    require('../../database.php');

    $id = $_GET['id'];

    $query = "SELECT * FROM posts WHERE PostId = $id";

    $result = mysqli_query($db_link, $query);

    $data = mysqli_fetch_assoc($result);
?>		
	<h1 class="h2">Edit Post</h1>

	<form action="http://localhost/cms/admin/posts/update.php?id=<?php echo $data['PostId'] ?>" method="POST">
		
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" class="form-control" id="title" name="title" required value="<?php echo $data['Title'] ?>">
		</div>

		<div class="form-group">
			<label for="Content">Content</label>
			<textarea name="content" id="content" cols="30" rows="10" class="form-control"><?php echo $data['Content'] ?></textarea>
		</div>

		<div class="form-group">
			<label for="published_date">Published Date</label>
			<input type="date" class="form-control" id="published_date" name="published_date" required value="<?php echo $data['Published_Date'] ?>">
		</div>

		<div class="form-group">
			<label for="status">Status</label>
			<select name="status" id="status" class="form-control">
				<option 
				<?php echo $data['Status'] == 'draft' ? 'selected' : '' ?>
				 value="draft">Draft</option>

				<option
				<?php echo $data['Status'] == 'pending' ? 'selected' : '' ?>
				 value="pending">Pending</option>

				<option 
				<?php echo $data['Status'] == 'published' ? 'selected' : '' ?>
				value="published">Publish</option>
			</select>
		</div>

		<div class="form-group">
			<label for="image">Select Image</label>
			<select name="image" id="image" class="form-control">
				<?php 
					$query = "SELECT * FROM images";
					$result_images = mysqli_query($db_link, $query);

					///taking image id from post images table
					$query = "SELECT * FROM image_post WHERE PostId = $id";
					$result_post_image = mysqli_query(db_link, query);
					$post_image = mysqli_fetch_assoc ($result_post_image);

					while($row = mysqli_fetch_assoc($result_images)):
				?>
					<option 
					<?php echo $row['ImageId'] == $post_image['ImageId'] ? 'selected' : '' ?> 
					value="<?php echo $row['ImageId'] ?>">
						<?php echo $row['Title']; ?> 					
				    </option>
				<?php endwhile; ?>

			</select>
		</div>


		<div class="btn-group">
			<button class="btn btn-primary">Update</button>
			<a href="http://localhost/cms/admin/posts/" class="btn btn-danger">Cancel</a>
		</div>

	</form>


<?php 
    require('../partials/footer.php');
?>