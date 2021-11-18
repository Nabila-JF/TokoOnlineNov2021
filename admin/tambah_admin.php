<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!---CSS nya--->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">
    <title>Tambah Admin</title>
</head>
<body>
<br><h3>Tambah Admin</h3>
        <form action = "proses_tambah_admin.php" method = "post">
            Nama Administrator: 
            <input type = "text" name = "nama_admin" value = "" class = "form-control">
            Username: 
            <input type = "text" name = "username" value = "" class = "form-control">
            Password:
            <input type="password" name="password" value="" class="form-control">
        <input type="submit" name="simpan" value="Tambah Admin" class="btn btn-primary">
        </form>
</body>
</html>