<?php
session_start();
if ($_SESSION['login'] != true)
    header("Location: login.php?");

include('koneksi.php');

$user = $_SESSION['username'];
$id_menu = $_GET['produk_id'];

$hapus = mysqli_query($conn, "DELETE FROM keranjang WHERE produk_id='$id_menu' AND user='$user'");

if ($hapus)
    header('location: keranjang.php');
else
    echo "Hapus data gagal";
