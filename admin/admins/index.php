<?php
ob_start();
include("../includes/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | Administrators</title>

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
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Administrators</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../dashboard/">Home</a></li>
                  <li class="breadcrumb-item active">Administrators</li>
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
                <!-- Add New Administrators -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fa fa-plus-circle"></i>&nbsp;
                      Add New Administrators
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <a type="button" href="addAdmin.php" class="btn bg-gradient-dark"><i class="fa fa-plus-circle"></i> New Administrators</a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- Administrators list -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">List of Administrators</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Name</th>
                          <th>Email Address</th>
                          <th>Phone Number</th>
                          <th>Category</th>
                          <th>Date Registered</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include("../includes/config.php");
                        // Query to get Admin from database
                        $query = ("SELECT * FROM admin");
                        $count = 1;
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                          $admin_id = $row["adminID"];
                        ?>
                          <tr>
                            <td><?php echo htmlentities($count); ?></td>
                            <td><?php echo $row["fullName"]; ?></td>
                            <td><?php echo $row["emailAddress"]; ?></td>
                            <td><?php echo $row["phoneNumber"]; ?></td>
                            <td><?php echo $row["category"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td>
                              <a type="button" rel="tooltip" title="Edit" href="editAdmin.php?id=<?php echo $row["adminID"]; ?>" class="btn btn-success"><i class="fas fa-user-edit"></i> Edit</a>
                            </td>
                            <td>
                              <a type="button" href="deleteAdmin.php?id=<?php echo $row["adminID"]; ?>" class="btnDel btn btn-danger"><i class="fas fa-user-minus"></i> Delete</a>
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
                          <th>Name</th>
                          <th>Email Address</th>
                          <th>Phone Number</th>
                          <th>Category</th>
                          <th>Date Registered</th>
                          <!-- <th>Edit</th> -->
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

<?php include("../includes/scripts.php"); ?>

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": true,
      "autoWidth": true,
      "paging": true,
      "ordering": true,
      "info": true,
      // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  })
</script>
<!-- Delete Admin -->
<script>
  $('.btnDel').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
      title: 'Are you sure?',
      text: 'This user will be deleted?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete Sub Admin',
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