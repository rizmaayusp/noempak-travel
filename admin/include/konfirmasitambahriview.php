<?php
//  include('../koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
}
// $id_user = $_POST['kategori_riview'];
$id_riview = $_POST['id_riview'];
$foto = $_POST['foto'];
$nama = $_POST['nama'];
$status = $_POST['status'];
$riview = $_POST['riview'];

if (empty($nama)) {
    header("Location:index.php?include=tambah-riview&notif=tambahkosong");
} else {
    $sql = "INSERT INTO `riview` 
      (`id_riview`, `foto`, `nama`, `status`,`riview`)
      VALUES ('$id_riview', '$foto', '$nama', '$status','$riview')";
    //echo $sql;
    mysqli_query($koneksi, $sql);
    $id_riview = mysqli_insert_id($koneksi);
    header("Location:index.php?include=riview&notif=tambahberhasil");
}
