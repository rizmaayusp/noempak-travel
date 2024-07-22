<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_SESSION['id_package'])) {
    $id_package = $_SESSION['id_package'];
    $foto = $_POST['foto'];
    $nama_destinasi = $_POST['nama_destinasi'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];


    if (empty($id_package)) {
        header("Location:index.php?include=edit-package&data=$id_package&notif=editkosong");
    } else {
        $sql = "UPDATE `package` set 
        `id_package`='$id_package',
        `foto`='$foto',
        `nama_destinasi`='$nama_destinasi',
        `deskripsi`='$deskripsi',
        `harga`='$harga'
        WHERE `id_package`='$id_package'";
        mysqli_query($koneksi, $sql);

        header("Location:index.php?include=package&notif=editberhasil");
    }
}
