<?php
ob_start();
include("../includes/config.php");
// Edit User
if (isset($_POST["editFaculty"])) {
    $id = $_GET["id"];
    $facultyName = $_POST["facultyName"];

    $query = "UPDATE faculty SET facultyName='$facultyName' WHERE facultyID='$id'";
    $result = mysqli_query($conn, $query);
    if ($result) {
?>
        <script>
            setTimeout(function() {
                    swal("Success", "Faculty edited successfully!", "success");
                },
                100);
        </script>
    <?php
    } else {
    ?>
        <script>
            setTimeout(function() {
                    swal("Error!", "Faculty not edited!", "error");
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
  <title>FUTO Complaints System | Faculty</title>

<?php include("../includes/style.php"); ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
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
            <h1 class="card-title"><i class="fa fa-plus-circle"></i> Edit Faculty</h1>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">                                
              <form class="form-signin" method="POST" enctype="multipart/form-data" novalidate>
                <?php
                  include("../includes/config.php");
                  $id = $_GET["id"];
                  $edit = mysqli_query($conn, "SELECT * FROM faculty WHERE facultyID=$id");
                  while ($edit_row = mysqli_fetch_array($edit)) {
                ?>
                <div class="form-group">
                  <label>Name of Faculty</label>
                  <input type="text" name="facultyName" id="facultyName" value="<?php echo $edit_row['facultyName']; ?>" class="form-control" placeholder="Enter Name" required>
                  <div class="invalid-feedback">This field is required.</div>
                </div>

                <div class="modal-footer justify-content-between">
                  <button type="submit" name="editFaculty" class="btn bg-gradient-success"><i class="fas fa-save"></i> Edit</button>
                  <a type="button" class="btn bg-gradient-danger" href="../faculty/"><i class="fas fa-arrow-left"></i> Back</a>
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
                        }).then(function(){
                          window.location ="../index.php";
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
