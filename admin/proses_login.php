<?php
if ($_POST){
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)){
        echo "<script> alert ('Username tidak boleh kosong'); location.href = 'index.php';</script>";
    } elseif (empty($password)){
        echo "<script> alert ('Password tidak boleh kosong'); location.href = 'index.php';</script>";
    } else {
        include "koneksi.php";
        $qry_login = mysqli_query($conn, "select * from admin where username = '".$username."' and password = '".md5($password)."'");
        if(mysqli_num_rows($qry_login)>0){
            $dt_login = mysqli_fetch_array($qry_login);
            session_start();
            $_SESSION['id_admin']=$dt_login['id_admin'];
            $_SESSION['nama_admin']=$dt_login['nama_admin'];
            $_SESSION['status_login']=true;
            header("location: home.php");
        } else {
            echo "<script> alert ('Username dan Password tidak benar'); location.href = 'index.php'; </script>;";
        }
    }
}
?>