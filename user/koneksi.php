<?php
    $conn=mysqli_connect('localhost', 'root', '', 'toko_komik_manhwa_online');
    /* check connection */
    if(mysqli_connect_error()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
?>