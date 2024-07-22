<?php
$koneksi = mysqli_connect("localhost","root","","admin_noempak");
// cek koneksi
if (!$koneksi){
    die("Error koneksi: " . mysqli_connect_errno());
}
?>