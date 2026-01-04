<!DOCTYPE html>
<html>
<head>
    <title>Daftar Akun - MineCape</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">Daftar Akun Baru</div>
                    <div class="card-body">
                        <form action="proses_register.php" method="POST">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Konfirmasi Password</label>
                                <input type="password" name="konfirmasi_password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar Sekarang</button>
                            <p class="mt-3 text-center small">Sudah punya akun? <a href="login.php">Login</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>