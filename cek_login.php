<?php 
session_start();
include 'koneksi.php';

// Cek apakah data sudah dikirim dari form
if(isset($_POST['username']) && isset($_POST['password'])){
    
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    // 1. Cek ke tabel ADMIN
    $login_admin = mysqli_query($koneksi, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
    
    if(!$login_admin){
        die("Error pada query admin: " . mysqli_error($koneksi));
    }

    if(mysqli_num_rows($login_admin) > 0){
        $data = mysqli_fetch_assoc($login_admin);
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login_admin";
        header("location:admin/index.php");
        exit();
    } else {
        // 2. Cek ke tabel USER
        $login_user = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
        
        if(mysqli_num_rows($login_user) > 0){
            $data = mysqli_fetch_assoc($login_user);
            $_SESSION['username'] = $username;
            $_SESSION['id_user'] = $data['id_user'];
            $_SESSION['status'] = "login_user";
            header("location:index.php");
            exit();
        } else {
            header("location:login.php?pesan=gagal");
            exit();
        }
    }
} else {
    header("location:login.php");
    exit();
}
?>