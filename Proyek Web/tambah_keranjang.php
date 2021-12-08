<?php
session_start();

include('koneksi.php');

if ($_SESSION['login'] != true)
    header("Location: login.php?");

$id_menu = $_GET['produk_id'];
$user = $_SESSION['username'];

$insert = mysqli_query($conn, "INSERT INTO keranjang VALUES (NULL,'$id_menu','$user')");

if ($insert) {
    $_SESSION['username'] = $user;
    header("location: keranjang.php");
} else {
    echo "Maaf, terjadi kesalahan saat mencoba menambah ke keranjang";
}
