<?php
//  include('../koneksi/koneksi.php');
// $id_user = $_POST['kategori_blog'];
// $tanggal = $_POST['tanggal'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$id_package = $_POST['package'];
$tamu = $_POST['tamu'];
$pemberangkatan = $_POST['pemberangkatan'];
$meninggalkan = $_POST['meninggalkan'];

if (empty($nama)) {
    header("Location:index.php?include=tambah-booking&notif=tambahkosong");
} else {
    $sql = "INSERT INTO `booking` 
    (`nama`, `email`, `telepon`, `alamat`, `id_package`, `tamu`, `pemberangkatan`,`meninggalkan`)
    VALUES ('$nama', '$email', '$telepon', '$alamat', '$id_package', '$tamu','$pemberangkatan','$meninggalkan')";
    //echo $sql;
    mysqli_query($koneksi, $sql);
    $id_booking = mysqli_insert_id($koneksi);
    header("Location:index.php?include=booking&notif=tambahberhasil");
}
