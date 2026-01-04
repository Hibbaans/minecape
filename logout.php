<?php 
session_start();
session_destroy(); // Menghapus data session di server

// Cara 1: Pakai PHP (Standar)
header("Location: login.php?pesan=logout"); 

// Cara 2: Pakai JavaScript (Cadangan kalau PHP Header gagal/blank)
echo "<script>window.location.href='login.php?pesan=logout';</script>";
exit();
?>