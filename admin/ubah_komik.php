<!DOCTYPE html>
<html>
    <head>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="custom_admin.css" rel="stylesheet">
        <title></title>
    </head>
    <body>
    <figure class="text-center">
  <blockquote class="blockquote">
    <p>This is a place for adding our manhwa comic.</p>
  </blockquote>
  <figcaption class="blockquote-footer">
    Update the comic here and don't forget to press <cite title="Source Title">SUBMIT</cite>
  </figcaption>
</figure>
<nav class="navbar navbar-expand-sm navbar-light bg-oldpink">
  <ul class="navbar-nav">
    <a class="navbar-brand" href="#">
      <img src="assets/images/logo.svg" alt="" width="30" height="24">
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
<?php
        include "koneksi.php";
        $qry_get_komik = mysqli_query($conn, "select * from komik where id_komik = '".$_GET['id_komik']."'");
        $dt_komik = mysqli_fetch_array($qry_get_komik);
        ?>
        <form action = "proses_ubah_komik.php" method = "post" enctype="multipart/form-data">
        <input type = "hidden" name = "id_komik" value = "<?php echo $dt_komik['id_komik']?>">
        <br>Nama Komik :
            <input type = "text" name = "nama_komik" value = "<?php echo $dt_komik['nama_komik']?>" class = "form-control">
            Deskripsi :
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"><?php echo $dt_komik['deskripsi']?></textarea>
            Harga : <cite title="Source Title">(Contoh input: 10000)</cite>
            <input type = "text" name = "harga" value = "<?php echo $dt_komik['harga']?>" class = "form-control">
            Cover Komik Saat Ini : <br>
            <?php
                if (isset($dt_komik['foto']) && $dt_komik['foto'] != ''){
                ?>
                    <img src="<?php echo $dt_komik['foto'];?>" width="100px">
                <?php } else {?>
                    <img src="" alt="">
                <?php } ?> 
            <br> Ubah Cover Komik :
            <input type="file" name="foto" id="foto" class = "form-control">
            <br><button class="btn btn-dark" type="submit" name="submit">SUBMIT</button>
        </form>
    </body>
</html>