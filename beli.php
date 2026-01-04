<?php 
session_start();
include 'koneksi.php';

// Cek apakah user sudah login
if(!isset($_SESSION['id_user'])){
    header("location:login.php?pesan=belum_login");
    exit();
}

$id_item = $_GET['id'];
$id_user = $_SESSION['id_user'];
$tgl = date('Y-m-d H:i:s');
$kode = "MC-" . strtoupper(substr(md5(rand()), 0, 8));

// 1. Ambil data Stok & Harga dari tabel capes
$query_item = mysqli_query($koneksi, "SELECT stok, harga FROM capes WHERE id_item='$id_item'");
$data_item = mysqli_fetch_array($query_item);

// 2. Ambil data Saldo User dari tabel user
$query_user = mysqli_query($koneksi, "SELECT saldo FROM user WHERE id_user='$id_user'");
$data_user = mysqli_fetch_array($query_user);

$harga_jubah = $data_item['harga'];
$saldo_user = $data_user['saldo'];

// 3. Validasi Stok
if($data_item['stok'] > 0){
    
    // 4. Cek apakah Saldo Cukup?
    if($saldo_user >= $harga_jubah){
        
        // A. Update stok (Kurangi 1)
        mysqli_query($koneksi, "UPDATE capes SET stok = stok - 1 WHERE id_item='$id_item'");

        // B. Potong Saldo User
        $saldo_baru = $saldo_user - $harga_jubah;
        mysqli_query($koneksi, "UPDATE user SET saldo = '$saldo_baru' WHERE id_user='$id_user'");

        // C. Catat ke tabel transaksi
        mysqli_query($koneksi, "INSERT INTO transaksi (id_user, id_item, tanggal, kode_redeem) 
                                VALUES ('$id_user', '$id_item', '$tgl', '$kode')");

        echo "<script>alert('Pembelian Berhasil! Saldo terpotong. Kode: $kode'); window.location='profile.php';</script>";
    
    } else {
        // JIKA SALDO KURANG: Tampilkan Popup
        echo "<script>alert('Gagal! Saldo Anda tidak cukup. Harga: Rp " . number_format($harga_jubah) . "'); window.location='index.php';</script>";
    }

} else {
    echo "<script>alert('Maaf, Stok Habis!'); window.location='index.php';</script>";
}
?>