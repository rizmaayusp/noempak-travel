<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_SESSION['id_booking'])) {
    $id_booking = $_SESSION['id_booking'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $id_package = $_POST['package'];
    $tamu = $_POST['tamu'];
    $pemberangkatan = $_POST['pemberangkatan'];
    $meninggalkan = $_POST['meninggalkan'];

    if (empty($nama)) {
        header("Location:index.php?include=edit-booking&data=$id_booking&notif=editkosong");
    } else {
        $sql = "UPDATE `booking` set 
        `nama`='$nama',
        `email`='$email',
        `telepon`='$telepon',
        `alamat`='$alamat',
        `id_package`='$id_package',
        `tamu`='$tamu',
        `pemberangkatan`='$pemberangkatan', 
        `meninggalkan`='$meninggalkan' WHERE `id_booking`='$id_booking'";
        mysqli_query($koneksi, $sql);

        header("Location:index.php?include=booking&notif=editberhasil");
    }
}
