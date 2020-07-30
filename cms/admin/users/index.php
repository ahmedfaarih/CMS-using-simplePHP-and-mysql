<?php 
    session_start();
 // if(! isset($_SESSION['user_logged_in'])){
 //   header('location: http://localhost/cms/admin/sign-in.php');
 // }
  
    require('../partials/header.php');
    require('../../database.php');

    $query = "SELECT * FROM users";

    $result = mysqli_query($db_link, $query);

 ?>
        <h1 class="h2">Users</h1>

       	<a href="http://localhost/cms/admin/users/create.php" class="btn btn-secondary float-right m-2">Add New</a>

        <div>
        	<table class="table table-stripped">
        	<thead>
        		<tr>
        			<th>ID</th>
        			<th>Name</th>
        			<th>Email</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>
        		<?php while($row = mysqli_fetch_assoc($result)): ?>
        		<tr>
                    <td><?php echo $row['UserId'] ?></td>
        			<td><?php echo $row['Name'] ?></td>
        			<td><?php echo $row['Email'] ?></td>
        			<td>
        				<div class="btn-group">
        					<a href="http://localhost/cms/admin/users/edit.php?id=<?php echo $row['UserId'] ?>" class="btn btn-primary">Edit</a>

        					<a href="http://localhost/cms/admin/users/destroy.php?id=<?php echo $row['UserId'] ?>" class="btn btn-danger">Delete</a>
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
    