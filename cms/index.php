<?php
require('database.php');

$query = "SELECT posts.PostId, posts.Title, Published_Date, Content, Name, url
			FROM posts, users, images, images_posts
			WHERE posts.UserId = users.UserId
			AND posts.PostId = images_posts.PostId
			AND images.ImageId = images_posts.ImageId
			AND status = 'published'";

$result = mysqli_query($db_link, $query);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>My First Dynamic Blog</title>

	<link rel="stylesheet"  href="http://localhost/cms/admin/css/bootstrap.min.css">

</head>

<body>
		<div class="container">
			<h1 class="h2 text-center my-5">Dynamic Blog</h1>
		</div>
		<hr>
		<?php while($row = mysqli_fetch_assoc($result)):  ?>
		<div class="container">
			<article class="mb-5">
				<h2 class="h4"><?php echo $row['Title']?></h2>
				<p class="small mb-3 text-black-50">
					<?php echo $row['Name']?>| <?php echo $row['Published_Date']?>
				</p>

				<img class="mb-3 img-fluid w-100" src="<?php echo $row['url']?>" alt="<?php echo $row['Title']?>">

				<p><?php echo substr($row['Content'], 0, 200)?></p>

				<a href="http://localhost/cms/article.php?id=<?php echo $row['PostId'] ?>"
				class="btn btn-primary">ReadMore</a>
			</article>

		</div>
	<?php endwhile ?>

</body>
</html>