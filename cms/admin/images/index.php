<?php 
    session_start();
  if(! isset($_SESSION['user_logged_in'])){
    header('location: http://localhost/cms/admin/sign-in.php');
  }
  
    require('../partials/header.php');
    require('../../database.php');

    $query = "SELECT * FROM images";

    $result = mysqli_query($db_link, $query);

 ?>
        <h1 class="h2">Images</h1>

       	<a href="http://localhost/cms/admin/images/create.php" class="btn btn-secondary float-right m-2">Add New</a>

        <?php 
                echo isset($_SESSION['message']) ? "<div class='alert alert-danger'>".$_SESSION['message']."</div>" : '';
                unset($_SESSION['message']);
        ?>

        <div>
        	<table class="table table-stripped">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Title</th>
        			<th>Image</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php while($row = mysqli_fetch_assoc($result)): ?>
        		<tr>
        			<td><?php echo $row['ImageId'] ?></td>
        			<td><?php echo $row['Title'] ?></td>
        			<td>
                        <img width="200px" src="<?php echo $row['URL'] ?>" alt = "<?php echo $row['ImageId']?>">

                    </td>
        			<td>
        				<div class="btn-group">
        				

        					<a href="http://localhost/cms/admin/images/destroy.php?id=<?php echo $row['ImageId'] ?>" class="btn btn-danger">Delete</a>
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
    