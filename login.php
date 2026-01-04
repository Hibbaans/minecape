<?php 
if(isset($_GET['pesan'])){
    if($_GET['pesan'] == "logout"){
        echo "<div class='alert alert-success'>Anda telah berhasil logout.</div>";
    } else if($_GET['pesan'] == "gagal"){
        echo "<div class='alert alert-danger'>Login gagal! Username atau password salah.</div>";
    } else if($_GET['pesan'] == "belum_login"){
        echo "<div class='alert alert-warning'>Anda harus login terlebih dahulu!</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login - MineCape Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">MineCape Store Login</div>
                    <div class="card-body">
                        <form action="cek_login.php" method="POST">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                            <hr>
<div class="text-center">
    <p>Belum punya akun? <a href="register.php" class="text-decoration-none fw-bold">Daftar di sini</a></p>
</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>