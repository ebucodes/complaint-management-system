<?php
ob_start();
include("includes/session.php");
?>

<?php
include("includes/config.php");
if (isset($_POST["changePassword"])) {
  $currentPassword = $_POST["currentPassword"];
  $newPassword = $_POST["newPassword"];
  $confirmPassword = $_POST["confirmPassword"];
  // change according timezone
  date_default_timezone_set('Africa/Lagos');
  $currentTime = date('d-m-Y h:i:s a', time());

  // To check if the user already exists
  // $sql = mysqli_query($conn, "SELECT regNumber,emailAddress,phoneNumber FROM user WHERE regNumber='$regNumber',phoneNumber='$phoneNumber',emailAddress='$emailAddress'");
  $sql = mysqli_query($conn, "SELECT password FROM user WHERE password='$currentPassword' && userID='$session_id'");
  $num = mysqli_fetch_array($sql);

  if ($num > 0) {
    $query = mysqli_query($conn, "UPDATE user SET password='$newPassword', updateDate='$currentTime' WHERE userID=''");
?>
    <script>
      setTimeout(function() {
          swal({
            title: "Congratulations!!!",
            text: "Password changed successfully.",
            icon: "success",
            button: "OK",
          });
        },
        100);
    </script>
  <?php
  } else {
  ?>
    <script>
      setTimeout(function() {
          swal({
            title: "Error!!!",
            text: "Password not changed. Old password incorrect.",
            icon: "error",
            button: "OK",
          });
        },
        100);
    </script>
<?php
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | Change Password</title>

  <title>FUTO Complaint Centre | Registration Form</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Sweetalert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Select2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css" integrity="sha512-3//o69LmXw00/DZikLz19AetZYntf4thXiGYJP6L49nziMIhp6DVrwhkaQ9ppMSy8NWXfocBwI3E8ixzHcpRzw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script>
    function validatePassword() {
      if (document.changePassword.currentPassword.value == "") {
        alert("Current password is empty!!!");
        document.changePassword.currentPassword.focus();
        return false;
      } else if (document.changePassword.newPassword.value == "") {
        alert("New password is empty !!");
        document.changePassword.newPassword.focus();
        return false;
      } else if (document.changePassword.confirmPassword.value == "") {
        alert("Confirm password is empty !!");
        document.changePassword.confirmPassword.focus();
        return false;
      } else if (document.changePassword.newPassword.value != document.changePassword.confirmPassword.value) {
        alert("Password and Confirm Password Field do not match  !!");
        document.changePassword.confirmPassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("includes/sidebar.php"); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- Edit faculty Form -->
          <br>
          <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title"><i class="fas fa-lock"></i>&nbsp;&nbsp;Change Password</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="changePassword.php" name="changePassword" class="form-signin" method="POST" enctype="multipart/form-data" onSubmit="return validatePassword();" novalidate>
                <!--Current Password  -->
                <div class="form-group">
                  <label>Current Password</label>
                  <input type="text" name="currentPassword" id="currentPassword" class="form-control" placeholder="Current Password" required>
                  <div class="invalid-feedback">This field is required.</div>
                </div>
                <!--Old Password  -->
                <div class="form-group">
                  <label>New Password</label>
                  <input type="text" name="newPassword" id="newPassword" class="form-control" placeholder="New Password" required>
                  <div class="invalid-feedback">This field is required.</div>
                </div>
                <!--New Password  -->
                <div class="form-group">
                  <label>Confirm Password</label>
                  <input type="text" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Confirm New Password" required>
                  <div class="invalid-feedback">This field is required.</div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="submit" name="changePassword" class="btn bg-gradient-success"><i class="fas fa-save"></i> Save</button>
                  <a type="button" class="btn bg-gradient-danger" href="dashboard.php"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->
  <!-- Footer -->
  <?php include("includes/footer.php"); ?>

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
  <script>
    // Self-executing function
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('form-signin');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
  </script>
</body>

</html>