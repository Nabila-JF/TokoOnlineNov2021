<?php
if(session_id() == '') {
    echo "<script> alert('Anda tidak diijinkan untuk masuk, silahkan login terlebih dahulu.'); location.href = 'index.php'; </script>";
}
?>