<?php
ob_start();
session_start();
include("../admin/includes/config.php");

if (isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $query = ("SELECT * FROM admin WHERE username =  '$username' AND password = '$password'") or die(mysqli_error($conn));
  $result = mysqli_query($conn, $query);
  $fetchArray = mysqli_fetch_array($result);

  if (mysqli_num_rows($result) > 0) {
    $_SESSION["adminID"] = $fetchArray["adminID"];
    include("includes/session.php");
    if ($admin_info['category'] == 'Admin') {
      header("location:./dashboard/");
    } else {
      header("location:./complaints/");
    }

    // header("location:./dashboard/");
  } else {
    $message = "<p class='card-text alert alert-danger'>Invalid username/password combination</p>";
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>FUTO Complaint center | Admin Login </title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha256-wLz3iY/cO4e6vKZ4zRmo4+9XDpMcgKOvv/zEU3OMlRo=" crossorigin="anonymous">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="../assets/css/adminLogin.css" rel="stylesheet">
</head>

<body class="text-center">

  <main class="form-signin">
    <form actioon="index.php" method="POST">
      <img class="mb-4" src="../assets/images/futo_logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
      <p>
        <?php
        if (isset($message)) {
          echo $message;
        }
        ?>
      </p>

      <div class="form-floating">
        <input type="text" name="username" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Username</label>
      </div>
      <br>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    </form>
  </main>

</body>

</html>