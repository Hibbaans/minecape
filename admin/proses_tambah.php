<?php 
session_start();
if($_SESSION['status'] != "login_admin") header("location:../login.php");
// Munculkan error untuk debug
ini_set('display_errors', 1);
error_reporting(E_ALL);

include '../koneksi.php';

$nama  = $_POST['nama_item'];
$desc  = $_POST['deskripsi'];
$harga = $_POST['harga'];
$stok  = $_POST['stok'];

// Proses Gambar
$filename = $_FILES['gambar']['name'];
$tmp_name = $_FILES['gambar']['tmp_name'];

// 1. Cek Folder Assets
$path = "../assets/img/";
if (!is_dir($path)) {
    mkdir($path, 0777, true);
}

// 2. Upload dan Simpan
if(move_uploaded_file($tmp_name, $path . $filename)){
    
    // Sesuaikan query dengan struktur tabel di database
    // id_item tidak perlu dimasukkan karena Auto Increment
    $sql = "INSERT INTO capes (nama_item, deskripsi, harga, stok, gambar) 
            VALUES ('$nama', '$desc', '$harga', '$stok', '$filename')";
            
    if(mysqli_query($koneksi, $sql)){
        header("location:index.php?pesan=berhasil");
        exit();
    } else {
        die("Error Database: " . mysqli_error($koneksi));
    }
} else {
    die("Gagal upload gambar ke folder assets/img/");
}
?>

