<?php
//  include('../koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
}
// $id_user = $_POST['kategori_blog'];
$foto = $_POST['foto'];
$nama_destinasi = $_POST['nama_destinasi'];
$deskripsi = $_POST['deskripsi'];
$harga = $_POST['harga'];

if (empty($nama_destinasi)) {
    header("Location:index.php?include=tambah-package&notif=tambahkosong");
} else {
    $sql = "INSERT INTO `package` 
      (`foto`, `nama_destinasi`,`deskripsi`,`harga`)
      VALUES ('$foto', '$nama_destinasi', '$deskripsi','$harga')";
    //echo $sql;
    mysqli_query($koneksi, $sql);
    $id_package = mysqli_insert_id($koneksi);
    header("Location:index.php?include=package&notif=tambahberhasil");
}
