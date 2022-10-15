<?php
ob_start();
include("../includes/session.php")
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
          <?php 
            $result=mysqli_query($conn,"SELECT complaint.*,user.fullName AS userID,category.categoryName AS category FROM complaint JOIN user ON user.userID=complaint.userID JOIN category ON category.categoryID=complaint.category WHERE complaint.complaintID='".$_GET['id']."'");
            while ($view_row=mysqli_fetch_array($result)) {
          ?>
            <div class="card card-dark">
              <div class="card-header">
                <h4 class="card-title">Complaint Details</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form id="" method="">
                <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Complaint Number</label>
                        <input type="text" class="form-control" value="<?php echo $view_row['complaintID']; ?>" readonly>                   
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Category</label>
                        <input type="text" class="form-control" value="<?php echo $view_row['category']; ?>" readonly>                                      
                      </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" class="form-control" value="<?php echo $view_row['userID']; ?>" readonly>                   
                      </div>
                      <!-- /.form-group -->
                      <div class="form-group">
                        <label>Sub Category</label>
                        <input type="text" class="form-control" value="<?php echo $view_row['subcategory']; ?>" readonly>                   
                      </div>
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!-- Level of Study -->
                  <div class="row">
                    <div class="col-12 col-sm-12">
                      <div class="form-group">
                        <label>Complaint Details</label>
                        <input type="text" class="form-control" value="<?php echo $view_row['complaintDetails']; ?>" readonly>                   
                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Complaint File(s)</label>
                          <input type="text" class="form-control" href="" value="<?php echo $view_row['complaintFiles']; ?>" readonly>                   
                      </div>

                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Visibility</label>
                        <input type="text" class="form-control" value="<?php echo $view_row['complaintVisibility']; ?>" readonly>                   

                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                  <div class="row">
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Complaint Status</label>
                        <?php 
                          if ($view_row['status'] == 'Open') {
                        ?>
                        <input type="text" class="form-control bg-danger" href="" value="<?php echo $view_row['status']; ?>" readonly>                   
                        <?php
                          } elseif ($view_row['status'] == 'Processing') {
                        ?>
                        <input type="text" class="form-control bg-warning" href="" value="<?php echo $view_row['status']; ?>" readonly>                   
                        <?php
                          } elseif ($view_row['status'] == 'Closed') {
                        ?>
                        <input type="text" class="form-control bg-success" href="" value="<?php echo $view_row['status']; ?>" readonly>                   
                        <?php
                          }
                        ?>
                      </div>

                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6">
                      <div class="form-group">
                        <label>Date of Complaint</label>
                        <input type="text" class="form-control" value="<?php echo $view_row['complaintDate']; ?>" readonly>                   

                      </div>
                      <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                  <!-- /.card-body -->
                <div class="card-footer justify-content-between">
                <?php 
                            if ($admin_info['category'] == 'Admin') {
                              # code...
                            } else {
                              ?>
                              <a href="respond.php?id=<?php echo htmlentities($view_row['complaintID']);?>" target="blank" class="btn bg-gradient-success"><i class="fas fa-reply"></i> Respond To Complaint</a>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                              <a href="../users/viewUser.php?id=<?php echo htmlentities($view_row['userID']);?>" target="blank" class="btn bg-gradient-primary"><i class="fas fa-eye"></i> View Student Details</a>
                              <?php
                            }
                            
                ?>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <a type="button" class="btn bg-gradient-danger" href="../dashboard/"><i class="fas fa-arrow-left"></i> Back</a>
                </div>
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          <?php
            }          
          ?>
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
