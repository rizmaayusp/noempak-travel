<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  if ($include == "konfirmasi-login") {
    include("include/konfirmasilogin.php");
  } else if ($include == "signout") {
    include("include/signout.php");
  } else if ($include == "konfirmasi-tambah-booking") {
    include("include/konfirmasitambahbooking.php");
  } else if ($include == "konfirmasi-edit-booking") {
    include("include/konfirmasieditbooking.php");
  } else if ($include == "konfirmasi-tambah-package") {
    include("include/konfirmasitambahpackage.php");
  } else if ($include == "konfirmasi-edit-package") {
    include("include/konfirmasieditpackage.php");
  } else if ($include == "konfirmasi-tambah-riview") {
    include("include/konfirmasitambahriview.php");
  } else if ($include == "konfirmasi-edit-riview") {
    include("include/konfirmasieditriview.php");
  } else if ($include == "konfirmasi-edit-profil") {
    include("include/konfirmasieditprofil.php");
  } else if ($include == "konfirmasi-tambah-user") {
    include("include/konfirmasitambahuser.php");
  } else if ($include == "konfirmasi-edit-user") {
    include("include/konfirmasiedituser.php");
  } else if ($include == "konfirmasi-tambah-blog") {
    include("include/konfirmasitambahblog.php");
  } else if ($include == "konfirmasi-edit-blog") {
    include("include/konfirmasieditblog.php");
  } else if ($include == "konfirmasi-ubah-password") {
    include("include/konfirmasiubahpassword.php");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <?php include("includes/head.php") ?>
</head>
<?php
//cek ada get include
if (isset($_GET["include"])) {
  $include = $_GET["include"];
  //cek apakah ada session id admin
  if (isset($_SESSION['id_user'])) {
?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          if ($include == "edit-profil") {
            include("include/editprofil.php");
          } else if ($include == "blog") {
            include("include/blog.php");
          } else if ($include == "tambah-blog") {
            include("include/tambahblog.php");
          } else if ($include == "edit-blog") {
            include("include/editblog.php");
          } else if ($include == "detail-blog") {
            include("include/detailblog.php");
          } else if ($include == "booking") {
            include("include/booking.php");
          } else if ($include == "tambah-booking") {
            include("include/tambahbooking.php");
          } else if ($include == "edit-booking") {
            include("include/editbooking.php");
          } else if ($include == "detail-booking") {
            include("include/detailbooking.php");
          } else if ($include == "package") {
            include("include/package.php");
          } else if ($include == "tambah-package") {
            include("include/tambahpackage.php");
          } else if ($include == "edit-package") {
            include("include/editpackage.php");
          } else if ($include == "detail-package") {
            include("include/detailpackage.php");
          } else if ($include == "riview") {
            include("include/riview.php");
          } else if ($include == "tambah-riview") {
            include("include/tambahriview.php");
          } else if ($include == "edit-riview") {
            include("include/editriview.php");
          } else if ($include == "detail-riview") {
            include("include/detailriview.php");
          } else if ($include == "user") {
            include("include/user.php");
          } else if ($include == "tambah-user") {
            include("include/tambahuser.php");
          } else if ($include == "edit-user") {
            include("include/edituser.php");
          } else if ($include == "detail-user") {
            include("include/detailuser.php");
          } else if ($include == "ubah-password") {
            include("include/ubahpassword.php");
          } else {
            include("include/profil.php");
          }
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
  <?php
  } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
} else {
  if (isset($_SESSION['id_user'])) {
    //pemanggilan ke halaman-halaman profil jika ada session
  ?>

    <body class="hold-transition sidebar-mini layout-fixed">
      <div class="wrapper">
        <?php include("includes/header.php") ?>
        <?php include("includes/sidebar.php") ?>
        <div class="content-wrapper">
          <?php
          //pemanggilan profil
          include("include/profil.php");
          ?>
        </div>
        <!-- /.content-wrapper -->
        <?php include("includes/footer.php") ?>
      </div>
      <!-- ./wrapper -->
      <?php include("includes/script.php") ?>
    </body>
<?php
  } else {
    //pemanggilan halaman form login
    include("include/login.php");
  }
}
?>

</html>