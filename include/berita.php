<!-- home section starts  -->
<section class="home">
    <div class="swiper home-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide" style="background:url(images/bromo.jpg) no-repeat">
                <div class="content">
                    <span>explore, discover, travel</span>
                    <h3>travel arround indonesia</h3>
                    <a href="index.php?include=trip" class="btn">Jelajahi</a>
                </div>
            </div>
            <div class="swiper-slide slide" style="background:url(images/home-slide-2.jpg) no-repeat">
                <div class="content">
                    <span>explore, discover, travel</span>
                    <h3>discover the new places</h3>
                    <a href="index.php?include=trip" class="btn">Jelajahi</a>
                </div>
            </div>
            <div class="swiper-slide slide" style="background:url(images/home-slide-3.jpg) no-repeat">
                <div class="content">
                    <span>explore, discover, travel</span>
                    <h3>make your tour worthwhile</h3>
                    <a href="index.php?include=trip" class="btn">Jelajahi</a>
                </div>
            </div>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<section class="content-berita">
    <div class="berita">
        <h1>Berita</h1>
    </div>
    <div class="box-container">
        <?php
            $sql_r = "SELECT * FROM `blog` ";
            $query_b = mysqli_query($koneksi, $sql_r);
            while ($data_r = mysqli_fetch_row($query_b)) {
                $id_blogw = $data_r[0];
                $id_user = $data_r[1];
                $tanggal = $data_r[2];
                $judul = $data_r[3];
                $deskripsi = $data_r[4];
                $foto = $data_r[5];
            ?>
            <div class="box-raja-ampat">
                <div class="image">
                    <img src="images/<?=$foto?>">
                </div>
                <div class="content">
                    <h3><?=$judul?></h3>
                    <p><?=$deskripsi?></p>
                    <a href="https://bit.ly/dummynews" class="btn">Baca Selengkapnya</a>
                </div>
            </div>
        <?php } ?>            
    </div>    
</section>
<!-- home section ends  -->