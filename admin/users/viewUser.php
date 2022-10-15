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
    <?php
    if ($admin_info['category'] == 'Admin') {
    ?>
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-12">
                <!-- Administrators list -->
                <?php
                $result = mysqli_query($conn, "SELECT * FROM user WHERE fullName='" . $_GET['id'] . "'");
                while ($view_row = mysqli_fetch_array($result)) {
                ?>
                  <div class="card card-dark">
                    <div class="card-header">
                      <h3 class="card-title">
                        <b><?php echo $view_row['fullName']; ?></b> Full Profile
                      </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="example1" cellpadding="0" cellspacing="0" border="0" class="table table-bordered table-striped	 display" width="100%">
                        <tbody>
                          <tr>
                            <th scope="row">Registration Number</th>
                            <td colspan="2"><?php echo $view_row['regNumber']; ?></td>
                            <th scope="row"><b>Name</b>&nbsp;</th>
                            <td colspan="2"><?php echo $view_row['fullName']; ?></td>
                          </tr>
                          <tr>
                            <th>Faculty</th>
                            <?php
                            $faculty = $view_row['faculty'];
                            $queryFaculty = mysqli_query($conn, "SELECT * FROM faculty WHERE facultyID = '$faculty'");
                            while ($rowFaculty = mysqli_fetch_array($queryFaculty)) {
                              $userID = $rowFaculty["userID"];
                            ?>
                              <td><?php echo $rowFaculty['facultyName']; ?></td>
                            <?php
                            }
                            ?>
                            <td><b>Department:</b>&nbsp;</td>
                            <td><?php echo $view_row['department']; ?></td>
                            <th>Level</th>
                            <?php
                            $level = $view_row['level'];
                            $queryLevel = mysqli_query($conn, "SELECT * FROM level WHERE levelName = '$level'");
                            while ($rowLevel = mysqli_fetch_array($queryLevel)) {
                              $userID = $rowLevel["userID"];
                            ?>
                              <td><?php echo $rowLevel['levelName']; ?></td>
                            <?php
                            }
                            ?>
                          </tr>
                          <tr>
                            <td><b>Email Address:</b>&nbsp;</td>
                            <td><?php echo $view_row['emailAddress']; ?></td>
                            <td><b>Phone Number:</b>&nbsp;</td>
                            <td><?php echo $view_row['phoneNumber']; ?></td>
                          </tr>
                          <tr>
                            <td><b>Date registered:</b>&nbsp;</td>
                            <td><?php echo $view_row['date']; ?></td>
                          </tr>
                        </tbody>
                      </table>
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