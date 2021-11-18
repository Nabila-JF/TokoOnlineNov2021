<?php
include "koneksi.php";
$id_komik = $_GET['id_komik'];
$qry_del_komik = mysqli_query($conn, "DELETE FROM komik WHERE id_komik = '".$id_komik."'");
if ($qry_del_komik){
    echo "<script>alert('Sukses menghapus komik');location.href='home.php';</script>";
} else {
    echo "<script>alert('Gagal menghapus komik');location.href='home.php';</script>";
}
?>