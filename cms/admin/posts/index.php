<?php 
    session_start();
  if(! isset($_SESSION['user_logged_in'])){
    header('location: http://localhost/cms/admin/sign-in.php');
  }
  
    require('../partials/header.php');
    require('../../database.php');

    $query = "SELECT * FROM posts";

    $result = mysqli_query($db_link, $query);

 ?>
        <h1 class="h2">Posts</h1>

       	<a href="http://localhost/cms/admin/posts/create.php" class="btn btn-secondary float-right m-2">Add New</a>

        <div>
        	<table class="table table-stripped">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Title</th>
        			<th>Status</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php while($row = mysqli_fetch_assoc($result)): ?>
        		<tr>
        			<td><?php echo $row['PostId'] ?></td>
        			<td><?php echo $row['Title'] ?></td>
        			<td><?php echo $row['Status'] ?></td>
        			<td>
        				<div class="btn-group">
        					<a href="http://localhost/cms/admin/posts/edit.php?id=<?php echo $row['PostId'] ?>" class="btn btn-primary">Edit</a>

        					<a href="http://localhost/cms/admin/posts/destroy.php?id=<?php echo $row['PostId'] ?>" class="btn btn-danger">Delete</a>
        				</div>
        			</td>
        		</tr>
        		<?php endwhile; ?>
        	</tbody>
        </table>
        </div>
        
<?php 
    require('../partials/footer.php');
 ?>
    