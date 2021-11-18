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
    Add the comic here and don't forget to press <cite title="Source Title">SUBMIT</cite>
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
        <form action = "proses_tambah_komik.php" method = "post" enctype="multipart/form-data">
        <br>Nama Komik :
            <input type = "text" name = "nama_komik" value = "" class = "form-control">
            Deskripsi :
            <textarea name="deskripsi" id="" cols="30" rows="10" class="form-control"></textarea>
            Harga : <cite title="Source Title">(Contoh input: 10000)</cite>
            <input type = "text" name = "harga" value = "" class = "form-control">
            Cover Komik :
            <input type="file" name="foto" id="foto" class = "form-control">
            <br><button class="btn btn-dark" type="submit" name="submit">SUBMIT</button>
        </form>
    </body>
</html>