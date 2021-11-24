<?php

include('koneksi.php');

$id_menu = $_GET['produk_id'];

$hapus = mysqli_query($conn, "DELETE FROM produk WHERE produk_id='$id_menu'");

if ($hapus)
	header('location: menu.php');
else
	echo "Hapus data gagal";
