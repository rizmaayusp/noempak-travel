<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-10">
  <!-- Brand Logo -->
  <a href="index.php" class="brand-link">
    <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8"> -->
    <span class="brand-text font-weight-dark">
      <center>Noempak Travel</center>
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="index.php?include=profil" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Profil
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview">
          <a href="index.php?include=blog" class="nav-link">
            <i class="nav-icon fas fa-database"></i>
            <p>
              Data Blog
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
        <li class="nav-item">
          <a href="index.php?include=booking" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Data Booking
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?include=riview" class="nav-link">
            <i class="nav-icon fab fa-blogger"></i>
            <p>
              Data Riview
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?include=package" class="nav-link">
            <i class="nav-icon fas fa-file-alt"></i>
            <p>
              Data Package
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
        </li>
        <?php
        if (isset($_SESSION['level'])) {
          if ($_SESSION['level'] == "Superadmin") { ?>
            <li class="nav-item">
              <a href="index.php?include=user" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i>
                <p>
                  Pengaturan User
                  <i class="fas fa-angle-right right"></i>
                </p>
              </a>
            </li>
        <?php }
        } ?>
        <li class="nav-item">
          <a href="index.php?include=ubah-password" class="nav-link">
            <i class="nav-icon fas fa-user-lock"></i>
            <p>
              Ubah Password
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="index.php?include=signout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Sign Out
              <i class="fas fa-angle-right right"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>