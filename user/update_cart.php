<?php
session_start();
// var_dump($_POST);die;
if($_POST){
    foreach($_POST['qty'] as $key => $val){
        // var_dump($key,$val);die;
        $_SESSION['cart'][$key]['qty'] = $val;
    }
}
header("location: cart.php");
?>