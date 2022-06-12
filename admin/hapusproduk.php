<?php

$ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount ='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$foto_mount1 = $pecah['foto_mount1'];
$foto_mount2 = $pecah['foto_mount2'];
$foto_mount3 = $pecah['foto_mount3'];
if (file_exists("../Tailwind/public/foto_mount/$foto_mount1")) {
    unlink("../Tailwind/public/foto_mount/$foto_mount1");
    unlink("../Tailwind/public/foto_mount/$foto_mount2");
    unlink("../Tailwind/public/foto_mount/$foto_mount3");
}


$koneksi->query("DELETE FROM mount WHERE id_mount ='$_GET[id]'");

echo "<script>alert('Produk Terhapus');</script>";
echo "<script>location='data.php?halaman=produk';</script>";
