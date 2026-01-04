<?php 
session_start();
include 'koneksi.php';

$id_user = $_SESSION['id_user'];
$nominal = $_POST['nominal'];

// Tambahkan nominal baru ke saldo yang sudah ada
$sql = "UPDATE user SET saldo = saldo + '$nominal' WHERE id_user = '$id_user'";

if(mysqli_query($koneksi, $sql)){
    echo "<script>alert('Top Up Berhasil!'); window.location='profile.php';</script>";
}
?>