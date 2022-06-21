<?php

session_start();
include 'fungsi.php';

$data = $koneksi->query("SELECT * FROM pembelian JOIN users ON pembelian.id_user = users.id_user WHERE pembelian.id_pembelian = '$_GET[id]'");
$detail = $data->fetch_assoc();

// Mendapatkan id_user yang beli
$idusertransaksi = $detail['id_user'];

// Mendapatkan id_user yang login
$idpelangganyanglogin = $_SESSION['users']['id_user'];

if ($idusertransaksi != $idpelangganyanglogin) {
    echo "<script>alert('Anda tidak diizinkan untuk melihat transaksi ini');</script>";
    echo "<script>location='index.php?halaman=history';</script>";
}

$id_bank = $detail["id_bank"];
// query ambil data
$ambil = $koneksi->query("SELECT * FROM biaya_admin WHERE id_bank ='$id_bank'");
$cek = $ambil->fetch_assoc();


?>



<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <section class="pt-20 pb-20 bg-emerald-500">
        <div class="container">
            <div class="w-full px-4">
                <div class="mx-auto">
                    <div class="w-full flex items-center">
                        <img class="w-8 md:w-12" src="./img/logonew.svg" alt="gunung">
                        <h1 class="text-2xl font-semibold ml-4 md:text-4xl tracking-wider">ExMount |</h1>
                        <p class="text-white text-2xl md:text-4xl pl-3">Nota Transaksi</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-100">
        <form action="" method="post">
            <div class="container">
                <div class="w-full px-4 py-3">
                    <div class="mx-auto">
                        <div class="p-4 bg-white">
                            <p class="font-bold text-lg mb-3">Transaksi</p>
                            <div class="grid grid-cols-4 gap-4">
                                <div class="">
                                    <p class="font-bold">NO.Pemesanan Tiket Pendakian</p>
                                    <p class="text-gray-500"> <?= $detail['id_pembelian']; ?></p>
                                </div>
                                <div class="">
                                    <p class="font-bold">Tangal Transaksi</p>
                                    <p class="text-gray-500"><?= date("d M Y", strtotime($detail['tanggal_pembelian'])); ?></p>
                                </div>
                                <div class="">
                                    <p class="font-bold">Total Pembayaran Tiket</p>
                                    <p class="text-gray-500">Rp. <?= number_format($detail['total_pembelian']); ?>,-</p>
                                </div>
                                <div class="">
                                    <p class="font-bold">Nama Pemesan Tiket</p>
                                    <p class="text-gray-500"><?= $detail["username"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 py-3">
                    <div class="mx-auto">
                        <div class="p-4 bg-white items-center">
                            <p class="font-bold text-lg mb-3">Detail Tiket yang di pesan</p>
                            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                                <table class="table-auto w-full text-sm text-center bg-center text-gray-500">
                                    <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">No</th>
                                            <th scope="col" class="px-6 py-3">Nama</th>
                                            <th scope="col" class="px-6 py-3">Gambar</th>
                                            <th scope="col" class="px-6 py-3">Tanggal Pendakian</th>
                                            <th scope="col" class="px-6 py-3">Harga</th>
                                            <th scope="col" class="px-6 py-3">Qty</th>
                                            <th scope="col" class="px-6 py-3">Total</th>
                                            <th scope="col" class="px-6 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $number = 1; ?>
                                        <?php $ambil = $koneksi->query("SELECT * FROM pemesanan_tiket Join mount on pemesanan_tiket.id_produk = mount.id_mount WHERE pemesanan_tiket.id_pembelian = '$_GET[id]'"); ?>
                                        <?php while ($data = $ambil->fetch_assoc()) : ?>

                                            <!-- menamilkan produk yg sedang diperulangkan berdasarkan id_produk -->
                                            <tr class="bg-white border-b">
                                                <td class="px-6 py-4"><?= $number; ?></td>
                                                <td class="px-6 py-4"><?= $data["gunung"]; ?></td>
                                                <td class="px-6 py-4"><img src="foto_mount/<?= $data['foto_mount1']; ?>" class="rounded-md" width="150" height="150" alt="" style="margin-left: 50px;"></td>
                                                <td class="px-6 py-4"><?= $data["tanggal_pendakian"]; ?></td>
                                                <td class="px-6 py-4">Rp. <?= number_format($data["tiket"]); ?></td>
                                                <td class="px-6 py-4"><?= $data["jumlah_tiket"]; ?></td>
                                                <td class="px-6 py-4">Rp. <?= number_format($data["total"]); ?></td>
                                                <td class="px-6 py-4">
                                                    <a href="" class="w-30 bg-green-600 p-3 text-base text-center text-white rounded-lg hover:opacity-80">Sewa Jasa</a>
                                                </td>
                                            </tr>

                                            <?php $number++; ?>
                                        <?php endwhile; ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 py-3">
                    <div class="mx-auto">
                        <div class="p-4 bg-white items-center">
                            <p class="font-bold text-lg mb-3">Detail Pembayaran</p>

                            <div class="col-md-7">
                                <div class="bg-cyan-300 rounded p-5">
                                    Total Tiket Rp. <?= number_format($detail['total_pembelian']); ?>,-<br>
                                    <p>Biaya admin Rp. <?= number_format($cek['tarif_admin']); ?>,- </p>
                                    <strong><?= $cek['nama_bank']; ?> - <?= $cek['no_rekening']; ?> </strong>
                                    <p></p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>



    <script src="https://cdn.tailwindcss.com"></script>
    <script src="./js/script.js"></script>
    <script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>
</body>

</html>