<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_GET['data'])) {
    $id_booking = $_GET['data'];
    //gat data booking
    $sql = "SELECT `id_booking`, `nama`, `email`, `telepon`, `alamat`, `id_package`, `tamu`, `pemberangkatan`, `meninggalkan`
        FROM `booking` `bk` WHERE `bk`.`id_booking`='$id_booking'";
    $query = mysqli_query($koneksi, $sql);
    while ($data = mysqli_fetch_row($query)) {
        $id_booking = $data[0];
        $nama = $data[1];
        $email = $data[2];
        $telepon = $data[3];
        $alamat = $data[4];
        $id_package = $data[5];
        $tamu = $data[6];
        $pemberangkatan = $data[7];
        $meninggalkan = $data[8];
    }
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-user-tie"></i> Detail Data booking</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=profil">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.php?include=booking">Data booking</a></li>
                    <li class="breadcrumb-item active">Detail Data booking</li>
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
                <a href="index.php?include=booking" class="btn btn-sm btn-warning float-right">
                    <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td width="20%"><strong>Nama<strong></td>
                        <td width="80%"><?php echo $nama; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Email<strong></td>
                        <td width="80%"><?php echo $email; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Telepon<strong></td>
                        <td width="80%"><?php echo $telepon; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Alamat<strong></td>
                        <td width="80%"><?php echo $alamat; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Nama Destinasi<strong></td>
                        <td width="80%"><?php echo $id_package; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Tamu<strong></td>
                        <td width="80%"><?php echo $tamu; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Waktu Pemberangkatan<strong></td>
                        <td width="80%"><?php echo $pemberangkatan; ?></td>
                    </tr>
                    <tr>
                        <td width="20%"><strong>Waktu Kembali<strong></td>
                        <td width="80%"><?php echo $meninggalkan; ?></td>
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