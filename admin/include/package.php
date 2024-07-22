<?php

if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_package = $_GET['data'];
        //hapus package
        $sql_dh = "delete from `package` where `id_package` = '$id_package'";
        mysqli_query($koneksi, $sql_dh);
    }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_package'])) {
    if ($_GET['aksi'] == 'cari') {
        $_SESSION['katakunci_package'] = $_POST['katakunci_package'];
        $katakunci_package = $_SESSION['katakunci_package'];
    }
}
if (isset($_SESSION['katakunci_package'])) {
    $katakunci_package = $_SESSION['katakunci_package'];
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fab fa-packageger"></i> Package</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> Package</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar package</h3>
            <div class="card-tools">
                <a href="index.php?include=tambah-package" class="btn btn-sm btn-info float-right">
                    <i class="fas fa-plus"></i> Tambah package</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="index.php?include=package&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                            <input type="text" class="form-control" id="kata_kunci" name="katakunci_package">
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
                        <div class="alert alert-success" role="alert">
                            Data Berhasil Dihapus</div>
                    <?php } ?>
                <?php } ?>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="5%">No</th>
                        <th width="25%"><strong>Foto</strong>
                            <?php if (!empty($foto)) { ?>
                                <img src="images/<?php echo $foto; ?>" class="img-fluid" width="100px;"><?php } ?>
                        </th>
                        <th width="20%">Nama Destinasi</th>
                        <th width="20%">Deskripsi</th>
                        <th width="20%">Harga</th>
                        <th width="10%">
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
                    //menampilkan data package
                    $sql_p = "SELECT `id_package`, `foto`, `nama_destinasi`, `deskripsi`, `harga`    
                            FROM `package` ";
                    if (isset($katakunci_package) && !empty($katakunci_package)) {
                        $sql_p .= " WHERE `nama_destinasi` LIKE '%$katakunci_package%' ";
                    }
                    $sql_p .= " ORDER BY `nama_destinasi` limit $posisi, $batas";
                    $query_b = mysqli_query($koneksi, $sql_p);
                    $no = $posisi + 1;
                    while ($data_b = mysqli_fetch_row($query_b)) {
                        $id_package = $data_b[0];
                        $foto = $data_b[1];
                        $nama_destinasi = $data_b[2];
                        $deskripsi = $data_b[3];
                        $harga = $data_b[4];
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $foto ?></td>
                            <td><?php echo $nama_destinasi ?></td>
                            <td><?php echo $deskripsi ?></td>
                            <td><?php echo $harga ?></td>
                            <td align="center">
                                <a href="index.php?include=edit-package&data=<?php echo $id_package; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="index.php?include=detail-package&data=<?php echo $id_package; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $judul; ?>?')) window.location.href = 'index.php?include=package&aksi=hapus&data=<?php echo $id_package; ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
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
        $sql_jum = "SELECT `id_package`, `foto`, `nama_destinasi`, `deskripsi`, `harga`    
            from `package` ";
        if (isset($katakunci_package)) {
            $sql_jum .= " WHERE `nama_destinasi` LIKE '%$katakunci_package%'";
        }
        $sql_jum .= " ORDER BY `nama_destinasi`";
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
                    href='index.php?include=package&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                    href='index.php?include=package&halaman=$sebelum'>«</a></li>";
                    }
                    for ($i = 1; $i <= $jum_halaman; $i++) {
                        if ($i > $halaman - 5 and $i < $halaman + 5) {
                            if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=package&halaman=$i'>$i</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                            }
                        }
                    }
                    if ($halaman != $jum_halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=package&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=package&halaman=$jum_halaman'>Last</a></li>";
                    }
                } ?>
            </ul>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->