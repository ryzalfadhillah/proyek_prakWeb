<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login-register.css">

    <title>Daftar</title>
</head>

<body>
    <div class="container">
        <div class="card login-regis-form">
            <div class="card-body">
                <h2 class="card-title mt-5">Daftar</h2>

                <form class="mt-5" method="post" action="#" S>
                    <div class="mb-4">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan username">
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama lengkap">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password">
                    </div>

                    <div class="d-grid mt-5">
                        <button type="submit" name="submit" class="btn btn-success btn-login">Daftar</button>
                    </div>

                    <div class="mt-3 mb-5">
                        <label>Sudah punya akun? <a href="login.php" class="link">Masuk disini</a></label>
                    </div>
                </form>

                <?php
                include 'koneksi.php';

                if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $nama = $_POST['nama'];
                    $password = $_POST['password'];
                    $status = "user";

                    $query  = mysqli_query($conn, "INSERT INTO users (user_id, username, nama_lengkap, password, status) VALUES (null, '$username', '$nama', '$password', '$status')");

                    if ($query) {
                        echo "<script>window.alert('Selamat, Akun anda berhasil dibuat'); window.location.href='login.php';</script>";
                    } else {
                        echo "<script>window.alert('Terjadi kesalahan!!! Username sudah digunakan'); window.location.href='register.php';</script>";
                    }
                }

                ?>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>