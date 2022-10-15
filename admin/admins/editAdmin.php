<?php
ob_start();
include("../includes/session.php");
?>

<?php
include("../includes/config.php");
// Edit User
if (isset($_POST["editAdmin"])) {
  $id = $_GET["id"];
  $fullName = $_POST["fullName"];
  $userName = $_POST["userName"];
  $emailAddress = $_POST["emailAddress"];
  $phoneNumber = $_POST["phoneNumber"];
  $role = $_POST["role"];

  $query = "UPDATE admin SET fullName='$fullName', userName='$userName', emailAddress='$emailAddress', phoneNumber='$phoneNumber', role='$role' WHERE adminID='$id'";
  $result = mysqli_query($conn, $query);
  if ($result) {
?>
    <script>
      setTimeout(function() {
          swal("Success", "Admin edited successfully!", "success");
        },
        100);
    </script>
  <?php
  } else {
  ?>
    <script>
      setTimeout(function() {
          swal("Error!", "Admin not edited!", "error");
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
            <!-- Edit Faculty Form -->
            <div class="card card-dark">
              <div class="card-header">
                <h1 class="card-title"><i class="fa fa-plus-circle"></i> Edit Admin</h1>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <form class="form-signin" method="POST" enctype="multipart/form-data" novalidate>
                      <?php
                      include("../includes/config.php");
                      $id = $_GET["id"];
                      $edit = mysqli_query($conn, "SELECT * FROM admin WHERE adminID=$id");
                      while ($edit_row = mysqli_fetch_array($edit)) {
                      ?>
                        <div class="form-group">
                          <label>Full Name</label>
                          <input type="text" name="fullName" id="fullName" value="<?php echo $edit_row['fullName']; ?>" class="form-control" placeholder="Enter Name" required>
                          <div class="invalid-feedback">This field is required.</div>
                        </div>
                        <div class="form-group">
                          <label>Username</label>
                          <input type="text" name="userName" id="userName" value="<?php echo $edit_row['userName']; ?>" class="form-control" placeholder="Enter Name" required>
                          <div class="invalid-feedback">This field is required.</div>
                        </div>

                        <div class="form-group">
                          <label>Email Address</label>
                          <input type="email" name="emailAddress" id="emailAddress" value="<?php echo $edit_row['emailAddress']; ?>" class="form-control" placeholder="Enter Name" required>
                          <div class="invalid-feedback">This field is required.</div>
                        </div>
                        <div class="form-group">
                          <label>Phone Number</label>
                          <input type="number" name="phoneNumber" id="phoneNumber" value="<?php echo $edit_row['phoneNumber']; ?>" class="form-control" placeholder="Enter Name" required>
                          <div class="invalid-feedback">This field is required.</div>
                        </div>
                        <div class="form-group">
                          <label>Role</label>
                          <select name="role" id="role" class="form-control custom-select" required>
                            <option hidden><?php echo $edit_row["role"]; ?></option>
                            <option>Administrators</option>
                            <option>Contributors</option>
                          </select>
                          <div class="invalid-feedback">This field is required.</div>
                        </div>
                        <div class="modal-footer justify-content-between">
                          <button type="submit" name="editAdmin" class="btn bg-gradient-success"><i class="fas fa-save"></i> Edit</button>
                          <a type="button" class="btn bg-gradient-danger" href="../admins/"><i class="fas fa-arrow-left"></i> Back</a>
                        </div>

                      <?php
                      }
                      ?>
                    </form>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
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
<?php include("../includes/scripts.php"); ?>

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