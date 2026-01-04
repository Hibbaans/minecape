<?php 
// 1. Paksa tampilkan error jika ada yang salah
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();
include 'koneksi.php';

// 2. Cek apakah user sudah login
if(!isset($_SESSION['id_user'])){
    header("location:login.php?pesan=belum_login");
    exit();
}

$id_user = $_SESSION['id_user'];

// 3. Ambil data user (termasuk saldo)
$user_query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id_user'");
if (!$user_query) {
    die("Error Query User: " . mysqli_error($koneksi));
}
$u = mysqli_fetch_array($user_query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profil Saya - MineCape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <a class="navbar-brand" href="index.php">MineCape Store</a>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body text-center">
                            <div class="mb-3">
                                <img src="https://ui-avatars.com/api/?name=<?php echo $u['nama'] ?? $u['username']; ?>&background=random" class="rounded-circle" width="80">
                            </div>
                            <h5 class="fw-bold"><?php echo $u['nama'] ?? $u['username']; ?></h5>
                        <hr>
                        <div class="bg-primary text-white p-3 rounded shadow-sm">
                            <small>Saldo Anda</small>
                            <h3 class="mb-0">Rp <?php echo number_format($u['saldo'] ?? 0); ?></h3>
                        </div>
                        <a href="riwayat.php" class="btn btn-outline-primary btn-sm w-100 mt-2">Riwayat Transaksi</a>
                        <form action="proses_topup.php" method="POST" class="mt-3">
                            <div class="input-group">
                                <input type="number" name="nominal" class="form-control" placeholder="Masukkan nominal..." required>
                                <button class="btn btn-success" type="submit">Top Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-white fw-bold">Jubah Yang Saya Miliki</div>
                    <div class="card-body">
                        <div class="row">
                            <?php 
                            // Query Join untuk mengambil data jubah dari tabel transaksi
                            $sql_transaksi = "SELECT transaksi.*, capes.nama_item, capes.gambar 
                            FROM transaksi 
                            JOIN capes ON transaksi.id_item = capes.id_item 
                            WHERE transaksi.id_user = '$id_user' 
                            ORDER BY transaksi.tanggal DESC";
                            
                            $res_transaksi = mysqli_query($koneksi, $sql_transaksi);
                            
                            if(mysqli_num_rows($res_transaksi) > 0){
                                while($t = mysqli_fetch_array($res_transaksi)){
                            ?>
                                <div class="col-md-6 mb-3">
                                    <div class="card h-100 border shadow-sm">
                                        <div class="row g-0 align-items-center">
                                            <div class="col-4 p-2">
                                                <img src="assets/img/<?php echo $t['gambar']; ?>" class="img-fluid rounded">
                                            </div>
                                            <div class="col-8">
                                                <div class="card-body p-2">
                                                    <h6 class="card-title mb-1 text-truncate"><?php echo $t['nama_item']; ?></h6>
                                                    <code class="text-primary small"><?php echo $t['kode_redeem']; ?></code>
                                                    <div class="text-muted" style="font-size: 10px;"><?php echo $t['tanggal']; ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                }
                            } else {
                                echo "<div class='text-center py-5'><p class='text-muted'>Anda belum memiliki jubah.</p><a href='index.php' class='btn btn-primary btn-sm'>Beli Sekarang</a></div>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>