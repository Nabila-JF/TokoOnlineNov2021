<?php
if ($_POST){
    $nama_admin = $_POST['nama_admin'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($nama_admin)){
        echo "<script>alert ('nama admin tidak boleh kosong');location.href = 'tambah_admin.php';</script>";
    }
    elseif (empty($username)){
        echo "<script>alert ('username tidak boleh kosong');location.href = 'tambah_admin.php';</script>";
    }
    elseif (empty($password)){
        echo "<script>alert ('password tidak boleh kosong');location.href = 'tambah_admin.php';</script>";
    }
    else {
        include "koneksi.php";
        $insert = mysqli_query($conn, "insert into admin (nama_admin, username, password) 
        value ('".$nama_admin."','".$username."','".md5($password)."')") or die (mysqli_error($conn));
        if($insert){
            echo "<script> alert ('Sukses menambahkan admin'); location.href = '#';</script>";
        } else {
            echo "<script> alert ('Gagal menambahlan admin'); location.href = '#';</script>";
        }
    }
}
?>