<?php
ob_start();
include("includes/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaint Centre | User Dashboard</title>
  <?php include("includes/style.php"); ?>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__wobble" src="../assets/images/futo_logo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("includes/sidebar.php"); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Complaint Details</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Complaint Details</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Administrators list -->
              <div class="card card-dark">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-sm">
                    <tbody>
                      <?php
                      $query = mysqli_query($conn, "SELECT complaint.*,category.categoryName AS category FROM complaint JOIN category ON category.categoryID=complaint.category WHERE complaintID='" . $_GET['id'] . "'");
                      while ($row = mysqli_fetch_array($query)) {
                      ?>
                        <div class="row mt">
                          <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Number : </b></label>
                          <div class="col-sm-4">
                            <p><?php echo htmlentities($row['complaintID']); ?></p>
                          </div>
                          <label class="col-sm-2 col-sm-2 control-label"><b>Date of Complaint :</b></label>
                          <div class="col-sm-4">
                            <p><?php echo htmlentities($row['complaintDate']); ?></p>
                          </div>
                        </div>


                        <div class="row mt">
                          <label class="col-sm-2 col-sm-2 control-label"><b>Category :</b></label>
                          <div class="col-sm-4">
                            <p><?php echo htmlentities($row['category']); ?></p>
                          </div>
                          <label class="col-sm-2 col-sm-2 control-label"><b>Sub Category :</b> </label>
                          <div class="col-sm-4">
                            <p><?php echo htmlentities($row['subcategory']); ?></p>
                          </div>
                        </div>

                        <div class="row mt">
                          <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Type :</b></label>
                          <div class="col-sm-4">
                            <p><?php echo htmlentities($row['complaintType']); ?></p>
                          </div>
                          <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Title :</b></label>
                          <div class="col-sm-4">
                            <p><?php echo htmlentities($row['complaintTitle']); ?></p>
                          </div>
                        </div>

                        <div class="row mt">
                          <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Details :</b></label>
                          <div class="col-sm-12">
                            <p><?php echo htmlentities($row['complaintDetails']); ?></p>
                          </div>
                        </div>

                        <div class="row mt">
                          <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Visibility:</b></label>
                          <div class="col-sm-4">
                            <p><?php echo htmlentities($row['complaintVisibility']); ?></p>
                          </div>
                          <label class="col-sm-2 col-sm-2 control-label"><b>Complaint Status :</b></label>
                          <div class="col-sm-4">
                            <?php
                            if ($row["status"] == 'Open') {
                              echo "<p class='badge bg-danger'>" . $row['status'] . "</p>";
                            } else if ($row["status"] == 'Processing') {
                              echo "<p class='badge bg-warning'>" . $row['status'] . "</p>";
                            } else if ($row["status"] == 'Closed') {
                              echo "<p class='badge bg-success'>" . $row['status'] . "</p>";
                            }
                            ?>
                          </div>
                        </div>
                      <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
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

    <!-- Main Footer -->
    <?php include("includes/footer.php"); ?>
  </div>
  <!-- ./wrapper -->
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
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
</body>

</html>