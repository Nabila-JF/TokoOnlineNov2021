<?php
session_start();
unset($_SESSION["id_admin"]);
unset($_SESSION["nama_admin"]);
unset($_SESSION["status_login"]);
header("Location:index.php");
?>