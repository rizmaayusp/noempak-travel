<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
  $id_blog = $_GET['data'];
  $_SESSION['id_blog'] = $id_blog;
  //get data blog
  $sql_b = "SELECT  `tanggal`, `judul`, `deskripsi` FROM `blog` WHERE `id_blog`='$id_blog'";
  $query_b = mysqli_query($koneksi, $sql_b);
  while ($data_b = mysqli_fetch_row($query_b)) {
    // $id_blog = $data_b[0];
    $judul = $data_b[1];
    $deskripsi = $data_b[2];
  }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h3><i class="fas fa-edit"></i> Edit Data Blog</h3>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php?include=blog">Data Blog</a></li>
          <li class="breadcrumb-item active">Edit Data Blog</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <div class="card card-info">
    <div class="card-header">
      <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data Blog</h3>
      <div class="card-tools">
        <a href="index.php?include=blog" class="btn btn-sm btn-warning float-right">
          <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
      </div>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    </br></br>
    <div class="col-sm-10">
      <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
        <?php if ($_GET['notif'] == "editkosong") { ?>
          <div class="alert alert-danger" role="alert">Maaf data
            <?php echo $_GET['jenis']; ?> wajib di isi</div>
        <?php } ?>
      <?php } ?>
    </div>
    <form class="form-horizontal" action="index.php?include=konfirmasi-edit-blog" method="post">
      <div class="card-body">
        <div class="form-group row">
          <label for="judul" class="col-sm-3 col-form-label">Judul</label>
          <div class="col-sm-7">
            <input type="text" class="form-control" name="judul" id="judul" value="<?php echo $judul; ?>">
          </div>
        </div>
        <div class="form-group row">
          <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
          <div class="col-sm-7">
            <textarea class="form-control" name="deskripsi" id="editor1" rows="12"><?php echo $deskripsi; ?></textarea>
          </div>
        </div>

      </div>
  </div>

  </div>
  <!-- /.card-body -->
  <div class="card-footer">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-info float-right"><i class="fas fa-save"></i> Simpan</button>
    </div>
  </div>
  <!-- /.card-footer -->
  </form>
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->