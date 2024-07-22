<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $id_package = $_GET['data'];
    //gat data package
    $sql = "SELECT `id_package`, `foto`, `nama_destinasi`, `deskripsi`, `harga`    
    FROM `package` WHERE `id_package`='$id_package'";
    $query = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_row($query)) {
        $id_package = $data[0];
        $foto = $data[1];
        $nama_destinasi = $data[2];
        $deskripsi = $data[3];
        $harga = $data[4];
    }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-user-tie"></i> Detail Data package</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?include=package">Data package</a></li>
                    <li class="breadcrumb-item active">Detail Data package</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <div class="card-tools">
                <a href="index.php?include=package" class="btn btn-sm btn-warning float-right">
                    <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="20%"><strong>Foto<strong></td>
                        <td width="80%"><img src="foto/<?php echo $foto ?>" class="img-fluid" width="200px;"></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Nama Destinasi<strong></td>
                        <td width="80%"><?php echo $nama_destinasi; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Deskripsi<strong></td>
                        <td width="80%"><?php echo $deskripsi; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Harga<strong></td>
                        <td width="80%"><?php echo $harga; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">&nbsp;</div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->