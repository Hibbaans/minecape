<?php 
session_start();
include 'koneksi.php';

// Cek login
if(!isset($_SESSION['id_user'])){
    header("location:login.php");
    exit();
}

$id_user = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Pembelian - MineCape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">MineCape</a>
            <div class="navbar-nav">
                <a class="nav-link" href="profile.php">Profil</a>
                <a class="nav-link active" href="riwayat.php">Riwayat</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h3 class="mb-4">Riwayat Pembelian Saya</h3>
        
        <div class="card shadow-sm border-0">
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal</th>
                            <th>Nama Jubah</th>
                            <th>Harga</th>
                            <th>Kode Redeem</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        // Query JOIN antara transaksi dan capes berdasarkan id_user
                        $sql = "SELECT transaksi.*, capes.nama_item, capes.harga 
                                FROM transaksi 
                                JOIN capes ON transaksi.id_item = capes.id_item 
                                WHERE transaksi.id_user = '$id_user' 
                                ORDER BY transaksi.tanggal DESC";
                        
                        $query = mysqli_query($koneksi, $sql);
                        
                        if(mysqli_num_rows($query) > 0){
                            while($d = mysqli_fetch_array($query)){
                        ?>
                        <tr>
                            <td><?php echo date('d M Y, H:i', strtotime($d['tanggal'])); ?></td>
                            <td class="fw-bold"><?php echo $d['nama_item']; ?></td>
                            <td>Rp <?php echo number_format($d['harga']); ?></td>
                            <td><span class="badge bg-info text-dark"><?php echo $d['kode_redeem']; ?></span></td>
                            <td><span class="badge bg-success">Berhasil</span></td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center text-muted'>Belum ada transaksi. <a href='index.php'>Beli sekarang!</a></td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a href="profile.php" class="btn btn-secondary">Kembali ke Profil</a>
        </div>
    </div>
</body>
</html>