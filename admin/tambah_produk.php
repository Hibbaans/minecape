<?php 
session_start();
if($_SESSION['status'] != "login_admin") header("location:../login.php");
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin - Tambah Cape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white"><h5>Tambah Koleksi Jubah Baru</h5></div>
            <div class="card-body">
                <form action="proses_tambah.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label>Nama Jubah</label>
                        <input type="text" name="nama_item" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi (Patch Notes)</label>
                        <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Harga</label>
                        <input type="number" name="harga" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Stok Awal</label>
                        <input type="number" name="stok" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Gambar Jubah</label>
                        <input type="file" name="gambar" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>