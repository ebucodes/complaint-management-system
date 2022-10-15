<?php
ob_start();
include("../includes/session.php");
?>
<?php
include("../includes/config.php");
// To check reg number
if (isset($_POST["userNameCheck"])) {
  $userName = $_POST['userName'];
  $userNameEmpty = 0;
  $msg_empty_reg = "";
  $msg_error_reg = "<small class='status-taken' style='color: red;'><i class='fas fa-exclamation-circle'></i> Matriculation/Registration number already in use</small>";
  $msg_success_reg = "<small class='status-available' style='color: green;'><i class='fas fa-check-circle'></i> Matriculation/Registration number is available</small>";
  $userNameQuery = "SELECT * FROM admin WHERE userName = '$userName' ";
  $userNameResult = mysqli_query($conn, $userNameQuery);
  if (mysqli_num_rows($userNameResult) == $userNameEmpty) {
    echo "$msg_empty_reg";
  }
  if (mysqli_num_rows($userNameResult) > ($userNameEmpty)) {
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
  $phoneNumberQuery = "SELECT * FROM admin WHERE phoneNumber = '$phoneNumber' ";
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
  $emailAddressQuery = "SELECT * FROM admin WHERE emailAddress = '$emailAddress' ";
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
// Query for registering a new faculty
if (isset($_POST["addAdmin"])) {
  $fullName = $_POST["fullName"];
  $userName = $_POST["userName"];
  $password = md5($_POST["password"]);
  $emailAddress = $_POST["emailAddress"];
  $phoneNumber = $_POST["phoneNumber"];
  $role = "Sub Admin";
  $category = $_POST["category"];
  $date = date("Y/m/d");

  $query = "INSERT INTO admin (fullName, userName, password, emailAddress, phoneNumber, role, category, date) VALUES ('$fullName','$userName','$password','$emailAddress','$phoneNumber','$role','$category','$date')" or die(mysqli_error($conn));
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
  if ($result) {
?>
    <script>
      setTimeout(function() {
          swal({
            title: "Congratulations!!!",
            text: "<?php echo $fullName ?> was successfully added as an Admin",
            html: true,
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
          swal("Error!", "User not added!", "error");
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
  <title>FUTO Complaints System | Admin</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- DataTable  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" integrity="sha512-BMbq2It2D3J17/C7aRklzOODG1IQ3+MHw3ifzBHMBwGO/0yUqYmsStgBjI0z5EYlaDEFnvYV7gNYdD3vFLRKsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap5.min.css">
  <!-- Sweetalert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">


    <!-- Navbar -->
    <?php include("../includes/navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("../includes/sidebar.php"); ?>
    <!-- Content Wrapper. Contains page content -->
    <?php
    if ($admin_info['category'] == 'Admin') {
    ?>
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Add faculty Form -->
            <div class="card card-dark">
              <div class="card-header">
                <h1 class="card-title"><i class="fa fa-plus-circle"></i> New Admin</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form id="addAdmin" class="form-signin" method="POST" enctype="multipart/form-data" novalidate>
                  <!-- Full Name -->
                  <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="fullName" class="form-control" placeholder="Enter Full Name" required>
                  </div>

                  <!-- Username -->
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="userName" id="userName" class="form-control" placeholder="Enter Username" required>
                  </div>
                  <!-- Password -->
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter password" required>
                    <div class="invalid-feedback">This field is required.</div>
                  </div>
                  <!-- Email Address -->
                  <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="emailAddress" id="emailAddress" class="form-control" placeholder="Enter Email Address" required>
                    <span id="emailAddressStatus"></span>
                  </div>
                  <!-- Phone Number -->
                  <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" class="form-control" placeholder="Enter Phone Number" required>
                    <span id="phoneNumberStatus"></span>
                  </div>
                  <!-- Role -->
                  <div class="form-group">
                    <label>Category</label>
                    <select class="form-control custom-select" name="category" style="width: 100%;" required>
                      <option disabled>Select category</option>
                      <?php $categoryQuery = mysqli_query($conn, "SELECT categoryID,categoryName FROM category");
                      while ($row1 = mysqli_fetch_array($categoryQuery)) {
                      ?>
                        <option value="<?php echo htmlentities($row1['categoryName']); ?>"><?php echo htmlentities($row1['categoryName']); ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <!-- Submit -->
                  <div class="modal-footer justify-content-between">
                    <button type="submit" name="addAdmin" class="btn bg-gradient-success"><i class="fas fa-save"></i> Save</button>
                    <a type="button" class="btn bg-gradient-danger" href="../admins/"><i class="fas fa-arrow-left"></i> Back</a>
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
  <?php include("../includes/footer.php"); ?>
<?php
    } else {
?>
  <script>
    setTimeout(function() {
        swal({
          title: "Error!!!",
          text: "You don't have permission to view this page",
          icon: "error",
          button: "OK",
        }).then(function() {
          window.location = "../index.php";
        });
      },
      100);
  </script>
<?php
    }

?>
<!-- JavaScript -->
<!-- jQuery -->
<script src="../../assets/js/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert -->
<script src="../../assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- jquery-validation -->
<script src="../../assets/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/plugins/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="../../assets/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../assets/js/demo.js"></script>
<?php include("../includes/scripts.php"); ?>
<!-- Form validation -->
<script>
  $(function() {
    $('#addAdmin').validate({
      rules: {
        emailAddress: {
          required: true,
          email: true,
        },
        password: {
          required: true,
        },
        userName: {
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
        password: {
          required: "Please provide a password",
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
    $('#userName').keyup(function(e) {
      // Get the value from the username
      var userName = $('#userName').val();
      // Call AJAX
      $.ajax({
        type: "POST",
        url: "addAdmin.php",
        data: {
          "userNameCheck": 1,
          "userName": userName,
        },
        success: function(data) {
          $('#userNameStatus').html(data);
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
        url: "addAdmin.php",
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
        url: "addAdmin.php",
        data: {
          "emailAddressCheck": 1,
          "emailAddress": emailAddress,
        },
        success: function(data) {
          $('#emailAddressStatus').html(data);
        }
      })

    });

  });
</script>
</body>

</html>