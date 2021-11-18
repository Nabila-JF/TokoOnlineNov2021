<?php
session_start();
?>
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
    <p>Here is your future own manhwa.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Distributor by <cite title="Source Title">Manfilo</cite>
  </figcaption>
</figure>
<p align="center">________________________ . ________________________ . ________________________ </p>
<h2 align="center">Comic List In Your Cart</h2><br>
<form action="update_cart.php" method="post">
<table class="table table-hover striped">
    <thead class="table-dark">
        <tr>
            <th><d style="padding-left:0.5em;" ></d>NO</th><th>Nama Komik</th><th>Jumlah</th><th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach (@$_SESSION['cart'] as $key_produk => $val_produk): ?>
            <tr>
                <td><d style="padding-left:0.5em;" ></d><?=($key_produk+1)?></td><td><?=$val_produk['nama_komik']?></td>
                <td><input type="text" class="form-control" name="qty[<?php echo $key_produk; ?>]" value="<?=$val_produk['qty']?>"></td>
                <td><a href="delcart.php?id=<?=$key_produk?>" class="btn btn-danger"><strong>X</strong></a></td>
            </tr>

        <?php endforeach ?>
    </tbody>
</table>
<d style="padding-left:1em;" ></d><button type="submit" name="update_cart" class="btn btn-outline-dark">UPDATE CART</button> || <a href="checkout.php" class="btn btn-dark">CHECKOUT</a>
</form>

</body>
</html>
