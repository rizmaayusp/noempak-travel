<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3><i class="fas fa-plus"></i> Tambah riview</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php?include=riview">Data riview</a></li>
                    <li class="breadcrumb-item active">Tambah riview</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title" style="margin-top:5px;"><i class="far fa-list-alt"></i> Form Tambah Data riview</h3>
            <div class="card-tools">
                <a href="index.php?include=riview" class="btn btn-sm btn-warning float-right">
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
            <form class="form-horizontal" action="index.php?include=konfirmasi-tambah-riview" method="post">
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
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="nama" id="nama" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="status" id="status" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="riview" class="col-sm-3 col-form-label">Riview</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="riview" id="editor1" rows="12"></textarea>
                        </div>
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