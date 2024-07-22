<?php
//  include('../koneksi/koneksi.php');
if (isset($_SESSION['id_user'])) {
   $id_user = $_SESSION['id_user'];
}
// $id_user = $_POST['kategori_blog'];
// $tanggal = $_POST['tanggal'];
$judul = $_POST['judul'];
$deskripsi = $_POST['deskripsi'];

if (empty($judul)) {
   header("Location:index.php?include=tambah-blog&notif=tambahkosong");
} else {
   $sql = "INSERT INTO `blog` 
      (`id_user`, `tanggal`, `judul`,`deskripsi`)
      VALUES ('$id_user', '$tanggal', '$judul','$deskripsi')";
   //echo $sql;
   mysqli_query($koneksi, $sql);
   $id_blog = mysqli_insert_id($koneksi);
   header("Location:index.php?include=blog&notif=tambahberhasil");
}
