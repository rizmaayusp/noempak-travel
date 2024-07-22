<!-- package heading starts -->
<div class="heading" style="background:url(images/header-bg-2.png) no-repeat">
    <h1>Trip</h1>
</div>
<!-- package heading ends -->

<!-- packages section starts  -->
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
            $sql_r = "SELECT * FROM `package` ";
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
    <div class="load-more"><span class="btn">Muat Lebih Banyak</span></div>
</section>
<!-- packages section ends -->

<!-- popup section package starts-->
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
<!-- popup section package ends-->