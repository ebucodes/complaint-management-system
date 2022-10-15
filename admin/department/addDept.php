<?php
ob_start();
include("../includes/session.php");
?>

<?php
ob_start();
include("../includes/config.php");
// Query for registering a new department
if (isset($_POST["addDepartment"])) {
    $faculty = $_POST["faculty"];
    $departmentName = $_POST["departmentName"];
    $date = date("Y/m/d");
    // $query = ($conn, "INSERT INTO department(facultyID, departmentName, date) VALUES ('$id,'$category','$subcat'')");
    

    $query = "INSERT INTO department (facultyID, departmentName, date) VALUES ('$faculty','$departmentName','$date')" or die(mysqli_error($conn));
    $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if ($result) {
    ?>
            <script>
                setTimeout(function() {
                        swal({
                            title: "Congratulations!!!",
                            text: "<?php echo $departmentName ?> was successfully added as a Department",
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
                        swal("Error!", "Department not added!", "error");
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
  <title>FUTO Complaints System | Department</title>

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
        <!-- Edit faculty Form -->
        <div class="card card-dark">
          <div class="card-header">
            <h1 class="card-title"><i class="fa fa-plus-circle"></i> New Department</h1>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
                <form action="addDept.php" class="form-signin" method="POST" enctype="multipart/form-data" novalidate>
                <!-- Faculty -->
                <div class="form-group">
                        <label>Faculty</label>
                        <select name="faculty" class="form-control" id="" required>
                          <?php
                            include("../includes/config.php"); 
                            $sql = ("SELECT * FROM faculty");
                            $result1 = mysqli_query($conn, $sql);
                              while ($row=mysqli_fetch_array($result1)) {
                          ?>
                          <option value="<?php echo $row['facultyID'];?>"><?php echo $row['facultyName'];?></option>
                          <?php
                              }
                          ?>
                        </select>
                        <div class="invalid-feedback">This field is required.</div>
                </div>
                <!--Department  -->
                <div class="form-group">
                        <label>Department</label>
                        <input type="text" name="departmentName" id="departmentName" class="form-control" placeholder="Enter Name" required>
                        <div class="invalid-feedback">This field is required.</div>
                </div>

                    <div class="modal-footer justify-content-between">
                        <button type="submit" name="addDepartment" class="btn bg-gradient-success"><i class="fas fa-save"></i> Save</button>
                        <a type="button" class="btn bg-gradient-danger" href="../department/"><i class="fas fa-arrow-left"></i> Back</a>
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
