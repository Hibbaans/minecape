<?php
session_start();
if($_SESSION['status'] != "login_admin") header("location:../login.php");
include '../koneksi.php';

$id = $_GET['id'];

// Perintah SQL untuk menghapus data berdasarkan ID
$query = mysqli_query($koneksi, "DELETE FROM capes WHERE id_item='$id'");

if($query){
    header("location:index.php?pesan=hapus_berhasil");
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>