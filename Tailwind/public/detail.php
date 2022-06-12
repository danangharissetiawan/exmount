<?php
include 'fungsi.php';
session_start();

$id_mount = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount ='$id_mount'");
$detail = $ambil->fetch_assoc();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <!-- Start Header -->
    <?php include 'navbar.php'; ?>

    <!-- Detail Product -->
    <section class="pt-20">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center">
                    <h4 class="font-semibold text-lg mb-2 text-teal-500">Detail</h4>
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl pb-4"><?php echo $detail['nama_mount']; ?></h2>
                </div>
            </div>
            <div class="flex flex-wrap">
                <div class="w-full self-center px-4 lg:w-1/2 my-10">
                    <div id="controls-carousel" class="relative" data-carousel="static">
                        <div class="overflow-hidden relative h-48 rounded-lg sm:h-64 xl:h-80 2xl:h-96">
                            <div class="duration-700 ease-in-out absolute inset-0 transition-all transform -translate-x-full z-10" data-carousel-item="">
                                <img src="foto_mount/<?php echo $detail['foto_mount1']; ?>" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                            </div>

                            <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-0 z-20" data-carousel-item="active">
                                <img src="foto_mount/<?php echo $detail['foto_mount2']; ?>" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                            </div>

                            <div class="duration-700 ease-in-out absolute inset-0 transition-all transform translate-x-full z-10" data-carousel-item="">
                                <img src="foto_mount/<?php echo $detail['foto_mount3']; ?>" class="block absolute top-1/2 left-1/2 w-full -translate-x-1/2 -translate-y-1/2" alt="...">
                            </div>
                        </div>

                        <button type="button" class="flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev="">
                            <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                <span class="hidden">Previous</span>
                            </span>
                        </button>

                        <button type="button" class="flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none" data-carousel-next="">
                            <span class="inline-flex justify-center items-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                <svg class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                                <span class="hidden">Next</span>
                            </span>
                        </button>
                    </div>

                    <!-- <img class="rounded-lg " src="img/bg-gunung.png" alt=""> -->
                </div>

                <div class="w-full py-10 px-4 lg:w-1/2">

                    <table class="my-4">
                        <tr>
                            <td><b>Harga</b></td>
                            <td>:</td>
                            <td>Rp <?php echo number_format($detail['harga_tiket']); ?> / Pendaki</td>
                        </tr>
                        <tr>
                            <td><b>Lokasi</b></td>
                            <td>:</td>
                            <td><?php echo $detail['lokasi_mount']; ?></td>
                        </tr>
                        <tr>
                            <td><b>Ketinggian</b></td>
                            <td>:</td>
                            <td>3124mdpl</td>
                        </tr>
                        <tr>
                            <td><b>Basecamp</b></td>
                            <td>:</td>
                            <td>Wekas</td>
                        </tr>
                        <tr>
                            <td><b><label for="">Tanggal</label></b></td>
                            <td>:</td>
                            <td><input class="bg-slate-200 p-1 rounded-lg outline-slate-100" type="date" name="" id=""></td>
                        </tr>
                    </table>

                    <p class="text-slate-600"><?php echo $detail['desk_mount']; ?></p>



                    <!-- <p class="font-bold text-lg pt-3">IDR 100.000</p> -->
                    <!-- <div class="flex gap-2 md:gap-10 mt-4">
                        <button type="submit" class="bg-red-600 text-white p-2 rounded-md hover:opacity-80 w-1/2">Cancel</button>
                        <button type="submit" class="bg-teal-600 text-white p-2 rounded-md hover:opacity-80 w-1/2">Buy</button>
                    </div> -->
                </div>
            </div>
        </div>
    </section>



</body>

<script src="./js/script.js"></script>
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>
<script src="https://unpkg.com/flowbite@1.4.5/dist/datepicker.js"></script>