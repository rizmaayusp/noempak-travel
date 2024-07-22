<!-- about heading starts -->
<div class="heading" style="background:url(images/header-bg-1.png) no-repeat">
    <h1>Tentang Kami</h1>
</div>
<!-- about heading ends -->

<!-- about section starts  -->
<section class="about">
    <div class="image">
        <img src="images/about.jpg" alt="">
    </div>
    <div class="content">
        <h3>Mengapa Pilih Noempak Travel?</h3>
        <p>Dengan teknologi yang terintegrasi kami memberikan akses kemudahan pelayanan perjalanan serta memberikan harga yang efisien.</p>
        <p>Kerja keras serta pelayanan dengan sepenuh hati merupakan dedikasi kami untuk memberikan kualitas terbaik.</p>
        <div class="icons-container">
            <div class="icons">
                <img src="images/destinasi.png">
                <span>Destinasi Terbaik</span>
            </div>
            <div class="icons">
                <img src="images/harga.png">
                <span>Harga Terjangkau</span>
            </div>
            <div class="icons">
                <img src="images/layanan.png">
                <span>24/7 Layanan</span>
            </div>
        </div>
    </div>
</section>
<!-- about section ends -->

<!-- reviews section starts  -->
<?php
$sql_r = "SELECT `id_riview`, `nama`, `status`, `riview`, `foto` FROM `riview` ";
$query_b = mysqli_query($koneksi, $sql_r);
?>
<section class="reviews">
    <h1 class="heading-title"> Ulasan Klien </h1>
    <div class="swiper reviews-slider">
        <div class="swiper-wrapper">
            <?php
            while ($data_r = mysqli_fetch_row($query_b)) {
                $id_riview = $data_r[0];
                $nama = $data_r[1];
                $status = $data_r[2];
                $riview = $data_r[3];
                $foto = $data_r[4];
            ?>
                <div class="swiper-slide slide">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p><?= $riview ?></p>
                    <h3><?= $nama ?></h3>
                    <span><?= $status ?></span>
                    <img src="images/<?php echo $foto; ?>">
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- reviews section ends -->