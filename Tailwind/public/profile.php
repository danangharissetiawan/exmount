<?php
session_start();

// Koneksi ke database
include 'fungsi.php';

// Jika tidak ada session pelanggan (belum login)
if (!isset($_SESSION['users']) or empty($_SESSION['users'])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// if(!isset($_SESSION["keranjang"])){
//   // Diarahkan ke ke index.php
//   echo "<script>alert('Belum ada riwayat pembayaran!')</script>";
//   echo "<script>location='index.php';</script>";
// }

// echo "<pre>";
// print_r($_SESSION['pelanggan']);
// echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <section class="my-14">
        <div class="relative container">
            <div class="grid grid-cols-4 divide-x-2">
                <!-- btn navigation -->
                <div class="">
                    <!-- Sidebar -->
                    <aside class="w-full" aria-label="Sidebar">
                        <div class="overflow-y-auto py-4 px-3 rounded">
                            <div class="flex items-center pl-2.5 mb-5">
                                <img src="./img/logonew.svg" class="rounded-md h-5 mr-3 sm:h-7" />
                                <span class="self-center text-xl text-gray-700 font-semibold whitespace-nowrap">ExMount</span>
                            </div>
                            <ul class="space-y-2">
                                <li>
                                    <a href="#" id="btnprofil" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" id="btneditprofil" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <!-- <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Edit Profile</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" id="btnhistory" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Order History</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg hover:bg-gray-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </aside>
                </div>

                <div class="col-span-3">
                    <!-- Profil -->
                    <div class="profile ml-20" id="profile">
                        <p class="py-7 ml-10 text-3xl font-bold">My Profile</p>

                        <img class="w-52 h-52 ml-7 mb-5 p-1 rounded-full ring-2 ring-gray-300" src="./img/person.svg" alt="Bordered avatar">

                        <div class="w-full my-3 py-5 px-5 mx-2 rounded-md">
                            <div>
                                <label class="block pb-2 text-gray-600">Nama</label>
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-gray-100 border border-gray-300 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">Aditya W</p>
                                </div>
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">Email</label>
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-gray-100 border border-gray-300 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">aditya@gmail.com</p>
                                </div>
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">Password</label>
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-gray-100 border border-gray-300 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">*******</p>
                                </div>
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">No Telp</label>
                                <div class="w-1/2 outline-none mb-4 px-2 py-2 bg-gray-100 border border-gray-300 font-bold text-gray-600 rounded-md">
                                    <p id="bg-blue-300">0812298308</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Edit Profil -->
                    <div class="editprofile hidden ml-20" id="editprofile">
                        <p class="py-7 ml-10 text-3xl font-bold">Edit Profile</p>

                        <img class="w-52 h-52 ml-7 mb-5 p-1 rounded-full ring-2 ring-gray-300" src="./img/person.svg" alt="Bordered avatar">
                        <input class="hidden" type="file" accept="image/*" name="" id="file">
                        <label for="file" class="bg-emerald-500 text-gray-100 ml-14 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                            Choose your image
                        </label>

                        <div class="w-full my-3 py-5 px-5 mx-2 rounded-md">
                            <div>
                                <label class="block pb-2 text-gray-600">nama</label>
                                <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="nama" id="">
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">email</label>
                                <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="email" name="email" id="">
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">password</label>
                                <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="password" name="password" id="">
                            </div>
                            <div>
                                <label class="block pb-2 text-gray-600">no Telp</label>
                                <input class="w-1/2 outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="telp" id="">
                            </div>
                        </div>
                    </div>

                    <!-- Order History -->
                    <div class="hidden ml-20" id="history">
                        <div class="w-full px-4 py-3">
                            <div class="mx-auto">
                                <div class="p-4 bg-white items-center">
                                    <p class="font-bold text-3xl mb-3">Riwayat Pembelian</p>
                                    <div class="relative shadow-md sm:rounded-lg">
                                        <table class="w-full text-sm text-left text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">No</th>
                                                    <th scope="col" class="px-6 py-3">Tanggal</th>
                                                    <th scope="col" class="px-6 py-3">Status</th>
                                                    <th scope="col" class="px-6 py-3">Total</th>
                                                    <th scope="col" class="px-6 py-3">Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 1;
                                                // Mendapatkan id_user yang login dari session
                                                $id_user = $_SESSION['users']['id_user'];
                                                $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_user='$id_user'");
                                                if ($ambil->num_rows == 0) :
                                                ?>
                                                    <tr class="bg-white border-b">
                                                        <td colspan="5">Tidak ada data riwayat... </td>
                                                    </tr>

                                                <?php endif; ?>
                                                <?php
                                                while ($pecah = $ambil->fetch_assoc()) :
                                                ?>
                                                    <tr class="bg-white border-b">
                                                        <td class="px-6 py-4"><?= $no; ?></td>
                                                        <td class="px-6 py-4"><?= date("d F Y", strtotime($pecah['tanggal_pembelian'])); ?></td>
                                                        <td class="px-6 py-4">
                                                            <?php if ($pecah['status_pembelian'] == 'Belum Lunas') : ?>
                                                                <span class="bg-red-200 text-red-500 py-1 px-2 rounded">
                                                                    <?= $pecah['status_pembelian']; ?>
                                                                </span>
                                                            <?php elseif ($pecah['status_pembelian'] == 'Lunas') : ?>
                                                                <span class="bg-green-200 text-green-500 py-1 px-2 rounded">
                                                                    <?= $pecah['status_pembelian']; ?>
                                                                </span>
                                                            <?php else : ?>
                                                                <span class="bg-orange-200 text-orange-500 py-1 px-2 rounded">
                                                                    <?= $pecah['status_pembelian']; ?>
                                                                </span>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td class="px-6 py-4">Rp. <?= number_format($pecah['total_pembelian']); ?>,-</td>
                                                        <td class="flex px-6 py-4">
                                                            <a href="nota.php?id=<?= $pecah['id_pembelian']; ?>" class="hover:text-sky-500" data-tooltip-target="tooltip-left" data-tooltip-placement="left">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                                                                </svg>
                                                                <div id="tooltip-left" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-3 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                                    Nota
                                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                                </div>
                                                            </a>
                                                            <p class="px-2 text-gray-300">|</p>
                                                            <?php if ($pecah['status_pembelian'] == 'Lunas') : ?>
                                                                <a href="lihat-pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" class="hover:text-emerald-500" data-tooltip-target="tooltip-top" data-tooltip-placement="top">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                    </svg>
                                                                    <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-3 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                                        Lihat Pembayaran
                                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                                    </div>
                                                                </a>
                                                            <?php else : ?>
                                                                <a href="pembayaran.php?id=<?= $pecah['id_pembelian']; ?>" id="btnbayar" class="hover:text-emerald-500" data-tooltip-target="tooltip-top" data-tooltip-placement="top">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                                                    </svg>
                                                                    <div id="tooltip-top" role="tooltip" class="inline-block absolute invisible z-10 py-1 px-3 text-sm font-medium text-gray-500 bg-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                                                                        Pembayaran
                                                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                                                    </div>

                                                                </a>
                                                            <?php endif; ?>
                                                        </td>
                                                    </tr>

                                                <?php
                                                    $no++;
                                                endwhile;
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>

                    <!-- Pembayaran -->
                    <div class="bg-gray-100 ml-20 pb-10 rounded hidden" id="bayar">
                        <p class="py-7 pl-4 text-3xl text-center font-bold">Pembayaran</p>
                        <hr class="mx-10">

                        <div class="mx-10">
                            <div class="grid grid-cols-3 my-6">
                                <div>
                                    <p class="font-semibold text-gray-900">No Pemesanan</p>
                                    <p class="text-gray-500">B-007</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Tanggal Transaksi</p>
                                    <p class="text-gray-500">17/06/2022</p>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">Total Pembayaran</p>
                                    <p class="text-gray-500">Rp. 200.000,-</p>
                                </div>
                            </div>

                            <div>
                                <form action="" method="post">
                                    <div>
                                        <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="nama" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bank</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="email" name="email" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Total</label>
                                        <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="password" name="password" id="">
                                    </div>
                                    <div>
                                        <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                                        <img class="w-40 h-40 mb-5 p-1 ring-1 ring-gray-300" src="./img/upload.svg" alt="Bordered avatar">

                                        <div>
                                            <input class="hidden" type="file" accept="image/*" name="" id="file">
                                            <label for="file" class="bg-emerald-500 text-gray-100 p-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                                                Choose your image
                                            </label>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

                    <!-- <form>
                        <input type="button" onclick="decrementValue()" value="-" />
                        <input class="bg-blue-300 w-6 text-center" id="number" value="0" min="0"/>
                        <input type="button" onclick="incrementValue()" value="+" />
                    </form> -->

                </div>
            </div>
        </div>
    </section>

    <script>
        // btn sidebar
        let btnprof = document.getElementById("btnprofil");
        let btn_edprof = document.getElementById("btneditprofil");
        let btnhist = document.getElementById("btnhistory");
        let btnbayar = document.getElementById("btnbayar");

        let prof = document.getElementById("profile");
        let edprof = document.getElementById("editprofile");
        let hist = document.getElementById("history");
        let bayar = document.getElementById("bayar");

        btnprof.onclick = function() {
            prof.style.display = "block"
            hist.style.display = "none";
            bayar.style.display = "none";
            edprof.style.display = "none";
        }

        // edit profil
        btn_edprof.onclick = function() {
            prof.style.display = "none";
            hist.style.display = "none";
            bayar.style.display = "none";
            edprof.style.display = "block";
        }

        // history
        btnhist.onclick = function() {
            prof.style.display = "none";
            edprof.style.display = "none";
            bayar.style.display = "none";
            hist.style.display = "block";
        }

        // pembayaran
        btnbayar.onclick = function() {
            prof.style.display = "none";
            edprof.style.display = "none";
            hist.style.display = "none";
            bayar.style.display = "block";
        }
    </script>
    <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>

</body>

</html>