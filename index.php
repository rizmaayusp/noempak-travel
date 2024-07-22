<?php 
    include('koneksi/koneksi.php');
?>
<?php include('includes/head.php'); ?>

<body>
    <?php include('includes/header.php'); ?>

    <?php 
        if(isset($_GET['include'])){
            $include = $_GET['include'];
            if($include=='about'){
                include('include/about.php');
            } else if($include=='berita'){
                include('include/berita.php');
            } else if($include=='trip'){
                include('include/package.php');
            } else if($include=='book'){
                include('include/book.php');
            } else {
                include('include/home.php');
            } 
        } else {
            include('include/home.php');
        }
    ?>

    <?php include('includes/footer.php'); ?>

    <?php include('includes/script.php'); ?>
</body>