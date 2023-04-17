<?php
ob_start();
include("includes/session.php");
?>

<?php
include("includes/config.php");
// Edit User
if (isset($_POST["editProfile"])) {
  $fullName = $_POST["fullName"];
  // $faculty = $_POST["faculty"];
  // $department = $_POST["department"];
  $phoneNumber = $_POST["phoneNumber"];
  $emailAddress = $_POST["emailAddress"];
  $level = $_POST["level"];
  $query = ("UPDATE user SET fullName='$fullName', level='$level',phoneNumber='$phoneNumber',emailAddress='$emailAddress' WHERE userID='$session_id'") or die(mysqli_errno($conn));
  $result = mysqli_query($conn, $query);
  if ($result) {
?>
    <script>
      setTimeout(function() {
          swal("Success", "User edited successfully!", "success");
        },
        100);
    </script>
  <?php
  } else {
  ?>
    <script>
      setTimeout(function() {
          swal("Error!", "User not edited!", "error");
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
      <br>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-default">
            <div class="card-header">
              <h3 class="card-title"><?php echo $user_info["fullName"]; ?>'s Profile</h3>
            </div>
            <!-- /.card-header -->
            <form action="" id="editProfile" method="post">
              <?php
              $viewQuery = mysqli_query($conn, "SELECT * FROM user WHERE userID = '$session_id'");
              while ($viewRow = mysqli_fetch_array($viewQuery)) {
              ?>

                <div class="card-body">
                  <h4><b>Last Updated at :</b>&nbsp;&nbsp;<?php echo htmlentities($viewRow['updateDate']); ?></h4>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Registration Number</label>
                        <input type="tel" name="regNumber" value="<?php echo htmlentities($viewRow['regNumber']); ?>" class=form-control readonly>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">

                        <label>Faculty</label>
                        <?php
                        $faculty = $viewRow['faculty'];
                        $queryFaculty = mysqli_query($conn, "SELECT * FROM faculty WHERE facultyID = '$faculty'");
                        while ($rowFaculty = mysqli_fetch_array($queryFaculty)) {
                          // $userID = $rowFaculty["userID"];
                        ?>
                          <input type="text" value="<?php echo $rowFaculty['facultyName']; ?>" class="form-control" readonly>
                        <?php
                        }
                        ?>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="fullName" value="<?php echo htmlentities($viewRow['fullName']); ?>" id="" class="form-control" required>
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Department</label>
                        <input type="text" name="department" value="<?php echo htmlentities($viewRow['department']); ?>" id="" class="form-control" readonly>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Level of Study -->
                  <div class="row">
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Current Level of Study</label>
                        <select class="form-control select2 select2-danger" name="level" data-dropdown-css-class="select2-danger" style="width: 100%;" required>
                          <option hidden><?php echo $viewRow["level"]; ?></option>
                          <?php $levelQuery2 = mysqli_query($conn, "SELECT levelID, levelName FROM level");
                          while ($rowLevel2 = mysqli_fetch_array($levelQuery2)) {
                          ?>
                            <option value="<?php echo htmlentities($rowLevel2['levelName']); ?>"><?php echo htmlentities($rowLevel2['levelName']); ?></option>
                          <?php
                          }
                          ?>
                        </select>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Phone Number</label>
                        <div class="select2-purple">
                          <input type="tel" name="phoneNumber" value="<?php echo htmlentities($viewRow['phoneNumber']); ?>" id="" class="form-control">
                        </div>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Email Address</label>
                        <input type="email" name="emailAddress" value="<?php echo htmlentities($viewRow['emailAddress']); ?>" id="" class="form-control" required>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Date Registered</label>
                        <div class="select2-purple">
                          <input type="datetime" name="date" value="<?php echo htmlentities($viewRow['date']); ?>" class=form-control readonly>
                        </div>
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer justify-content-between">
                  <button type="submit" name="editProfile" class="btn bg-gradient-success"><i class="fas fa-save"></i> Edit</button>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a type="button" class="btn bg-gradient-danger" href="dashboard.php"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
              <?php
              }
              ?>
            </form>
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
  <!-- JavaScript -->
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
  <?php //include("includes/scripts.php"); 
  ?>
  <!-- Form validation -->
  <script>
    $(function() {
      $('#editProfile').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
          },
          fullName: {
            required: true,
          },
          phoneNumber: {
            required: true,
            minlength: 11,
            maxlength: 11,
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a valid email address",
          },
          phoneNumber: {
            required: "Please provide your phone number",
            minlength: "Your phone number must be at least 11 numbers",
            maxlength: "Your phone number must be at least 11 numbers",
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>

</html>