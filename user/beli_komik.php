<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title></title>
</head>
<body>
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
    <p>This is the information about the comic.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Distributor by <cite title="Source Title">Manfilo</cite>
  </figcaption>
</figure>
<p align="center">________________________ . ________________________ . ________________________ </p>
<h2 align="center">Comic Details</h2><br>
<!------>
<?php
 include "koneksi.php";
 $qry_detail_komik = mysqli_query($conn, "select * from komik where id_komik = '".$_GET['id_komik']."'");
 $dt_komik = mysqli_fetch_array($qry_detail_komik);
?>
<!-- <h2>Pinjam Buku</h2> -->
<div class = "row">
    <div class = "col-md-4">
    <img src="<?php echo $dt_komik['foto'];?>"class="card-img-top">
    </div>
    <div class = "col-md-8">
        <form action="incart.php?id_komik=<?php echo $dt_komik['id_komik']?>" method="post">
        <table class = "table table-hover table-striped">
            <thead>
                <tr>
                    <td> Nama Komik </td>
                    <td> <?php echo $dt_komik['nama_komik']?> </td>
                </tr>
                <tr>
                    <td> Deskripsi </td>
                    <td> <?php echo $dt_komik['deskripsi']?></td>
                </tr>
                <tr>
                    <td> Harga </td>
                    <td> <?php echo $dt_komik['harga']?></td>
                </tr>
                <tr>
                    <td> Jumlah Komik </td>
                    <td> <input type="number" name="jumlah_komik" value="1"></td>
                </tr>
                <tr>
                    <td colspan="2"><input class="btn btn-dark" type="submit" value="BELI"></td>
                </tr>
            </thead>
        </table>
        </form>
    </div>
</div>

</body>
</html>