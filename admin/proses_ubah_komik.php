<?php
if($_POST){
    include "koneksi.php";
    $id_komik = $_POST['id_komik'];
    $nama_komik = mysqli_real_escape_string($conn, $_POST['nama_komik']);
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];
    if (isset($_FILES['foto'])){
    $foto = $_FILES['foto'];
    } else {
        $foto = "";
    }
    // var_dump($_POST);die;

    if(empty($nama_komik)){
        echo "<script> alert ('nama kkomik tidak boleh kosong'); 
        location.href = 'ubah_komik.php';</script>";
    } elseif (empty($harga)){
        echo "<script> alert ('harga tidak boleh kosong'); 
        location.href = 'ubah_komik.php';</script>";
    } elseif (empty($deskripsi)){
        echo "<script> alert ('deskripsi tidak boleh kosong'); 
        location.href = 'ubah_komik.php';</script>";
    } else {
        // var_dump($foto);die;
        if(empty($foto['name'])){
            $update=mysqli_query($conn,"update komik set nama_komik='".$nama_komik."',harga='".$harga."', deskripsi='".$deskripsi."' where id_komik = '".$id_komik."' ") or die(mysqli_error($conn));
            if($update){
                // die("1");
                echo "<script>alert('Sukses update komik');location.href='home.php';</script>";
            } else {
                echo "<script>alert('Gagal update komik');location.href='ubah_komik.php?id_komik=".$id_komik."';</script>";
            }
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
                    // die("3");	
                    move_uploaded_file($file_tmp, 'assets/images/'.$newfilename);
                }else{
                    // die("4");
                    echo "<script> alert ('ukuran file terlalu besar'); 
                    location.href = 'ubah_komik.php';</script>";
                }
            }else{
            echo "<script> alert ('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN'); 
            location.href = 'ubah_komik.php';</script>";
            }
            $foto = 'http://localhost/toko_komik_manhwa_online/admin/assets/images/'.$newfilename;
            $link = "update komik set nama_komik='".$nama_komik."',harga='".$harga."', deskripsi='".$deskripsi."',foto='".$foto."' where id_komik = '".$id_komik."' ";
            $update = mysqli_query($conn, $link) or trigger_error(mysqli_error($conn)." ".$link);
            // var_dump($update);die;
            if($update){
                echo "<script>alert('Sukses update komik');location.href='home.php';</script>";
            } else {
                echo "<script>alert('Gagal update komik');location.href='ubah_komik.php?id_komik=".$id_komik."';</script>";
            }
        }
        
    } 
}
?>