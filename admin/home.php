<?php
session_start();
include "cek_login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="custom_admin.css" rel="stylesheet">
</head>
<body>
<figure class="text-center">
  <blockquote class="blockquote">
    <p>This is a place for adding our manhwa comic.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Hello, nice to meet ya! Your boss name is <cite title="Source Title">Billa</cite>
  </figcaption>
</figure>
<nav class="navbar navbar-expand-sm navbar-light bg-oldpink">
  <ul class="navbar-nav">
    <a class="navbar-brand" href="#">
      <img src="assets/images/ice.svg" alt="" width="30" height="24">
    </a>
    <li class="nav-item active">
      <a class="nav-link" href="home.php">HOME</a>
    </li>
    <li class="nav-item">
      <a class = "nav-link" aria-current = "page" onclick="return confirm('Are you sure?');" href="logout.php">LOGOUT</a>
    </li>
    <li class="nav-item">
      <a class="nav-link disabled" href="#">Disabled</a>
    </li>
  </ul>
</nav>
<!------>
<div class="container-fluid">
  <h1 class="display-6"><br><b>Hello <?php echo $_SESSION['nama_admin'];?></b></h1>
  <p class="lead"> Welcome to our inventory about manhwa comics data! You can access this website for add our product and delete our product.</p>
</div>
<!------>
<br>
<p class="lead"><d style="padding-left:1em;" > </d><b>Daftar Komik | <a href="tambah_komik.php" class="btn btn-dark">Tambah Komik</a></b></p>

        <table class = "table">
            <thead class = "table-dark">
                <tr>
                    <th>NO</th><th>NAMA KOMIK</th><th>DESKRIPSI</th>
                    <th>HARGA</th><th>FOTO</th><th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                $qry_komik = mysqli_query($conn, "select * from komik");
                $no = 0;
                while ($data_komik = mysqli_fetch_array($qry_komik)){
                    $no++; ?>
                    <tr>
                        <td><?=$no?></td><td><?= $data_komik ['nama_komik'];?></td>
                        <td><?=$data_komik['deskripsi'];?></td>
                        <td><?=$data_komik['harga'];?></td>
                        <td><?php
                if (isset($data_komik['foto']) && $data_komik['foto'] != ''){
                ?>
                    <img src="<?php echo $data_komik['foto'];?>" width="100px">
                <?php } else {?>
                    <img src="" alt="">
                <?php } ?></td>
                        <td><a href="ubah_komik.php?id_komik=<?=$data_komik['id_komik']?>" 
                        class="btn btn-dark">Ubah</a> | <a href="proses_hapus_komik.php?id_komik=<?=$data_komik['id_komik']?>" 
                        onclick="return confirm('Apakah anda yakin menghapus data ini?')" 
                        class="btn btn-light">Hapus</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

</body>
</html>