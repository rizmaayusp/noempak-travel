<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $id_package = $_GET['data'];
    $_SESSION['id_package'] = $id_package;
    //get data package
    $sql_p = "SELECT  `id_package`, `foto`, `nama_destinasi`, `deskripsi` , `harga` FROM `package` WHERE `id_package`='$id_package'";
    $query_p = mysqli_query($koneksi, $sql_p);
    while ($data_b = mysqli_fetch_row($query_p)) {
        $id_package = $data_b[0];
        $foto = $data_b[1];
        $nama_destinasi = $data_b[2];
        $deskripsi = $data_b[3];
        $harga = $data_b[4];
    }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-edit"></i> Edit Data package</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=package">Data package</a></li>
                    <li class="breadcrumb-item active">Edit Data package</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Edit Data package</h3>
            <div class="card-tools">
                <a href="index.php?include=package" class="btn btn-sm btn-warning float-right">
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
        <form class="form-horizontal" action="index.php?include=konfirmasi-edit-package" method="post">
            <div class="card-body">
                <div class="form-group row">
                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                    <div class="col-sm-7">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="foto" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_destinasi" class="col-sm-3 col-form-label">Nama Destinasi</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="nama_destinasi" id="nama_destinasi" value="<?php echo $nama_destinasi; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="deskripsi" id="editor1" rows="12"><?php echo $deskripsi; ?></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="harga" id="harga" value="<?php echo $harga; ?>">
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