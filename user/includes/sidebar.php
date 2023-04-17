<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../assets/images/futo_logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">FUTO Complaint</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../assets/images/futo_logo.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">NAME:
        <a href="editProfile.php" class="d-block"><?php echo $user_info["fullName"]; ?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item menu-open">
          <a href="dashboard.php" class="nav-link active">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cog"></i>
            <p>
              Account Settings
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="editProfile.php" class="nav-link">
                <i class="fas fa-user-edit nav-icon"></i>
                <p>Edit Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="changePassword.php" class="nav-link">
                <i class="fas fa-lock  nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="lodgeComplaint.php" class="nav-link">
            <i class="nav-icon fas fa-comments"></i>
            <p>
              Lodge Your Complaint
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="complaintHistory.php" class="nav-link">
            <i class="nav-icon fas fa-history"></i>
            <p>
              Complaint History
            </p>
          </a>
        </li>
        <!-- <li class="nav-item">
            <a href="publicComplaint.php" class="nav-link">
            <i class="nav-icon fa fa-globe" aria-hidden="true"></i>
              <p>
              Public Complaint
              </p>
            </a>
          </li> -->
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>