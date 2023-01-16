<?php
ob_start();
include("includes/session.php");
?>

<?php
include("includes/config.php");
// Query to register complaint
if (isset($_POST["lodgeComplaint"]) && !empty($_FILES["file"]["name"])) {
  $complaintID = mt_rand(10000, 9999999);
  $userID =  $_SESSION['userID'];
  $category = $_POST["category"];
  $subcategory = $_POST["subcategory"];
  $complaintType = $_POST["complaintType"];
  $complaintTitle = $_POST["complaintTitle"];
  $complaintDetails = $_POST["complaintDetails"];
  $complaintVisibility = $_POST["complaintVisibility"];
  $status = 'Open';
  $complaintDate = date('Y-m-d');

  $targetDir = "/assets/images/uploads/";
  $fileName = basename($_FILES["file"]["name"]);
  $targetFilePath = $targetDir . $fileName;
  // $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
  if (!empty($fileName)) {
    move_uploaded_file($_FILES['file']['name'], $targetFilePath);
  } else {
    $fileName = 'No documents available';
  }

  $query = mysqli_query($conn, "INSERT INTO complaint 
  (complaintID, userID, category, subcategory, complaintType, complaintTitle, complaintDetails, complaintFiles, complaintVisibility, status, complaintDate) VALUES 
  ('$complaintID','$userID','$category','$subcategory', '$complaintType', '$complaintTitle', '$complaintDetails', '$fileName', '$complaintVisibility', '$status','$complaintDate')") or die(mysqli_error($conn));
  if ($query) {
    echo "<script>alert('Your complaint has been sent.')</script>";
  } else {
    echo "<script>alert('Complaint not sent.')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | Lodge Complaints</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Sweetalert -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Select2 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.min.css" integrity="sha512-3//o69LmXw00/DZikLz19AetZYntf4thXiGYJP6L49nziMIhp6DVrwhkaQ9ppMSy8NWXfocBwI3E8ixzHcpRzw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.2.0/css/adminlte.min.css" integrity="sha512-IuO+tczf4J43RzbCMEFggCWW5JuX78IrCJRFFBoQEXNvGI6gkUw4OjuwMidiS4Lm9Q2lILzpJwZuMWuSEeT9UQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">


    <!-- Navbar -->
    <?php include("includes/navbar.php"); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php include("includes/sidebar.php"); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <br>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- SELECT2 EXAMPLE -->
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title"><i class="fas fa-user"></i>&nbsp;<?php echo $user_info["fullName"]; ?>'s Profile</h3>
            </div>
            <!-- /.card-header -->
            <form id="lodgeComplaint" method="post" enctype="multipart/form-data">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Category</label>&nbsp;<span style='color: red;'>*</span>
                      <select class="form-control select2" name="category" onChange="getSubCat(this.value);" style="width: 100%;" required>
                        <option hidden>Select category</option>
                        <?php $categoryQuery = mysqli_query($conn, "SELECT categoryID,categoryName FROM category");
                        while ($row1 = mysqli_fetch_array($categoryQuery)) {
                        ?>
                          <option value="<?php echo htmlentities($row1['categoryID']); ?>"><?php echo htmlentities($row1['categoryName']); ?></option>
                        <?php
                        }
                        ?>
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Complaint Type</label>&nbsp;<span style='color: red;'>*</span>
                      <select class="form-control select2" name="complaintType" style="width: 100%;" required>
                        <option hidden>Select complaint type</option>
                        <option>General</option>
                        <option>Query</option>
                        <option>Suggestion</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Subcategory</label>&nbsp;<span style='color: red;'>*</span>
                      <select class="form-control select2" name="subcategory" id="subcategory" style="width: 100%;" required>
                        <option hidden>Select Subcategory</option>
                      </select>
                    </div>
                    <!-- /.form-group -->
                    <div class="form-group">
                      <label>Complaint Title</label>&nbsp;<span style='color: red;'>*</span>
                      <input type="text" name="complaintTitle" id="" class="form-control" required>
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
                      <label>Complaint Details</label>&nbsp;<span style='color: red;'>*</span>
                      <textarea name="complaintDetails" id="" cols="30" rows="10" class="form-control" required></textarea>
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
                      <small>(If there is any proof or related to support your complaint-screenshots/images only)</small>
                      <input type="file" name="file" accept="image/*" class="form-control">
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <label>Visibility</label>&nbsp;<span style='color: red;'>*</span>
                      <div class="select2-purple">
                        <select class="form-control select2" name="complaintVisibility" style="width: 100%;" required>
                          <option>Public</option>
                          <option>Private</option>
                        </select>
                      </div>
                    </div>
                    <!-- /.form-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer justify-content-between">
                <button type="submit" name="lodgeComplaint" class="btn bg-gradient-success"><i class="fas fa-save"></i> Submit</button>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a type="button" class="btn bg-gradient-danger" href="dashboard.php"><i class="fas fa-arrow-left"></i> Back</a>
              </div>
            </form>
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
  <?php include("includes/footer.php"); ?>
  <!-- JavaScript -->
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
  <?php //include("includes/scripts.php"); 
  ?>
  <!-- Get Department from Faculty -->
  <script>
    function getSubCat(val) {
      $.ajax({
        type: "POST",
        url: "getSubCat.php",
        data: 'subID=' + val,
        success: function(data) {
          $("#subcategory").html(data);
        }
      });
    }
  </script>
  <!-- Form validation -->
  <script>
    $(function() {
      $('#lodgeComplaint').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
          },
          fullName: {
            required: true,
          },
          phoneNumber: {
            required: true,
            minlength: 11,
            maxlength: 11,
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a valid email address",
          },
          phoneNumber: {
            required: "Please provide your phone number",
            minlength: "Your phone number must be at least 11 numbers",
            maxlength: "Your phone number must be at least 11 numbers",
          },
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>

</html>