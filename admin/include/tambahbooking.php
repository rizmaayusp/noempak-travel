<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-plus"></i> Tambah booking</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=booking">Data booking</a></li>
                    <li class="breadcrumb-item active">Tambah booking</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data booking</h3>
            <div class="card-tools">
                <a href="index.php?include=booking" class="btn btn-sm btn-warning float-right">
                    <i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            </div>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        </br></br>
        <div class="col-sm-10">
            <div class="col-sm-10">
                <?php if ((!empty($_GET['notif'])) && (!empty($_GET['jenis']))) { ?>
                    <?php if ($_GET['notif'] == "tambahkosong") { ?>
                        <div class="alert alert-danger" role="alert">Maaf data
                            <?php echo $_GET['jenis']; ?> wajib di isi</div>
                    <?php } ?>
                <?php } ?>
            </div>
            <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-booking" method="post">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" id="nama" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="email" id="email" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="telepon" class="col-sm-3 col-form-label">Telepon</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="telepon" id="telepon" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="alamat" id="alamat" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="package" class="col-sm-3 col-form-label">Tujuan Destinasi</label>
                        <div class="col-sm-7">
                            <select class="form-control" id="package" name="package">
                                <option value="">- Pilih Destinasi -</option>
                                <?php
                                $sql_k = "SELECT `id_package`,`nama_destinasi` FROM `package` ORDER BY `id_package`";
                                $query_k = mysqli_query($koneksi, $sql_k);
                                while ($data_k = mysqli_fetch_row($query_k)) {
                                    $id_package = $data_k[0];
                                    $nama_destinasi = $data_k[1];
                                ?>
                                    <option value="<?php echo $id_package; ?>"><?php echo $nama_destinasi; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tamu" class="col-sm-3 col-form-label">Jumlah Tamu</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="tamu" id="tamu" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pemberangkatan" class="col-sm-3 col-form-label">Waktu Pemberangkatan</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="pemberangkatan" id="pemberangkatan" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="meninggalkan" class="col-sm-3 col-form-label">Waktu Kembali</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="meninggalkan" id="meninggalkan" value="">
                        </div>
                    </div>
                </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-info float-right"><i class="fas fa-plus"></i> Tambah</button>
            </div>
        </div>
        <!-- /.card-footer -->
        </form>
    </div>
    <!-- /.card -->

</section>
<!-- /.content -->