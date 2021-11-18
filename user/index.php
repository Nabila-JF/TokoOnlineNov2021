<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Manfilo</title>
</head>
<body>
<!-- <img src="banner1.png" class="img-fluid" alt="" width="20"> -->
<ul class = "nav justify-content-center">
<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid" >
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" align="center">
        <a class="nav-link" href="index.php">COMIC CORNER</a>
        <a class="nav-link" href="cart.php">CART</a>
        <a class="nav-link" href="transaction.php">TRANSACTION</a>
        <a class="nav-link" href="#">LOGIN</a>
      </div>
    </div>
  </div>
</nav></ul>
<p align="center">________________________ . ________________________ . ________________________ </p>
<figure class="text-center">
  <blockquote class="blockquote">
    <p>Comic corner is a place for you to choose your favorite story from 1000+ manhwa.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Distributor by <cite title="Source Title">Manfilo</cite>
  </figcaption>
</figure>
<p align="center">________________________ . ________________________ . ________________________ </p>
<h2 align="center">Comic Corner</h2><br>
<!------>
<!-- <div class="card border-secondary mb-3" style="max-width: rem;">
  <div class="card-header" align="center">･ﾟ･(｡>ω<｡)･ﾟ･</div>
  <div class="card-body text-secondary">
    <h5 class="card-title">Secondary card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div> -->
<!------>
<div class = "row">
    <?php
    include "koneksi.php";
    $qry_komik = mysqli_query($conn, "select * from komik");
    while ($dt_komik = mysqli_fetch_array($qry_komik)){
        ?>
        <div class = "col-md-3">
            <div class = "card border-dark">
                <?php
                if (isset($dt_komik['foto']) && $dt_komik['foto'] != ''){
                ?>
                    <img src="<?php echo $dt_komik['foto'];?>"class="card-img-top">
                    <?php /* ?><img src="assets/foto_produk/<?=$dt_buku['foto']?>"> <?php */ ?>
                <?php } else {?>
                    <img src="" alt="">
                <?php } ?>
                <div class="card-body" align="center">
                    <h5 class="card-title"><?php echo $dt_komik['nama_komik'];?></h5>
                    <h6 class="card-text">Rp. <?php echo $dt_komik['harga'];?></h6><br>
                    <a href="beli_komik.php?id_komik=<?php echo $dt_komik['id_komik'];?>" class = "btn btn-outline-dark">>>></a>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
</body>
</html>