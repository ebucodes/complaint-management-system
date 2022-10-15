<?php
include("includes/config.php");
// To check reg number
if (isset($_POST["regNumberCheck"])) {
  $regNumber = $_POST['regNumber'];
  $regNumberEmpty = 0;
  $msg_empty_reg = "";
  $msg_error_reg = "<small class='status-taken' style='color: red;'><i class='fas fa-exclamation-circle'></i> Matriculation/Registration number already in use</small>";
  $msg_success_reg = "<small class='status-available' style='color: green;'><i class='fas fa-check-circle'></i> Matriculation/Registration number is available</small>";
  $regNumberQuery = "SELECT * FROM user WHERE regNumber = '$regNumber' ";
  $regNumberResult = mysqli_query($conn, $regNumberQuery);
  if (mysqli_num_rows($regNumberResult) == $regNumberEmpty) {
    echo "$msg_empty_reg";
  }
  if (mysqli_num_rows($regNumberResult) > ($regNumberEmpty)) {
    echo "$msg_error_reg";
  } else {
    echo "$msg_success_reg";
  }
  exit();
}
// To check phone number
if (isset($_POST["phoneNumberCheck"])) {
  $phoneNumber = $_POST['phoneNumber'];
  $phoneNumberEmpty = 0;
  $msg_empty_phone = "";
  $msg_error_phone = "<small class='status-taken' style='color: red;'><i class='fas fa-exclamation-circle'></i> Phone Number is taken</small>";
  $msg_success_phone = "<small class='status-available' style='color: green;'><i class='fas fa-check-circle'></i> Phone Number is available</small>";
  $phoneNumberQuery = "SELECT * FROM user WHERE phoneNumber = '$phoneNumber' ";
  $phoneNumberResult = mysqli_query($conn, $phoneNumberQuery);
  if (mysqli_num_rows($phoneNumberResult) == $phoneNumberEmpty) {
    echo "$msg_empty_phone";
  }
  if (mysqli_num_rows($phoneNumberResult) > $phoneNumberEmpty) {
    echo "$msg_error_phone";
  } else {
    echo "$msg_success_phone";
  }
  exit();
}
// To check email address
if (isset($_POST["emailAddressCheck"])) {
  $emailAddress = $_POST['emailAddress'];
  $emailAddressEmpty = 0;
  $msg_empty_email = "";
  $msg_error_email = "<small class='status-taken' style='color: red;'><i class='fas fa-exclamation-circle'></i> Email address is taken</small>";
  $msg_success_email = "<small class='status-available' style='color: green;'><i class='fas fa-check-circle'></i> Email address is available</small>";
  $emailAddressQuery = "SELECT * FROM user WHERE emailAddress = '$emailAddress' ";
  $emailAddressResult = mysqli_query($conn, $emailAddressQuery);
  if (mysqli_num_rows($emailAddressResult) == "") {
    echo "$msg_empty_email";
  }
  if (mysqli_num_rows($emailAddressResult) > $emailAddressEmpty) {
    echo "$msg_error_email";
  } else {
    echo "$msg_success_email";
  }
  exit();
}
?>
<?php
include("includes/config.php");
if (isset($_POST["register"])) {
  $regNumber = $_POST["regNumber"];
  $fullName = $_POST["fullName"];
  $faculty = $_POST["faculty"];
  $department = $_POST["department"];
  $level = $_POST["level"];
  $phoneNumber = $_POST["phoneNumber"];
  $emailAddress = $_POST["emailAddress"];
  $password = md5($_POST["password"]);
  $date = date("Y/m/d");

  // To check if the user already exists
  // $sql = mysqli_query($conn, "SELECT regNumber,emailAddress,phoneNumber FROM user WHERE regNumber='$regNumber',phoneNumber='$phoneNumber',emailAddress='$emailAddress'");
  $sql = mysqli_query($conn, "SELECT regNumber FROM user WHERE regNumber='$regNumber'");
  if (mysqli_num_rows($sql) > 0) {
?>
    <script>
      setTimeout(function() {
          swal("Error!", "User already in use!", "error");
        },
        100);
    </script>
    <?php
  } else {
    $query = mysqli_query($conn, "INSERT INTO user (regNumber, fullName, faculty, department, level, phoneNumber, emailAddress, password, date) VALUES('$regNumber', '$fullName', '$faculty', '$department', '$level', '$phoneNumber', '$emailAddress', '$password', '$date')") or die(mysqli_error($conn));
    if ($query) {
      header("location:index.php");
    } else {
    ?>
      <script>
        setTimeout(function() {
            swal("Error!", "User not added!", "error");
          },
          100);
      </script>
<?php
    }
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
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css" integrity="sha512-GQGU0fMMi238uA+a/bdWJfpUGKUkBdgfFdgBm72SUQ6BeyWjoY/ton0tEjH+OSH9iP4Dfh+7HM0I9f5eR0L/4w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
            </div><!-- /.col -->
            <div class="col-sm-6">
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Registration Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="registerForm" class="form-signin" method="POST">

                  <div class="card card-default">
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Matriculation Number</label>
                            <input type="tel" name="regNumber" id="regNumber" class="form-control" placeholder="Matriculation/Registration Number" required>
                            <span id="regNumberStatus"></span>
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Faculty</label>
                            <select class="form-control select2" name="faculty" style="width: 100%;" onChange="getDept(this.value);" required>
                              <option hidden>Select faculty</option>
                              <?php
                              $facultyQuery = mysqli_query($conn, "SELECT facultyID,facultyName FROM faculty");
                              while ($row1 = mysqli_fetch_array($facultyQuery)) {
                              ?>
                                <option value="<?php echo htmlentities($row1['facultyID']); ?>"><?php echo htmlentities($row1['facultyName']); ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullName" id="" class="form-control" placeholder="Full Name (Firstname, Other names and Surname)" required>
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Department</label>
                            <select class="form-control select2" name="department" id="department" style="width: 100%;" required>
                              <option hidden>Select Department</option>
                            </select>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                      <div class="row">
                        <div class="col-md-6">
                          <!-- Level -->
                          <div class="form-group">
                            <label>Current level of study</label>
                            <select class="form-control select2" name="level" style="width: 100%;" required>
                              <option hidden>Select level of study</option>
                              <?php $levelQuery = mysqli_query($conn, "SELECT levelID, levelName FROM level");
                              while ($row2 = mysqli_fetch_array($levelQuery)) {
                              ?>
                                <option value="<?php echo htmlentities($row2['levelID']); ?>"><?php echo htmlentities($row2['levelName']); ?></option>
                              <?php
                              }
                              ?>
                            </select>
                          </div>
                          <!-- /.form-group -->
                          <!-- Email Address -->
                          <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Email address" required>
                            <span id="email_address_status"></span>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Phone Number</label>
                            <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Phone number" required>
                            <span id="phoneNumberStatus"></span>
                          </div>
                          <!-- /.form-group -->
                          <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="" class="form-control" placeholder="Password" required>
                          </div>
                          <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="register" class="btn bg-gradient-primary">Submit</button>
                    <!-- Login -->
                    &nbsp;<br><br>
                    <a href="index.php" class="text-center">I already have an account</a>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->

  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Bootstrap -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js" integrity="sha512-pax4MlgXjHEPfCwcJLQhigY7+N8rt6bVvWLFyUMuxShv170X53TRzGPmPkZmGBhk+jikR8WBM4yl7A9WMHHqvg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- AdminLTE App -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/js/adminlte.min.js" integrity="sha512-KBeR1NhClUySj9xBB0+KRqYLPkM6VvXiiWaSz/8LCQNdRpUm38SWUrj0ccNDNSkwCD9qPA4KobLliG26yPppJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- jquery-validation -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js" integrity="sha512-6S5LYNn3ZJCIm0f9L6BCerqFlQ4f5MwNKq+EthDXabtaJvg3TuFLhpno9pcm+5Ynm6jdA9xfpQoMz2fcjVMk9g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <!-- Sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js" integrity="sha512-RtZU3AyMVArmHLiW0suEZ9McadTdegwbgtiQl5Qqo9kunkVg1ofwueXD8/8wv3Af8jkME3DDe3yLfR8HSJfT2g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- Page specific script -->
  <!-- Get Department from Faculty -->
  <script>
    function getDept(val) {
      $.ajax({
        type: "POST",
        url: "getDept.php",
        data: 'deptID=' + val,
        success: function(data) {
          $("#department").html(data);
        }
      });
    }
  </script>
  <!-- Form validation -->
  <script>
    $(function() {
      $('#registerForm').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
          },
          regNumber: {
            required: true,
            minlength: 11,
            maxlength: 11,
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
          password: {
            required: "Please provide a password",
          },
          regNumber: {
            required: "Please provide your registration number",
            minlength: "Your registration number must be at least 11 numbers",
            maxlength: "Your registration number must be at least 11 numbers",
          },
          phoneNumber: {
            required: "Please provide your phone number",
            minlength: "Your registration number must be at least 11 numbers",
            maxlength: "Your registration number must be at least 11 numbers",
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
  <script>
    $(document).ready(function() {
      // Check reg. number
      $('#regNumber').keyup(function(e) {
        // Get the value from the username
        var regNumber = $('#regNumber').val();
        // Call AJAX
        $.ajax({
          type: "POST",
          url: "register.php",
          data: {
            "regNumberCheck": 1,
            "regNumber": regNumber,
          },
          success: function(data) {
            $('#regNumberStatus').html(data);
          }
        })

      });

    });
  </script>
  <script>
    $(document).ready(function() {
      // Check phone number
      $('#phoneNumber').keyup(function(e) {
        // Get the value from the username
        var phoneNumber = $('#phoneNumber').val();
        // Call AJAX
        $.ajax({
          type: "POST",
          url: "register.php",
          data: {
            "phoneNumberCheck": 1,
            "phoneNumber": phoneNumber,
          },
          success: function(data) {
            $('#phoneNumberStatus').html(data);
          }
        })

      });

    });
  </script>
  <script>
    $(document).ready(function() {
      // Check Email address
      $('#emailAddress').keyup(function(e) {
        // Get the value from the username
        var emailAddress = $('#emailAddress').val();
        // Call AJAX
        $.ajax({
          type: "POST",
          url: "register.php",
          data: {
            "emailAddressCheck": 1,
            "emailAddress": emailAddress,
          },
          success: function(data) {
            $('#email_address_status').html(data);
          }
        })

      });

    });
  </script>
</body>

</html>