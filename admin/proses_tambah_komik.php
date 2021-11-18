<?php
ini_set('display_errors',1);
error_reporting(E_ALL);
if($_POST){
    include "koneksi.php";

    $nama_komik = mysqli_real_escape_string($conn, $_POST['nama_komik']);
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    //buat gambarnya

    if(empty($nama_komik)){
        echo "<script> alert ('nama kkomik tidak boleh kosong'); 
        location.href = 'tambah_komik.php';</script>";
    } elseif (empty($harga)){
        echo "<script> alert ('harga tidak boleh kosong'); 
        location.href = 'tambah_komik.php';</script>";
    } elseif (empty($deskripsi)){
        echo "<script> alert ('deskripsi tidak boleh kosong'); 
        location.href = 'tambah_komik.php';</script>";
    } else {
        $ekstensi_diperbolehkan	= array('png','jpg');
        $namaFile = $_FILES['foto']['name'];
        $x = explode('.', $namaFile);
        $ekstensi = strtolower(end($x));
        $ukuran	= $_FILES['foto']['size'];
        $file_tmp = $_FILES['foto']['tmp_name'];
        $newfilename = round(microtime(true)) . '.' . $ekstensi;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070){			
                move_uploaded_file($file_tmp, 'assets/images/'.$newfilename);
            }else{
                echo "<script> alert ('ukuran file terlalu besar'); 
                location.href = 'tambah_komik.php';</script>";
            }
        }else{
            echo "<script> alert ('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); 
            location.href = 'tambah_komik.php';</script>";
        }
        
        $foto = 'http://localhost/toko_komik_manhwa_online/admin/assets/images/'.$newfilename;
        $link = "insert into komik (nama_komik, deskripsi, harga, foto) values ('".$nama_komik."','".$deskripsi."','".$harga."','".$foto."')";
        $insert = mysqli_query($conn, $link) or trigger_error(mysqli_error($conn)." ".$link);

        if ($insert){
            echo "<script> alert ('Sukses menambahkan komik'); 
            location.href = 'home.php';</script>";
        } else {
            echo "<script> alert ('Gagal menambahkan komik'); 
            location.href = 'tambah_komik.php';</script>".mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>