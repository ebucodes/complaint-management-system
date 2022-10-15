<?php
ob_start();
include("../includes/session.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | Complaints</title>
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Complaints</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../dashboard/">Home</a></li>
              <li class="breadcrumb-item active">Complaints</li>
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
                <h3 class="card-title">List of Closed Complaints</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-sm">
                  <thead>
                  <tr>
                    <th>Complaint Number</th>
                    <th>Student Name</th>
                    <th>Category</th>
                    <th>Complaint Type</th>
                    <th>Complaint Title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Details</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                      if ($admin_info['category'] == 'Admin') {
                        $query = mysqli_query($conn, "SELECT complaint.*,user.fullName AS userID,category.categoryName AS category FROM complaint JOIN user ON user.userID=complaint.userID JOIN category ON category.categoryID=complaint.category") or die(mysqli_error());
                      } else {
                        $query=mysqli_query($conn,'SELECT complaint.*,user.fullName AS userID,category.categoryName AS category FROM complaint JOIN user ON user.userID=complaint.userID JOIN category ON category.categoryID=complaint.category WHERE status="Closed" AND categoryName ="'.$admin_info['category'].'"');                            
                      }
                      while ($row = mysqli_fetch_array($query)) {
                    ?>
                          <tr>
                            <td><?php echo htmlentities ($row["complaintID"]);?></td>
                            <td><?php echo htmlentities ($row["userID"]); ?></td>
                            <td><?php echo htmlentities ($row["category"]); ?></td>
                            <td><?php echo htmlentities ($row["complaintType"]); ?></td>
                            <td><?php echo htmlentities ($row["complaintTitle"]); ?></td>                           
                            <td><?php echo htmlentities ($row["complaintDate"]); ?></td>
                            <?php 
                              if ($row["status"] == 'Open'){
                                echo "<td><span class='badge bg-danger'>" . $row['status'] . "</span></td>";
                              }
                              else if ($row["status"] == 'Processing'){
                                echo "<td><span class='badge bg-warning'>" . $row['status'] . "</span></td>";
                              }
                              else if ($row["status"] == 'Closed'){
                                echo "<td><span class='badge bg-success'>" . $row['status'] . "</span></td>";
                              }                              
                            ?>
                            <td>
                              <a type="button" rel="tooltip" title="View" href="viewComplaints.php?id=<?php echo $row["complaintID"]; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> More Details</a>
                            </td>

                          </tr>
                    <?php
                      }
                    ?>
                  </tbody>

                  <tfoot>
                  <tr>
                    <th>Complaint Number</th>
                    <th>Student Name</th>
                    <th>Category</th>
                    <th>Complaint Type</th>
                    <th>Complaint Title</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Details</th>
                  </tr>
                  </tfoot>
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
</div>
<!-- ./wrapper -->
<!-- Footer -->
<?php include("../includes/footer.php"); ?>
<!-- JavaScript -->
<!-- jQuery -->
<script src="../../assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<!-- Sweet Alert  -->
<script src="../../assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<?php include("../includes/scripts.php"); ?>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,"paging": true,"ordering": true,"info": true,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  })
</script>

</body>
</html>
