<?php
include('koneksi.php');

$user_id = $_GET['user_id'];

$hapus = mysqli_query($conn, "DELETE FROM keranjang WHERE user='$user_id'");


if ($hapus) {
    echo '<script>alert("Order Berhasil")</script>';
    header('location: home_user.php');
} else
    echo "Hapus data gagal";
