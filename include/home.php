<!-- home section starts  -->
<section class="home">
   <div class="swiper home-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide slide" style="background:url(images/home-slide-1.jpg) no-repeat">
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
<!-- home section ends -->

<!-- services section starts  -->
<section class="services">
   <h1 class="heading-title"> Layanan Kami </h1>
   <div class="box-container">
      <div class="box">
         <img src="images/icon-1.png" alt="">
         <h3>Adventure</h3>
      </div>
      <div class="box">
         <img src="images/icon-2.png" alt="">
         <h3>Tour Guide</h3>
      </div>
      <div class="box">
         <img src="images/icon-3.png" alt="">
         <h3>Tracking</h3>
      </div>
      <div class="box">
         <img src="images/icon-4.png" alt="">
         <h3>Camp Fire</h3>
      </div>
      <div class="box">
         <img src="images/icon-5.png" alt="">
         <h3>Off Road</h3>
      </div>
      <div class="box">
         <img src="images/icon-6.png" alt="">
         <h3>Camping</h3>
      </div>
   </div>
</section>
<!-- services section ends -->

<!-- home about section starts  -->
<section class="home-about">
   <div class="image">
      <img src="images/about.jpg" alt="">
   </div>
   <div class="content">
      <h3>Tentang Kami</h3>
      <p>Noempak Travel adalah travel agent terdepan di Indonesia yang telah berdiri sejak 1971. Dengan kantor - kantor cabang yang tersebar di Indonesia dan situs noempak.com, kami hadir untuk menjadi pintu gerbang Anda menuju destinasi yang luar biasa.</p>
      <a href="index.php?include=about" class="btn">Baca Selengkapnya</a>
   </div>
</section>
<!-- home about section ends -->

<!-- home packages section starts  -->
<section class="home-packages">
   <script>
      function showDetail(id){
         let imgSrc = $('#img'+id).attr('src');        
         $('#imgDetail').attr('src',imgSrc)        
         $('#h3contentDetail').html($('#h3content'+id).clone())        
         $('#spanDesDetail').html($('#spanDes'+id).clone())                
      }
   </script>
   <section class="packages">
      <h1 class="heading-title">Top Destinasi</h1>
      <div class="box-container">
         <?php
            $sql_r = "SELECT * FROM `package` LIMIT 3";
            $query_b = mysqli_query($koneksi, $sql_r);
            while ($data_r = mysqli_fetch_row($query_b)) {
               $id_blogw = $data_r[0];
               $foto = $data_r[1];
               $nama_destinasi = $data_r[2];
               $deskripsi = $data_r[3];
               $harga = $data_r[4];
            ?>
            <div class="box">
               <div class="image">
                  <img id="img<?=$id_blogw?>" src="images/<?=$foto?>" alt="">
               </div>
               <div class="content">
                  <h3 id="h3content<?=$id_blogw?>"><?=$nama_destinasi?></h3>
                  <span id="spanDes<?=$id_blogw?>">
                     <?=$deskripsi?>
                  </span>
                  <a href="#popup" class="btn" onclick="showDetail(<?=$id_blogw?>)">Detail</a>
               </div>
            </div>
         <?php } ?>
      </div>
   </section>
   <div class="load-more"> <a href="index.php?include=trip" class="btn">Muat Lebih Banyak</a></div>
</section>
<!-- home packages section ends -->

<!-- detail pop up starts -->
<section class="popup-card" id="popup">
   <div class="card-1">
      <img id="imgDetail" src="images/raja-ampat.jpg" alt="">
      <a href="#" class="close_btn">&times;</a>
      <div class="card_detail" id="cardDetail">
         <h1 id="h3contentDetail">Raja Ampat</h1>
         <span id="spanDesDetail">                
         
         </span>
      </div>
      <div class="detail_btn">
         <a href="index.php?include=book" class="btn">pesan sekarang</a>
      </div>
   </div>
</section>

<!-- home offer section starts  -->
<section class="home-offer">
   <div class="content">
      <h3>Diskon hingga 50%</h3>
      <p>Kami memberikan akses kemudahan pelayanan perjalanan serta memberikan harga yang efisien. Pilih destinasi liburan kamu dari bulan-bulan pilihan & musim-musim menarik yang tak terlupakan</p>
      <a href="index.php?include=book" class="btn">Pesan Sekarang</a>
   </div>
</section>
<!-- home offer section ends -->