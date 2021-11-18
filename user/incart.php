<?php
session_start();
// unset($_SESSION['cart']);

if($_POST){
    
    include "koneksi.php";

    $qry_get_komik = mysqli_query($conn, "select * from komik where id_komik = '".$_GET['id_komik']."'");
    $dt_komik = mysqli_fetch_array($qry_get_komik);
    // var_dump(in_array($_GET['id_komik'],$_SESSION['cart']));die;
    // var_dump($_SESSION['cart']); die;
    if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
        $komikIds = array();
        foreach($_SESSION['cart'] as $id_cart => $cart){
            $komikIds[] = $cart['id_komik'];
            // var_dump($cart);die;
            // untuk cek id_komik = yang dibeli
            if($cart['id_komik'] == $_GET['id_komik']){
                // untuk update qty_cart
                $_SESSION['cart'][$id_cart]['qty'] = $cart['qty'] + $_POST['jumlah_komik'];
                break;
            }
            // else {
            //     $_SESSION['cart'][]=array('id_komik' => $dt_komik['id_komik'], 'nama_komik' => $dt_komik['nama_komik'], 'qty'=>$_POST['jumlah_komik']);
            // }
        }
        if(!in_array($_GET['id_komik'], $komikIds)){
            $_SESSION['cart'][]=array('id_komik' => $dt_komik['id_komik'], 'nama_komik' => $dt_komik['nama_komik'], 'qty'=>$_POST['jumlah_komik']);    
        }
    } else {
        $_SESSION['cart'][]=array('id_komik' => $dt_komik['id_komik'], 'nama_komik' => $dt_komik['nama_komik'], 'qty'=>$_POST['jumlah_komik']);
    }
}
header("location: cart.php");
?>