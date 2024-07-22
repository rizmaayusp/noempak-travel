<?php
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_riview = $_GET['data'];
        //hapus riview
        $sql_dh = "delete from `riview` where `id_riview` = '$id_riview'";
        mysqli_query($koneksi, $sql_dh);
    }
}
if (isset($_GET['aksi']) && isset($_POST['katakunci_riview'])) {
    if ($_GET['aksi'] == 'cari') {
        $_SESSION['katakunci_riview'] = $_POST['katakunci_riview'];
        $katakunci_riview = $_SESSION['katakunci_riview'];
    }
}
if (isset($_SESSION['katakunci_riview'])) {
    $katakunci_riview = $_SESSION['katakunci_riview'];
}
?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fab fa-riviewger"></i> riview</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"> riview</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="fas fa-list-ul"></i> Daftar riview</h3>
            <div class="card-tools">
                <a href="index.php?include=tambah-riview" class="btn btn-sm btn-info float-right">
                    <i class="fas fa-plus"></i> Tambah riview</a>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="col-md-12">
                <form method="post" action="index.php?include=riview&aksi=cari">
                    <div class="row">
                        <div class="col-md-4 bottom-10">
                            <input type="text" class="form-control" id="kata_kunci" name="katakunci_riview">
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
                        <th width="20%">Nama</th>
                        <th width="20%">Status</th>
                        <th width="20%">Riview</th>
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
                    //menampilkan data riview
                    $sql_r = "SELECT `id_riview`, `nama`, `status`, `riview`   
                            FROM `riview` ";
                    if (isset($katakunci_riview) && !empty($katakunci_riview)) {
                        $sql_r .= " WHERE `nama` LIKE '%$katakunci_riview%' ";
                    }
                    $sql_r .= " ORDER BY `nama` limit $posisi, $batas";
                    $query_b = mysqli_query($koneksi, $sql_r);
                    $no = $posisi + 1;
                    while ($data_r = mysqli_fetch_row($query_b)) {
                        $id_riview = $data_r[0];
                        $nama = $data_r[1];
                        $status = $data_r[2];
                        $riview = $data_r[3];
                    ?>
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $nama ?></td>
                            <td><?php echo $status ?></td>
                            <td><?php echo $riview ?></td>
                            <td align="center">
                                <a href="index.php?include=edit-riview&data=<?php echo $id_riview; ?>" class="btn btn-xs btn-info" title="Edit"><i class="fas fa-edit"></i></a>
                                <a href="index.php?include=detail-riview&data=<?php echo $id_riview; ?>" class="btn btn-xs btn-info" title="Detail"><i class="fas fa-eye"></i></a>
                                <a href="javascript:if(confirm('Anda yakin ingin menghapus data <?php echo $nama; ?>?')) window.location.href = 'index.php?include=riview&aksi=hapus&data=<?php echo $id_riview; ?>&notif=hapusberhasil'" class="btn btn-xs btn-warning"><i class="fas fa-trash" title="Hapus"></i></a>
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
        $sql_jum = "SELECT `id_riview`, `nama`, `status`, `riview`   
        FROM `riview` ";
        if (isset($katakunci_riview)) {
            $sql_jum .= " WHERE `nama` LIKE '%$katakunci_riview%'";
        }
        $sql_jum .= " ORDER BY `nama`";
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
                    href='index.php?include=riview&halaman=1'>First</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                    href='index.php?include=riview&halaman=$sebelum'>«</a></li>";
                    }
                    for ($i = 1; $i <= $jum_halaman; $i++) {
                        if ($i > $halaman - 5 and $i < $halaman + 5) {
                            if ($i != $halaman) {
                                echo "<li class='page-item'><a class='page-link' 
                            href='index.php?include=riview&halaman=$i'>$i</a></li>";
                            } else {
                                echo "<li class='page-item'><a class='page-link'>$i</a></li>";
                            }
                        }
                    }
                    if ($halaman != $jum_halaman) {
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=riview&halaman=$setelah'>»</a></li>";
                        echo "<li class='page-item'><a class='page-link' 
                        href='index.php?include=riview&halaman=$jum_halaman'>Last</a></li>";
                    }
                } ?>
            </ul>
        </div>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->