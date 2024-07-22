<?php
// session_start();
// include('../koneksi/koneksi.php');
if (isset($_SESSION['id_blog'])) {
    $id_blog = $_SESSION['id_blog'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    if (empty($id_blog)) {
        header("Location:index.php?include=edit-blog&data=$id_blog&notif=editkosong");
    } else {
        $sql = "UPDATE `blog` set 
        `judul`='$judul',
        `deskripsi`='$deskripsi' WHERE `id_blog`='$id_blog'";
        mysqli_query($koneksi, $sql);

        header("Location:index.php?include=blog&notif=editberhasil");
    }
}
