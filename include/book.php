<!-- book heading starts -->
<div class="heading" style="background:url(images/header-bg-3.png) no-repeat">
    <h1>Pesan Sekarang</h1>
</div>
<!-- book heading ends -->

<!-- booking section starts  -->
<section class="booking">
    <h1 class="heading-title">Mari Bertualang!</h1>
    <form action="include/book_form.php" method="post" class="book-form">
        <div class="flex">
            <div class="inputBox">
                <span>nama :</span>
                <input type="text" placeholder="masukkan nama" name="nama">
            </div>
            <div class="inputBox">
                <span>email :</span>
                <input type="email" placeholder="masukkan email" name="email">
            </div>
            <div class="inputBox">
                <span>No. Telepon :</span>
                <input type="text" placeholder="masukkan no. telp" name="telepon">
            </div>
            <div class="inputBox">
                <span>alamat :</span>
                <input type="text" placeholder="masukkan alamat" name="alamat">
            </div>
            <div class="inputBox">
                <span>tujuan :</span>
                <select placeholder="tempat yang ingin dikunjungi" class="input-text" name="package">
                    <?php
                    $sql_r = "SELECT * FROM `package`";
                    $query_b = mysqli_query($koneksi, $sql_r);
                    while ($data_r = mysqli_fetch_row($query_b)) {
                        $id_blogw = $data_r[0];
                        $foto = $data_r[1];
                        $nama_destinasi = $data_r[2];
                        $deskripsi = $data_r[3];
                        $harga = $data_r[4];
                    ?>
                        <option value="<?=$id_blogw?>"><?=$nama_destinasi?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="inputBox">
                <span>tamu :</span>
                <input type="number" placeholder="jumlah tamu" name="tamu">
            </div>
            <div class="inputBox">
                <span>keberangkatan :</span>
                <input type="date" name="pemberangkatan">
            </div>
            <div class="inputBox">
                <span>kepulangan :</span>
                <input type="date" name="meninggalkan">
            </div>
        </div>        
        <button type="submit" class="btn">Kirim</a>
    </form>
</section>

<!-- confirm pop up starts -->
<section class="konfirmasi_booking" id="konfirmasi_booking">
    <div class="card_booking">
        <img src="images/confirm.png" alt="">
        <a href="#" class="close_btn">&times;</a>
        <div class="card_detail_book">
            <h2>Terima Kasih!</h2>
            <p>Pesanan Anda sudah terkirim.</p>
            <p>Silakan cek email Anda untuk konfirmasi pesanan.</p>        
        </div>
        <div class="detail_btn_book">
            <a href="index.php?include=book" class="btn">OK</a>
        </div>
    </div>
</section>
<!-- confirm pop up ends -->

<!-- booking section ends -->