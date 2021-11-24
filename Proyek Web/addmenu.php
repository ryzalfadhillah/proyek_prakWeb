<?php
session_start();
include 'koneksi.php';
if ($_SESSION['login'] != true)
    header("Location: login.php?");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Menu || Resto UPN</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


</head>

<body>

    <div class="container">
        <h3 class="text-center mt-3 mb-5">SILAHKAN TAMBAH MENU</h3>
        <div class="card p-5 mb-5">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="menu1">Nama Menu</label>
                    <input type="text" class="form-control" id="menu1" name="nama_menu">
                </div>
                <div class="form-group">
                    <label for="#">Jenis Menu</label>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Makanan" name="jenis_menu" checked>Makanan
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" value="Minuman" name="jenis_menu">Minuman
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="harga1">Harga Menu</label>
                    <input type="text" class="form-control" id="harga1" name="harga">
                </div>
                <div class="form-group">
                    <label for="gambar">Foto Menu</label>
                    <input type="file" class="form-control-file border" id="gambar" name="gambar">
                </div><br>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
            </form>

            <?php
            if (isset($_POST['tambah'])) {
                $nama = $_POST['nama_menu'];
                $jenis = $_POST['jenis_menu'];
                $harga = $_POST['harga'];
                $nama_file = $_FILES['gambar']['name'];
                $source = $_FILES['gambar']['tmp_name'];
                $folder = './image/';

                move_uploaded_file($source, $folder . $nama_file);
                $insert = mysqli_query($conn, "INSERT INTO produk VALUES (NULL, '$nama', '$harga', '$nama_file', '$jenis')");

                if ($insert) {
                    header("location: menu.php");
                } else {
                    echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
                }
            }

            ?>
</body>

</html>