<?php 
session_start();
if($_SESSION['status'] != "login_admin") header("location:../login.php");
include '../koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM capes WHERE id_item='$id'");
$d = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Jubah - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-warning text-dark fw-bold">Edit Data Jubah</div>
            <div class="card-body">
                <form action="proses_edit.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id_item" value="<?php echo $d['id_item']; ?>">
                    <div class="mb-3">
                        <label>Nama Jubah</label>
                        <input type="text" name="nama_item" class="form-control" value="<?php echo $d['nama_item']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3"><?php echo $d['deskripsi']; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label>Harga (Rp)</label>
                        <input type="number" name="harga" class="form-control" value="<?php echo $d['harga']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" value="<?php echo $d['stok']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Gambar Sekarang:</label><br>
                        <img src="../assets/img/<?php echo $d['gambar']; ?>" width="100" class="mb-2">
                        <input type="file" name="gambar" class="form-control">
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>