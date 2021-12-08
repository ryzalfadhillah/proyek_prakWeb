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
            <a href="home_user.php">
                <div id="cart-btn" class="fas fa-shopping-cart"></div>
            </a>
            <a href="logout.php">
                <div class="fas fa-arrow-right"></div>
            </a>
        </div>

    </header>

    <!-- header section ends  -->

    <section class="popular" id="popular">
        <div class="heading">
            <span>Keranjang</span>
        </div>

        <div class="box-container">
            <?php

            include('koneksi.php');

            $query = mysqli_query($conn, "SELECT * FROM keranjang WHERE user='$user'");
            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);

            $total = 0;
            ?>

            <?php foreach ($result as $result) : ?>
                <?php
                $id_produk = $result['produk_id'];

                $query1 = mysqli_query($conn, "SELECT * FROM produk WHERE produk_id='$id_produk'");
                $result1 = mysqli_fetch_all($query1, MYSQLI_ASSOC);
                ?>
                <?php foreach ($result1 as $result1) : ?>
                    <div class="box">
                        <div class="image">
                            <img src="image//<?php echo $result1['gambar'] ?>" alt="">
                        </div>
                        <div class="content">
                            <h3><?php echo $result1['nama_produk'] ?></h3>
                            <div class="price">Rp. <?php echo number_format($result1['harga']); ?></div>
                            <a href="hapus_keranjang.php?produk_id=<?php echo $result['produk_id']  ?>" class="btn">Hapus</a>
                        </div>
                    </div>

                    <?php $total += $result1['harga']; ?>
                <?php endforeach; ?>
            <?php endforeach; ?>
    </section>
    <section>
        <center>
            <div class="cart-total">

                <h3 class="title" style="font-size: 24px;"><b>Total belanjaan</b></h3>

                <div class="box">

                    <h3 class="total"> Rp. <span><?php echo number_format($total); ?></span> </h3>

                    <a href="checkout.php?user_id=<?php echo $user ?>" class="btn" name="checkout">checkout</a>

                </div>
            </div>
        </center>
    </section>

</body>

</html>