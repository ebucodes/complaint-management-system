<?php
ob_start();
include("../includes/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | Users</title>
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
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Users</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../users/">Home</a></li>
                  <li class="breadcrumb-item active">Users</li>
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
                    <h3 class="card-title">List of Users</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Registration Number</th>
                          <th>Full Name</th>
                          <th>Department</th>
                          <th>Date Registered</th>
                          <th>View</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include("../includes/config.php");
                        // Query to get Admin from database
                        // $query = ("SELECT * FROM department");
                        $query = ("SELECT * FROM user") or die(mysqli_error($conn));
                        $count = 1;
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                          <tr>
                            <td><?php echo htmlentities($count); ?></td>
                            <td><?php echo htmlentities($row["regNumber"]); ?></td>
                            <td><?php echo htmlentities($row["fullName"]); ?></td>
                            <td><?php echo htmlentities($row["department"]); ?></td>
                            <td><?php echo htmlentities($row["date"]); ?></td>
                            <td>
                              <a type="button" rel="tooltip" title="View" href="viewUser.php?id=<?php echo $row["fullName"]; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> More Details</a>
                              <!-- <button type="button" href="#view<?php //echo $row["id"]; 
                                                                    ?>" data-toggle="modal" class="btn btn-info"><i class="fas fa-eye"></i> View More</button> -->
                              <?php //include("viewUser1.php"); 
                              ?>
                            </td>
                            <td>
                              <a type="button" href="deleteUser.php?id=<?php echo $row["userID"]; ?>" class="btnDel btn btn-danger"><i class="fas fa-user-minus"></i> Delete</a>
                            </td>
                          </tr>

                        <?php
                          $count = $count + 1;
                        }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>S/N</th>
                          <th>Registration Number</th>
                          <th>Full Name</th>
                          <th>Department</th>
                          <th>Date Registered</th>
                          <th>View</th>
                          <th>Delete</th>
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
<!-- JavaScript -->
<!-- jQuery -->
<script src="../../assets/js/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<!-- Sweet Alert  -->
<script src="../../assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<?php include("../includes/scripts.php"); ?>
<script>
  $('.btnDel').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
      title: 'Are you sure?',
      text: 'This department will be deleted?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete User',
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
        setTimeout(function() {
          swal("Success", "User deleted successfully!", "success");
        });

      }
    })
  })
</script>
</body>

</html>