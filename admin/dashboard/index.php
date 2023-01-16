<?php
ob_start();
include("../includes/session.php");
include("../includes/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | Dashboard</title>

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

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="../../assets/images/futo_logo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

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
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../dashboard/">Home</a></li>
                  <li class="breadcrumb-item active">Dashboard</li>
                </ol>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
              <div class="col-lg-3 col-6">
                <!-- Number of complaints-->
                <div class="small-box bg-primary">
                  <div class="inner">
                    <?php
                    $query = "SELECT * FROM complaint";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($result);
                    if ($row > 0) {
                      echo "<h3>" . $row . "</h3>";
                    } else {
                      echo "<h5>No records available yet</h5>";
                    }
                    ?>
                    <p>Total complaints</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-comments"></i>
                  </div>
                  <a href="../complaints/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- Closed complaint -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <?php
                    $query = "SELECT * FROM complaint WHERE status='Closed'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($result);
                    if ($row > 0) {
                      echo "<h3>" . $row . "</h3>";
                    } else {
                      echo "<h5>No records available yet</h5>";
                    }
                    ?>

                    <p>Closed complaints</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-comments"></i>
                  </div>
                  <a href="../complaints/closedComplaints.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- Processing complaint -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <?php
                    $query = "SELECT * FROM complaint WHERE status = 'Processing'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($result);
                    if ($row > 0) {
                      echo "<h3>" . $row . "</h3>";
                    } else {
                      echo "<h5>No records available yet</h5>";
                    }
                    ?>
                    <p>Processing complaints</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-comments"></i>
                  </div>
                  <a href="../complaints/processingComplaints.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- Open complaints -->
                <div class="small-box bg-danger">
                  <div class="inner">
                    <?php
                    $query = "SELECT * FROM complaint WHERE status = 'Open'";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_num_rows($result);
                    if ($row > 0) {
                      echo "<h3>" . $row . "</h3>";
                    } else {
                      echo "<h5>No records available yet</h5>";
                    }
                    ?>

                    <p>Open complaints</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-comments"></i>
                  </div>
                  <a href="../complaints/openComplaints.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            </div>
            <hr>

            <!-- /.row -->
            <!-- /.row (main row) -->
          </div><!-- /.container-fluid -->
        </section>
        <!--  -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- Administrators list -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">
                      <?php
                      if ($admin_info['category'] == 'Admin') {
                        echo "<h3>List of Complaints</h3>";
                      } else {
                        echo "<h4>Complaints for " . $admin_info['category'] . "&nbsp;Category</h4>";
                      }

                      ?>
                    </h3>
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
                          $query = mysqli_query($conn, "SELECT complaint.*,user.fullName AS userID,category.categoryName AS category FROM complaint JOIN user ON user.userID=complaint.userID JOIN category ON category.categoryID=complaint.category") or die(mysqli_error($conn));
                        } else {
                          $query = mysqli_query($conn, 'SELECT complaint.*,user.fullName AS userID,category.categoryName AS category FROM complaint JOIN user ON user.userID=complaint.userID JOIN category ON category.categoryID=complaint.category WHERE categoryName ="' . $admin_info['category'] . '"');
                        }
                        while ($row = mysqli_fetch_array($query)) {
                        ?>
                          <tr>
                            <td><?php echo htmlentities($row["complaintID"]); ?></td>
                            <td><?php echo htmlentities($row["userID"]); ?></td>
                            <td><?php echo htmlentities($row["category"]); ?></td>
                            <td><?php echo htmlentities($row["complaintType"]); ?></td>
                            <td><?php echo htmlentities($row["complaintTitle"]); ?></td>
                            <td><?php echo htmlentities($row["complaintDate"]); ?></td>
                            <?php
                            if ($row["status"] == 'Open') {
                              echo "<td><span class='badge bg-danger'>" . $row['status'] . "</span></td>";
                            } else if ($row["status"] == 'Processing') {
                              echo "<td><span class='badge bg-warning'>" . $row['status'] . "</span></td>";
                            } else if ($row["status"] == 'Closed') {
                              echo "<td><span class='badge bg-success'>" . $row['status'] . "</span></td>";
                            }
                            ?>
                            <td>
                              <a type="button" rel="tooltip" title="View" href="../complaints/viewComplaints.php?id=<?php echo $row["complaintID"]; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> More Details</a>
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

<?php include("../includes/scripts.php"); ?>
</body>

</html>