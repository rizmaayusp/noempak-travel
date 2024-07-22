<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $id_riview = $_GET['data'];
    //gat data riview
    $sql = "SELECT `id_riview`, `foto`, `nama`, `status`, `riview`   
    FROM `riview` WHERE `id_riview`='$id_riview'";
    $query = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_row($query)) {
        $id_riview = $data[0];
        $foto = $data[1];
        $nama = $data[2];
        $status = $data[3];
        $riview = $data[4];
    }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-user-tie"></i> Detail Data riview</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?include=riview">Data riview</a></li>
                    <li class="breadcrumb-item active">Detail Data riview</li>
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
                <a href="index.php?include=riview" class="btn btn-sm btn-warning float-right">
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
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Status<strong></td>
                        <td width="80%"><?php echo $status; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Riview<strong></td>
                        <td width="80%"><?php echo $riview; ?></td>
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