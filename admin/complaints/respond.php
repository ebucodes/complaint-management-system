<?php
ob_start();
include("../includes/session.php");
?>
<?php
include("../includes/config.php");
    $complaintNumber=$_GET['id'];
 if (isset($_POST["response"])) {
    $complaintNumber=$_POST['complaintNumber'];
    $complaintStatus=$_POST['complaintStatus'];
    $complaintResponse=$_POST['complaintResponse'];
    $responseDate=date("Y/m/d");
    $query=mysqli_query($conn,"INSERT INTO response (complaintNumber, complaintStatus, complaintResponse, responseDate) VALUES('$complaintNumber','$complaintStatus','$complaintResponse','$responseDate')");
    if ($query) {
    ?>
            <script>
                setTimeout(function() {
                        swal({
                            title: "Congratulations!!!",
                            text: "Registration was successfully.",
                            icon: "success",
                            button: "OK",
                            
                        });
                    },
                    100);
            </script>
    <?php
    } else{
    ?>
        <script>
            setTimeout(function() {
                    swal("Error!", "Not successful", "error");
                },
                100);
        </script>  
    <?php
    }
    $sql=mysqli_query($conn,"UPDATE complaint SET status='$complaintStatus' WHERE complaintID='$complaintNumber'");
    $message = "<p class='card-text alert alert-success'>Status changed to <b>$complaintStatus</b></p>";
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | More Details</title>

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
  <div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <!-- Administrators list -->
            <div class="card card-dark">
              <div class="card-header">
                <h4 class="card-title">Complaint Number: <?php echo htmlentities($_GET['id']); ?></h4>
              </div>
              <!-- /.card-header -->
              <form class="form-signin" method="post">
                <div class="card-body">
                    <?php 
                        if (isset($message)) {
                            echo $message;
                        }
                    ?>
                    <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                        <label>Complaint Number</label>
                        <input type="text" name="complaintNumber" class="form-control" value="<?php echo $complaintNumber; ?>" readonly>                   
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">                 
                        <label>Status</label>&nbsp;<span style='color: red;'>*</span>
                        <select class="form-control select2" name="complaintStatus" style="width: 100%;" required>
                            <option hidden>Select....</option>
                            <option>Open</option>
                            <option>Processing</option>
                            <option>Closed</option>
                        </select>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- Level of Study -->
                    <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                        <label>Response</label>&nbsp;<span style='color: red;'>*</span>
                        <textarea name="complaintResponse" id="" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer justify-content-between">
                    <button type="submit" name="response" class="btn bg-gradient-success"><i class="fas fa-save"></i> Submit</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a type="button" class="btn bg-gradient-danger" href="../responses/"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
              </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
