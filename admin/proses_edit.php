<?php 
session_start();
if($_SESSION['status'] != "login_admin") header("location:../login.php");
ini_set('display_errors', 1);
error_reporting(E_ALL);
include '../koneksi.php';

$id     = $_POST['id_item'];
$nama   = $_POST['nama_item'];
$desc   = $_POST['deskripsi'];
$harga  = $_POST['harga'];
$stok   = $_POST['stok'];

// Cek apakah ada file yang dikirim
if(isset($_FILES['gambar']) && $_FILES['gambar']['error'] === 0) {
    $gambar = $_FILES['gambar']['name'];
    $tmp_name = $_FILES['gambar']['tmp_name'];
    $path = "../assets/img/";

    // Cek apakah folder ada
    if(!is_dir($path)){
        die("Error: Folder <b>" . $path . "</b> tidak ditemukan. Silakan buat folder tersebut.");
    }

    // Cek apakah folder bisa ditulisi (writable)
    if(!is_writable($path)){
        die("Error: Folder <b>" . $path . "</b> tidak punya izin akses (write permission).");
    }

    // Pindahkan file
    if(move_uploaded_file($tmp_name, $path . $gambar)){
        $sql = "UPDATE capes SET nama_item='$nama', deskripsi='$desc', harga='$harga', stok='$stok', gambar='$gambar' WHERE id_item='$id'";
        // echo "Gambar berhasil diupload!<br>";
    } else {
        die("Error: Gagal memindahkan file ke folder tujuan.");
    }
} else {
    // Jika tidak ada gambar baru, gunakan query tanpa update gambar
    $sql = "UPDATE capes SET nama_item='$nama', deskripsi='$desc', harga='$harga', stok='$stok' WHERE id_item='$id'";
}

if(mysqli_query($koneksi, $sql)){
    header("location:index.php?pesan=update_berhasil");
} else {
    echo "Error Database: " . mysqli_error($koneksi);
}
?>


