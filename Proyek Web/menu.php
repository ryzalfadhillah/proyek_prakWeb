<?php
session_start();
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

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <!-- header section starts  -->

    <header class="header">

        <a href="admin.php" class="logo"> <i class="fas fa-users"></i> Hai <?php echo $_SESSION['username']; ?> </a>
        <nav class="navbar">
            <a href="admin.php">Data Menu</a>
        </nav>
        <div class="icons">
            <a href="logout.php">
                <div class="fas fa-arrow-right"></div>
            </a>
        </div>

    </header>

    <!-- header section ends  -->

    <section class="popular" id="popular">

        <div class="heading">
            <a href="addmenu.php" class="btn">Tambah Menu</a>
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
                        <a href="edit_menu.php?produk_id=<?php echo $result['produk_id']  ?>" class="btn">Edit</a>
                        <a href="hapus_menu.php?produk_id=<?php echo $result['produk_id']  ?>" class="btn">Hapus</a>
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