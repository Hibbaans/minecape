<?php 
session_start();
if($_SESSION['status'] != "login_admin") header("location:../login.php");
include '../koneksi.php'; // Masuk ke database
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - MineCape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">MineCape ADMIN</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active" href="index.php">Data Jubah</a>
                <a class="nav-link" href="transaksi.php">Laporan Penjualan</a>
                <a class="nav-link btn btn-danger btn-sm text-white ms-lg-3" href="../logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3>Manajemen Stok Jubah</h3>
                    <a href="tambah_produk.php" class="btn btn-success shadow-sm">+ Tambah Jubah Baru</a>
                </div>

                <?php if(isset($_GET['pesan'])): ?>
                    <div class="alert alert-info alert-dismissible fade show">
                        Status: <strong><?php echo $_GET['pesan']; ?></strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-dark">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Gambar</th>
                                    <th>Nama Jubah</th>
                                    <th>Deskripsi</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                $data = mysqli_query($koneksi, "SELECT * FROM capes"); // Ambil data dari tabel
                                while($d = mysqli_fetch_array($data)){
                                ?>
                                <tr class="align-middle">
                                    <td class="ps-4"><?php echo $no++; ?></td>
                                    <td><img src="../assets/img/<?php echo $d['gambar']; ?>" width="60" class="rounded"></td>
                                    <td><strong><?php echo $d['nama_item']; ?></strong></td>
                                    <td class="small text-muted" style="max-width: 250px;">
                                        <?php echo $d['deskripsi']; ?>
                                    </td>
                                    <td>Rp <?php echo number_format($d['harga']); ?></td>
                                    <td><span class="badge bg-info"><?php echo $d['stok']; ?></span></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?php echo $d['id_item']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="hapus.php?id=<?php echo $d['id_item']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus jubah ini?')">Hapus</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>