<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_booking = $_GET['data'];
        //hapus booking
        $sql_dh = "delete from `booking` where `id_booking` = '$id_booking'";
        mysqli_query($koneksi, $sql_dh);
    }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_booking'])) {
    if ($_GET['aksi'] == 'cari') {
        $_SESSION['katakunci_booking'] = $_POST['katakunci_booking'];
        $katakunci_booking = $_SESSION['katakunci_booking'];
    }
}
if (isset($_SESSION['katakunci_booking'])) {
    $katakunci_booking = $_SESSION['katakunci_booking'];
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fab fa-bookingger"></i> booking</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> booking</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar booking</h3>
            <div class="card-tools">
                <a href="index.php?include=tambah-booking" class="btn btn-sm btn-info float-right">
                    <i class="fas fa-plus"></i> Tambah booking</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="index.php?include=booking&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                            <input type="text" class="form-control" id="kata_kunci" name="katakunci_booking">
                        </div>
                        <div class="col-md-5 bottom-10">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i>&nbsp; Search</button>
                        </div>
                    </div><!-- .row -->
                </form>
            </div><br>
            <div class="col-sm-12">
                <?php if (!empty($_GET['notif'])) { ?>
                    <?php if ($_GET['notif'] == "tambahberhasil") { ?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Ditambahkan</div>
                    <?php } else if ($_GET['notif'] == "editberhasil") { ?>
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Diubah</div>
                    <?php } else if ($_GET['notif'] == "hapusberhasil") { ?>
                        <div class="alert alert-success" rofle="alert">
                            Data Berhasil Dihapus</div>
                    <?php } ?>
                <?php } ?>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">
                            <center>No</center>
                        </th>
                        <th width="10%">
                            <center>Nama</center>
                        </th>
                        <th width="10%">
                            <center>Email</center>
                        </th>
                        <th width="10%">
                            <center>Telepon</center>
                        </th>
                        <th width="10%">
                            <center>Alamat</center>
                        </th>
                        <th width="10%">
                            <center>Tujuan Destinasi</center>
                        </th>
                        <th width="10%">
                            <center>Jumlah Tamu</center>
                        </th>
                        <th width="10%">
                            <center>Waktu Pemberangkatan</center>
                        </th>
                        <th width="10%">
                            <center>Waktu Kembali</center>
                        </th>
                        <th width="15%">
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $batas = 2;
                    if (!isset($_GET['halaman'])) {
                        $posisi = 0;
                        $halaman = 1;
                    } else {
                        $halaman = $_GET['halaman'];
                        $posisi = ($halaman - 1) * $batas;
                    }
                    //menampilkan data booking
                    $sql_bk = "SELECT `bk`.`id_booking`, `bk`.`nama`, `bk`.`email`, `bk`.`telepon`, `bk`.`alamat`, `p`.`nama_destinasi`, `bk`.`tamu`, `bk`.`pemberangkatan`, `bk`.`meninggalkan`    
                            FROM `booking` `bk` INNER JOIN `package` `p` ON `bk`.`id_package` = `p`.`id_package` ";
                    if (isset($katakunci_booking) && !empty($katakunci_booking)) {
                        $sql_bk .= " WHERE `bk`.`nama` LIKE '%$katakunci_booking%' || `p`.`id_package` LIKE '%$katakunci_booking%' ";
                    }
                    $sql_bk .= " ORDER BY `bk`.`nama` limit $posisi, $batas";
                    $query_b = mysqli_query($koneksi, $sql_bk);
                    $no = $posisi + 1;
                    while ($data_b = mysqli_fetch_row($query_b)) {
                        $id_booking = $data_b[0];
                        $nama = $data_b[1];
                        $email = $data_b[2];
                        $telepon = $data_b[3];
                        $alamat = $data_b[4];
                        $nama_destinasi = $data_b[5];
                        $tamu = $data_b[6];
                        $pemberangkatan = $data_b[7];
                        $meninggalkan = $data_b[8];
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $nama ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $telepon ?></td>
                            <td><?php echo $alamat ?></td>
                            <td><?php echo $nama_destinasi ?></td>
                            <td><?php echo $tamu ?></td>
                            <td><?php echo $pemberangkatan ?></td>
                            <td><?php echo $meninggalkan ?></td>
                            <td align="center">
                                <a href="index.php?include=edit-booking&data=<?php echo $id_booking; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="index.php?include=detail-booking&data=<?php echo $id_booking; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $id_booking; ?>?')) window.location.href = 'index.php?include=booking&aksi=hapus&data=<?php echo $id_booking; ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
                            </td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <?php
        //hitung jumlah semua data 
        $sql_jum = "SELECT `bk`.`id_booking`, `bk`.`nama`, `bk`.`email`, `bk`.`telepon`, `bk`.`alamat`, `p`.`nama_destinasi`, `bk`.`tamu`, `bk`.`pemberangkatan`, `bk`.`meninggalkan` 
            FROM `booking` `bk` INNER JOIN `package` `p` ON `bk`.`id_package` = `p`.`id_package` ";
        if (isset($katakunci_booking)) {
            $sql_jum .= " WHERE `bk`.`nama` LIKE '%$katakunci_booking%' ";
        }
        $sql_jum .= " ORDER BY `p`.`nama_destinasi`, `bk`.`nama`";
        $query_jum = mysqli_query($koneksi, $sql_jum);
        $jum_data = mysqli_num_rows($query_jum);
        $jum_halaman = ceil($jum_data / $batas);
        ?>
        <div class="card-footer clearfix">
            <ul class="pagination pagination-sm m-0 float-right">
                <?php
                if ($jum_halaman == 0) {
                    //tidak ada halaman
                } else if ($jum_halaman == 1) {
                    echo "<li class='page-item'><a class='page-link'>1</a></li>";
                } else {
                    $sebelum = $halaman - 1;
                    $setelah = $halaman + 1;
                    if ($halaman != 1) {
                        echo "<li class='page-item'><a class='page-link' 
                    href='index.php?include=booking&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                    href='index.php?include=booking&halaman=$sebelum'>«</a></li>";
                    }
                    for ($i = 1; $i <= $jum_halaman; $i++) {
                        if ($i > $halaman - 5 and $i < $halaman + 5) {
                            if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=booking&halaman=$i'>$i</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                            }
                        }
                    }
                    if ($halaman != $jum_halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=booking&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=booking&halaman=$jum_halaman'>Last</a></li>";
                    }
                } ?>
            </ul>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->