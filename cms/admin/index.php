<?php 
	session_start();
	if(! isset($_SESSION['user_logged_in'])){
		header('location: http://localhost/cms/admin/sign-in.php');
	}

    require('partials/header.php');
 ?>
        <h1 class="h2">Dashboard</h1>
        
<?php 
    require('partials/footer.php');
 ?>
    