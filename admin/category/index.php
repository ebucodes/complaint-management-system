<?php
ob_start();
include("../includes/session.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | Category</title>

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
                <h1 class="m-0">Category</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="../dashboard/">Home</a></li>
                  <li class="breadcrumb-item active">Category</li>
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
                <!-- Add New Faculty -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">
                      <i class="fa fa-plus-circle"></i>&nbsp;
                      Add New Category
                    </h3>
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <a type="button" href="addCategory.php" class="btn bg-gradient-dark"><i class="fa fa-plus-circle"></i> New Category</a>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <!-- Administrators list -->
                <div class="card card-dark">
                  <div class="card-header">
                    <h3 class="card-title">List of Category</h3>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>S/N</th>
                          <th>Name of Category</th>
                          <th>Date Registered</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        include("../includes/config.php");
                        // Query to get Admin from database
                        $query = ("SELECT * FROM category");
                        $count = 1;
                        $result = mysqli_query($conn, $query);
                        while ($row = mysqli_fetch_array($result)) {
                          $faculty_id = $row["categoryID"];
                        ?>
                          <tr>
                            <td><?php echo htmlentities($count); ?></td>
                            <td><?php echo $row["categoryName"]; ?></td>
                            <td><?php echo $row["date"]; ?></td>
                            <td>
                              <a type="button" rel="tooltip" title="Edit" href="editCategory.php?id=<?php echo $row["categoryID"]; ?>" class="btn btn-success"><i class="fas fa-user-edit"></i> Edit</a>
                            </td>
                            <td>
                              <a type="button" href="deleteCategory.php?id=<?php echo $row["categoryID"]; ?>" class="btnDel btn btn-danger"><i class="fas fa-user-minus"></i> Delete</a>
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
                          <th>Name of Category</th>
                          <th>Date Registered</th>
                          <th>Edit</th>
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
<?php include("../includes/scripts.php"); ?>
<script>
  $('.btnDel').on('click', function(e) {
    e.preventDefault();
    const href = $(this).attr('href')
    Swal.fire({
      title: 'Are you sure?',
      text: 'This category will be deleted?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete Category',
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
        setTimeout(function() {
          swal("Success", "Category deleted successfully!", "success");
        });

      }
    })
  })
</script>
</body>

</html>