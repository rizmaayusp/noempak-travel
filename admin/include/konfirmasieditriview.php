<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_SESSION['id_riview'])) {
    $id_riview = $_SESSION['id_riview'];
    $foto = $_POST['foto'];
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    $riview = $_POST['riview'];

    if (empty($id_riview)) {
        header("Location:index.php?include=edit-riview&data=$id_riview&notif=editkosong");
    } else {
        $sql = "UPDATE `riview` set 
        `foto`='$foto',
        `nama`='$nama',
        `status`='$status',
        `riview`='$riview'
        WHERE `id_riview`='$id_riview'";
        mysqli_query($koneksi, $sql);

        header("Location:index.php?include=riview&notif=editberhasil");
    }
}
