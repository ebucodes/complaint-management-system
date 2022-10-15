<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="../../assets/images/futo_logo.png" alt="Admin Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">FUTO Complaints</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../assets/images/futo_logo.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <p style="color: white;"><strong>Name: </strong><?php echo $admin_info["fullName"]; ?></p>
        <p style="color: white;"><strong>Category: </strong><?php echo $admin_info["category"]; ?></p>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <?php 
            if ($admin_info['category'] == 'Admin') {
            ?>
            <li class="nav-item menu-open">
              <a href="../dashboard/" class="nav-link active">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <?php
            } else {
              # code...
            }
            
          ?>
          <!-- Complaints -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-comments"></i>
              <p>
                Complaints
                <i class="fas fa-angle-right right"></i>
                <?php
                  if ($admin_info['category'] == 'Admin') {
                    $query = mysqli_query($conn, "SELECT * FROM complaint");
                    $row = mysqli_num_rows($query);
                    if ($row > 0) {
                      ?>
                      <span class='badge badge-primary right'><?php echo $row; ?></span>
                      <?php
                    } else {
                      ?>
                      <span class='badge badge- right'>0</span>
                      <?php
                    }                   
                  } else {
                    $query = mysqli_query($conn, 'SELECT complaint.*,category.categoryName AS category FROM complaint JOIN category ON category.categoryID=complaint.category WHERE categoryName ="'.$admin_info['category'].'"');
                    $row = mysqli_num_rows($query);
                    if ($row > 0) {
                      ?>
                      <span class='badge badge-primary right'><?php echo $row; ?></span>
                      <?php
                      echo "";
                    } else {
                      ?>
                      <span class='badge badge- right'>0</span>
                      <?php
                    }                   
                  }
                ?>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="../complaints/openComplaints.php" class="nav-link bg-danger">
                  <i class="fas fa-folder-open nav-icon"></i>
                  <?php
                    if ($admin_info['category'] == 'Admin') {
                      $query = mysqli_query($conn, "SELECT * FROM complaint WHERE status='Open'");
                      $row = mysqli_num_rows($query);
                      if ($row > 0) {
                        echo "<span class='badge badge-danger right'>".$row."</span>";
                      } else {
                        # code...
                      }                  
                    } else {
                      $query = mysqli_query($conn, 'SELECT complaint.*,category.categoryName AS category FROM complaint JOIN category ON category.categoryID=complaint.category WHERE status="Open" AND categoryName ="'.$admin_info['category'].'"');
                      $row = mysqli_num_rows($query);
                      if ($row > 0) {
                        ?>
                        <span class='badge badge-danger right'><?php echo htmlentities($row); ?></span>
                        <?php
                      } 
                      else {
                        ?>
                        <span class='badge badge- right'>0</span>
                        <?php
                      }                   
                    }
                  ?>  
                  <p>Open</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../complaints/processingComplaints.php" class="nav-link bg-warning">
                  <i class="fas fa-sync fa-spin nav-icon"></i>
                  <?php
                    if ($admin_info['category'] == 'Admin') {
                      $query = mysqli_query($conn, "SELECT * FROM complaint WHERE status='Processing'");
                      $row = mysqli_num_rows($query);
                      if ($row > 0) {
                        echo "<span class='badge badge-warning right'>".$row."</span>";
                      } else {
                        ?>
                        <span class='badge badge- right'>0</span>
                        <?php
                      }                  
                    } else {
                      $query = mysqli_query($conn, 'SELECT complaint.*,category.categoryName AS category FROM complaint JOIN category ON category.categoryID=complaint.category WHERE status="Processing" AND categoryName ="'.$admin_info['category'].'"');
                      $row = mysqli_num_rows($query);
                      if ($row > 0) {
                        ?>
                        <span class='badge badge-warning right'><?php echo htmlentities($row); ?></span>
                        <?php
                      } else {
                        ?>
                        <span class='badge badge-warning right'>0</span>
                        <?php
                      }                   
                    }
                  ?>  
                  <p>Processing</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="../complaints/closedComplaints.php" class="nav-link bg-success">
                  <i class="fas fa-window-close nav-icon"></i>
                  <?php
                    if ($admin_info['category'] == 'Admin') {
                      $query = mysqli_query($conn, "SELECT * FROM complaint WHERE status='Closed'");
                      $row = mysqli_num_rows($query);
                      if ($row > 0) {
                        ?>
                        <span class='badge badge-success right'><?php echo $row; ?></span>
                        <?php
                      } else {
                        ?>
                        <span class='badge badge-success right'>0</span>
                        <?php
                      }                   
                    } else {
                      $query = mysqli_query($conn, 'SELECT complaint.*,category.categoryName AS category FROM complaint JOIN category ON category.categoryID=complaint.category WHERE status="Closed" AND categoryName ="'.$admin_info['category'].'"');
                      $row = mysqli_num_rows($query);
                      if ($row > 0) {
                        ?>
                        <span class='badge badge-success right'><?php echo $row; ?></span>
                        <?php
                      } else {
                        ?>
                        <span class='badge badge-success right'>0</span>
                        <?php
                      }                   
                    }
                  ?> 
                  <p>Closed</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Admins -->
          <?php 
            if ($admin_info['category'] == 'Admin') {
            ?>
            <li class="nav-item">
              <a href="../admins/" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Admins
                </p>
              </a>
            </li>
            <?php
            } else {
              # code...
            }            
          ?>
          <!-- Faculty -->
          <?php 
            if ($admin_info['category'] == 'Admin') {
            ?>
            <li class="nav-item">
              <a href="../faculty/" class="nav-link">
                <i class="fa fa-university" aria-hidden="true"></i>
                &nbsp;
                <p>
                  Faculty
                </p>
              </a>
            </li>
            <?php
            } else {
              # code...
            }            
          ?>
          <!-- Department -->
          <?php 
            if ($admin_info['category'] == 'Admin') {
            ?>
            <li class="nav-item">
              <a href="../department/" class="nav-link">
                <i class="fa fa-building" aria-hidden="true"></i>
                &nbsp;
                <p>
                  Department
                </p>
              </a>
            </li>
            <?php
            } else {
              # code...
            }            
          ?>
          <!-- Category -->
          <?php 
            if ($admin_info['category'] == 'Admin') {
            ?>
            <li class="nav-item">
              <a href="../category/" class="nav-link">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                &nbsp;
                <p>
                  Category
                </p>
              </a>
            </li>
            <?php
            } else {
              # code...
            }            
          ?>
          <!-- Sub Category -->
          <?php 
            if ($admin_info['category'] == 'Admin') {
            ?>
            <li class="nav-item">
              <a href="../subcategory/" class="nav-link">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
                &nbsp;
                <p>
                Sub Category
                </p>
              </a>
            </li>
            <?php
            } else {
              # code...
            }            
          ?>
          <!-- Users -->
          <?php 
            if ($admin_info['category'] == 'Admin') {
            ?>
            <li class="nav-item">
              <a href="../users/" class="nav-link">
              <i class="fa fa-users" aria-hidden="true"></i>
                &nbsp;
                <p>
                  Users
                </p>
              </a>
            </li>
            <?php
            } else {
              # code...
            }            
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
