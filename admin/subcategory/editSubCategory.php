<?php
ob_start();
include("../includes/session.php");
?>

<?php
include("../includes/config.php");
// Edit User
if (isset($_POST["editSubCategory"])) {
    $category = $_POST["category"];
    $subcategoryName = $_POST["subcategoryName"];
    $id = intval($_GET["id"]);
    $query1 = "UPDATE subcategory SET subcategoryName='$subcategoryName' WHERE subcategoryID='$id'";
    $result1 = mysqli_query($conn, $query1);
    if ($result1) {
    ?>
        <script>
            setTimeout(function() {
                    swal("Success", "Sub Category edited successfully!", "success");
                },
                100);
        </script>
    <?php
    } else {
    ?>
        <script>
            setTimeout(function() {
                    swal("Error!", "Sub Category not edited!", "error");
                },
                100);
        </script>
<?php
    }
    // $query2 = mysqli_query($conn, "UPDATE subcategory SET categoryID='$category' WHERE subcategoryID='$id'");
    // if ($query2) {
    //   echo "YES";
    // } else {
    //   echo "NO";
    // }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FUTO Complaints System | SubCategory</title>

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
        <!-- Edit SubCategory Form -->
        <div class="card card-dark">
          <div class="card-header">
            <h1 class="card-title"><i class="fa fa-plus-circle"></i> Edit SubCategory</h1>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">                                
              <form class="form-signin" method="POST" enctype="multipart/form-data" novalidate>
                <?php
                  include("../includes/config.php");
                  $id = $_GET["id"];
                  $edit = mysqli_query($conn, "SELECT category.categoryID,category.categoryName,subcategory.subcategoryName FROM subcategory JOIN category ON category.categoryID=subcategory.categoryID WHERE subcategory.subcategoryID='$id'");
                  while ($edit_row = mysqli_fetch_array($edit)) {
                ?>
                <!-- Faculty -->
                <div class="form-group">
                        <label>Category</label>
                            <select name="category" id="role" class="form-control custom-select" required>
                                 <option value="<?php echo $edit_row["categoryID"]; ?>"><?php echo $edit_row["categoryName"]; ?></option>
                                
                            </select>
                            <div class="invalid-feedback">This field is required.</div>
                </div>
                <!-- SubCategory -->
                <div class="form-group">
                  <label>SubCategory</label>
                  <input type="text" name="subcategoryName" id="subcategoryName" value="<?php echo $edit_row['subcategoryName']; ?>" class="form-control" placeholder="Enter Name" required>
                  <div class="invalid-feedback">This field is required.</div>
                </div>

                <div class="modal-footer justify-content-between">
                  <button type="submit" name="editSubCategory" class="btn bg-gradient-success"><i class="fas fa-save"></i> Edit</button>
                  <a type="button" class="btn bg-gradient-danger" href="../subcategory/"><i class="fas fa-arrow-left"></i> Back</a>
                </div>

                <?php
                    }
                ?>
              </form>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
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
                        }).then(function(){
                          window.location ="../index.php";
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
