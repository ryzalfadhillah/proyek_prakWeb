<?php
include('koneksi.php');

$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$jenis_menu = $_POST['jenis_menu'];
$harga = $_POST['harga'];
$nama_file = $_FILES['gambar']['name'];
$source = $_FILES['gambar']['tmp_name'];
$folder = './image/';

move_uploaded_file($source, $folder . $nama_file);
$edit = mysqli_query($conn, "UPDATE produk SET nama_produk='$nama_menu', harga='$harga', gambar='$nama_file', kategori='$jenis_menu' WHERE produk_id='$id_menu' ");

if ($edit)
    header('location: menu.php');
else
    echo "Edit Menu Gagal";
