<?php 
session_start();
if($_SESSION['status'] != "login_admin") header("location:../login.php");
include '../koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan - MineCape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">Admin MineCape</a>
            <div class="navbar-nav">
                <a class="nav-link text-white" href="index.php">Kelola Produk</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <h3>Riwayat Penjualan Jubah</h3>
        <table class="table table-hover table-bordered bg-white shadow-sm mt-3">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Nama Pembeli</th>
                    <th>Item</th>
                    <th>Kode Redeem</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                // Query JOIN 3 Tabel: transaksi, user, dan capes
                $query = "SELECT transaksi.*, user.username, capes.nama_item 
                        FROM transaksi 
                        JOIN user ON transaksi.id_user = user.id_user 
                        JOIN capes ON transaksi.id_item = capes.id_item 
                        ORDER BY tanggal DESC";
                
                $result = mysqli_query($koneksi, $query);
                while($d = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $d['tanggal']; ?></td>
                    <td><?php echo $d['username']; ?></td>
                    <td><?php echo $d['nama_item']; ?></td>
                    <td><span class="badge bg-success"><?php echo $d['kode_redeem']; ?></span></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>