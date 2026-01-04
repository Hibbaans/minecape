<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "db_minecape"; // Sesuai nama database yang digunakan
$koneksi = mysqli_connect($host, $user, $pass, $db);

if(!$koneksi){
    die("Gagal konek: " . mysqli_connect_error());
}
?>