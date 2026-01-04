<?php 
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>MineCape Store - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">MineCape Store</a>
        <div class="navbar-nav ms-auto">
          <?php if(isset($_SESSION['username'])): ?>
            <a href="riwayat.php" class="nav-link" style="text-decoration: none;">Riwayat</a>
            <a class="nav-link" href="profile.php">Profile</a>
            <a class="nav-link btn btn-danger btn-sm text-white" href="logout.php">Logout</a>
          <?php else: ?>
            <a class="nav-link" href="login.php">Login</a>
          <?php endif; ?>
        </div>
      </div>
    </nav>

    <div class="container mt-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-dark text-white fw-bold">Katalog Minecraft Capes</div>
        <div class="card-body p-0">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-4">Gambar</th>
                        <th>Nama Jubah</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th class="text-center pe-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $data = mysqli_query($koneksi, "SELECT * FROM capes");
                    while($d = mysqli_fetch_array($data)){ ?>
                    <tr>
                        <td class="ps-4"><img src="assets/img/<?php echo $d['gambar']; ?>" width="60" class="rounded border"></td>
                        <td><strong><?php echo $d['nama_item']; ?></strong></td>
                        <td class="small text-muted" style="max-width: 300px;"><?php echo $d['deskripsi']; ?></td>
                        <td>Rp <?php echo number_format($d['harga']); ?></td>
                        <td><span class="badge bg-<?php echo ($d['stok'] > 0 ? 'info' : 'danger'); ?>"><?php echo $d['stok']; ?></span></td>
                        <td class="text-center pe-4">
                            <?php if($d['stok'] > 0): ?>
                                <a href="beli.php?id=<?php echo $d['id_item']; ?>" class="btn btn-primary btn-sm px-3" onclick="return confirm('Beli jubah ini?')">Beli Sekarang</a>
                            <?php else: ?>
                                <button class="btn btn-secondary btn-sm" disabled>Habis</button>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container">
        <div class="row text-center border-bottom pb-4 mb-4">
            <div class="col-md-4 mb-3">
                <h6 class="text-uppercase fw-bold text-primary mb-3">Email Support</h6>
                <p class="mb-0"><i class="fas fa-envelope me-2"></i> support@minecape.com</p>
            </div>
            <div class="col-md-4 mb-3">
                <h6 class="text-uppercase fw-bold text-primary mb-3">Layanan Telepon</h6>
                <p class="mb-0"><i class="fas fa-phone me-2"></i> +62 812-3456-7890</p>
            </div>
            <div class="col-md-4 mb-3">
                <h6 class="text-uppercase fw-bold text-primary mb-3">Media Sosial</h6>
                <p class="mb-0"><i class="fab fa-instagram me-2"></i> @minecape_store</p>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-md-12 text-center">
                <p>Copyright ©2026</p>
            </div>
        </div>
    </div>
</footer>
            <?php  ?>
        </div>
    </div>
</body>
</html>