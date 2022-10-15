<?php
ob_start();
session_start();
include("includes/config.php");

if (isset($_POST["login"])) {
  $regNumber = $_POST["regNumber"];
  $password = md5($_POST["password"]);

  $query = ("SELECT * FROM user WHERE regNumber =  '$regNumber' AND password = '$password'") or die(mysqli_error($conn));
  $result = mysqli_query($conn, $query);
  $fetchArray = mysqli_fetch_array($result);

  if (mysqli_num_rows($result) > 0) {

    $_SESSION["userID"] = $fetchArray["userID"];
    header("location:dashboard.php");
  } else {
?>
    <script>
      setTimeout(function() {
          swal("Error!", "Registration number/password combination incorrect!", "error");
        },
        100);
    </script>
<?php
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
  <title>FUTO Complaint Centre | User Login </title>

  <!-- Bootstrap core CSS -->
  <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

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
    <form action="index.php" method="POST">
      <img class="mb-4" src="../assets/images/futo_logo.png" alt="" width="72" height="57">
      <h1 class="h3 mb-3 fw-normal">Student sign in</h1>

      <div class="form-floating">
        <input type="tel" name="regNumber" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Matriculation/Registration Number</label>
      </div>
      <br>
      <div class="form-floating">
        <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
      </div>

      <button class="w-100 btn btn-lg btn-primary" name="login" type="submit">Sign in</button>
      <br><br>
      <p class="mb-1">
        <a href="forgotPassword.php">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.php" class="text-center">Register a new membership</a>
      </p>
      <p class="mt-5 mb-3 text-muted">&copy; <?php echo date("Y"); ?></p>
    </form>
  </main>

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/pages/dashboard2.min.js" integrity="sha512-/On5eFU1vz1sGgejVpebEmg91zdKYXBcm4HPzDHcKOF1icilwxSR0C1ClBcK9IodnQdow2HjmHnqxt8PdQRrAA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</body>

</html>