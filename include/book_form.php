<?php
   $koneksi = mysqli_connect('localhost', 'root', '', 'admin_noempak');
   
   $nama = $_POST['nama'];
   $email = $_POST['email'];
   $telepon = $_POST['telepon'];
   $alamat = $_POST['alamat'];
   $id_package = $_POST['package'];
   $tamu = $_POST['tamu'];
   $pemberangkatan = $_POST['pemberangkatan'];
   $meninggalkan = $_POST['meninggalkan'];

   $sql = " INSERT INTO `booking` (`nama`, `email`, `telepon`, `alamat`, `id_package`, `tamu`, `pemberangkatan`,`meninggalkan`) VALUES ('$nama', '$email', '$telepon', '$alamat', '$id_package', '$tamu','$pemberangkatan','$meninggalkan') ";
   mysqli_query($koneksi, $sql);
   header('location:../?include=book&success=true#konfirmasi_booking');
?>
