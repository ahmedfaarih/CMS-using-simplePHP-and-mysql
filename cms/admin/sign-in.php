<?php
  session_start();

  require ('../database.php');

  if(isset($_POST['submit'])){

  $username = mysqli_real_escape_string($db_link ,$_POST['email']);

  $password = $_POST['password'];

  $remember_me = $_POST['remember-me'] ?? false;

  if ($remember_me){
    setcookie('username', $username, time() + (86400*30));
  }


  $query = "SELECT UserId, email, password FROM users Where email = '$username'";

  $result = mysqli_query($db_link , $query);

  $db_user = $result ? mysqli_fetch_assoc($result) : null;

  if ($db_user){
    //checking pass
    if (password_verify($password, $db_user['password'])){
      //user is valid
      $_SESSION['user_logged_in'] = $db_user['UserId'];
      header('location: http://localhost/cms/admin');

    }else{

       $message = "User Name or Password Incorrect";

    }

  } else{

    $message = "User Name or Password Incorrect";

  }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Signin Template · Bootstrap</title>


    <!-- Bootstrap core CSS -->
<link href="http://localhost/cms/admin/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="http://localhost/cms/admin/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">

    <form class="form-signin" method="POST" action="http://localhost/cms/admin/sign-in.php">

      <?php 
            echo isset($message) ? "<div class = 'alert alert-danger'> $message <div> " : '';
      ?>


      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus value="<?php echo $_COOKIE['username']?? '' ?>">

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="remember-me" value="true" > Remember me
        </label>
      </div>

      <button name= 'submit' value = 'true' class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      

    </form>
</body>
</html>
