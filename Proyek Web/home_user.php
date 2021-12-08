<?php
session_start();
if ($_SESSION['login'] != true)
    header("Location: login.php?");

$user = $_SESSION['username'];
$_SESSION['username'] = $user;

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home || Resto UPN</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="#" class="logo"> <i class="fas fa-utensils"></i> Resto UPN </a>

        <div class="icons">
            <a href="keranjang.php">
                <div id="cart-btn" class="fas fa-shopping-cart"></div>
            </a>
            <a href="logout.php">
                <div class="fas fa-arrow-right"></div>
            </a>
        </div>

    </header>

    <!-- header section ends  -->

    <!-- about section starts  -->

    <section class="about" id="about">

        <div class="image">
            <img src="image/about-img.png" alt="">
        </div>

        <div class="content">
            <h3 class="title">Sekilas Tentang Resto UPN</h3>
            <p class="fas fa-calendar-alt"> Buka setiap hari senin - minggu</p><br>
            <p class="fas fa-clock"> Mulai pukul 10:00 WIB - 20:00 WIB</p>
            <div class="icons-container">
                <div class="icons">
                    <img src="image/serv-1.png" alt="">
                    <h3>Pengantaram Cepat</h3>
                </div>
                <div class="icons">
                    <img src="image/serv-2.png" alt="">
                    <h3>Makanan Segar</h3>
                </div>
                <div class="icons">
                    <img src="image/serv-3.png" alt="">
                    <h3>Kualitas terbaik</h3>
                </div>
                <div class="icons">
                    <img src="image/serv-4.png" alt="">
                    <h3>24/7 support</h3>
                </div>
            </div>
        </div>

    </section>

    <!-- about section ends -->

    <section class="popular" id="popular">

        <div class="heading">
            <span>Menu</span>
        </div>

        <div class="box-container">

            <?php

            include('koneksi.php');

            $query = mysqli_query($conn, "SELECT * FROM produk");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

            ?>

            <?php foreach ($result as $result) : ?>
                <div class="box">
                    <div class="image">
                        <img src="image//<?php echo $result['gambar'] ?>" alt="">
                    </div>
                    <div class="content">
                        <h3><?php echo $result['nama_produk'] ?></h3>
                        <div class="price">Rp. <?php echo number_format($result['harga']); ?></div>
                        <a href="tambah_keranjang.php?produk_id=<?php echo $result['produk_id']  ?>" class="btn">Tambah ke keranjang</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </section>

    <!-- footer section starts  -->

    <section class="footer">

        <div class="bottom">

            <div class="credit"> created by <span>M. Azka Hartami & Ryzal Fadhillah</span></div>

        </div>

    </section>

    <!-- footer section ends -->

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

</body>

</html>