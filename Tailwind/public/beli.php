<?php

// mendapatkan id mount dari url
session_start();
$id_mount = $_GET['id'];


// jika sudah ada produk itu dikeranjang, maka produk itu jumlahnya +1
if (isset($_SESSION['keranjang'][$id_mount])) {
    $_SESSION['keranjang'][$id_mount] += 1;
} else {
    $_SESSION['keranjang'][$id_mount] = 1;
}


// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// masuk halaman keranjang

echo "<script>alert('Tiket telah masuk ke keranjang belanja');</script>";
echo "<script>location='index.php?halaman=keranjang'</script>";
