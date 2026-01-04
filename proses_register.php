<?php 
include 'koneksi.php';

$username = $_POST['username'];
$email    = $_POST['email']; // Data baru dari form
$pass     = $_POST['password'];
$konfirm  = $_POST['konfirmasi_password'];

// Validasi Password
if($pass !== $konfirm){
    echo "<script>alert('Password tidak sama!'); window.history.back();</script>";
    exit();
}

// Cek apakah username atau email sudah digunakan
$cek_data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' OR email='$email'");
if(mysqli_num_rows($cek_data) > 0) {
    echo "<script>alert('Username atau Email sudah digunakan!'); window.history.back();</script>";
    exit();
}

// Enkripsi dan Simpan
$password_secure = md5($pass);
$query = "INSERT INTO user (username, password, email, saldo) VALUES ('$username', '$password_secure', '$email', 0)";

if(mysqli_query($koneksi, $query)){
    echo "<script>alert('Berhasil Daftar!'); window.location='login.php';</script>";
}

?>