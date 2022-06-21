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

// Mendapatkan id_pembelian dari url
$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pembelian='$idpem'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// print_r($_SESSION);
// echo "</pre>";

// Mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detail['id_user'];
// Mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION['users']['id_user'];

if ($id_pelanggan_beli != $id_pelanggan_login) {
  echo "<script>alert('Akses ditolak!');</script>";
  echo "<script>location='riwayat.php';</script>";
  exit();
}

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
  <!-- <pre><?php // print_r($detail); 
            ?> </pre> -->


  <section class="my-14">
    <div class="container">
      <div class="grid grid-cols-4 gap-10">
        <div class="bg-gray-50">
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

          <div class="w-full px-4 ">
            <div class="mx-auto">
              <div class="p-4 bg-gray-50">
                <p class="py-1 pl-4 text-3xl font-bold mb-10" style="text-align: center;">Pembayaran</p>

                <hr>
                <div class="grid grid-cols-3 gap-3 mt-2">
                  <div class="">
                    <p class="font-bold">NO.Pemesanan</p>
                    <p class="text-gray-500"><?= $detail['id_pembelian']; ?></p>
                  </div>
                  <div class="">
                    <p class="font-bold">Tangal Transaksi</p>
                    <p class="text-gray-500"><?= $detail['tanggal_pembelian']; ?></p>
                  </div>
                  <div class="">
                    <p class="font-bold">Total Pembayaran</p>
                    <p class="text-gray-500"> Rp. <?= number_format($detail['total_pembelian']); ?>-</p>
                  </div>

                </div>
                <hr>
              </div>
            </div>
          </div>

          <div class="w-full px-4 ">
            <div class="mx-auto">
              <div class="p-4 bg-gray-50">
                <form action="" method="post">
                  <div class="w-full my-3 py-5 px-5 mx-2 rounded-md">
                    <div>
                      <label class="block pb-2 text-gray-600">Nama Penyetor</label>
                      <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="penyetor" id="">
                    </div>
                    <div>
                      <label class="block pb-2 text-gray-600">Bank</label>
                      <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="text" name="bank" id="">
                    </div>
                    <div>
                      <label class="block pb-2 text-gray-600">Total</label>
                      <input class="w-full outline-none mb-4 px-2 py-1 border border-gray-300 font-bold text-gray-600 rounded-md" type="number" name="total" id="">
                    </div>
                    <div>
                      <label class="block pb-2 text-gray-600">Bukti Pembayaran</label>
                      <input type="file" class="form-control" accept="image/*" name="bukti">
                      <!-- <label for="file" class="bg-emerald-500 text-gray-100 mb-4 px-2 py-2 rounded-md cursor-pointer hover:bg-emerald-600 shadow-emerald-400">
                        Upload bukti Pembayaran
                      </label> -->
                      <p class="text-lg mt-3 mb-3 text-red-600">* Upload Struk untuk konfirmasi Pembayaran ke admin</p>
                      <!-- <img class="w-52 h-52 mt-10 mb-5 p-1 ring-2 ring-gray-300" src="./img/person.svg" alt="Bordered avatar"> -->
                    </div>
                  </div>
                  <button name="konfirmasi" class="rounded-full bg-amber-400 p-3 ">Konfirmasi</button>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
  </section>

  <script>
    // increment
    // function incrementValue(){
    //     var value = parseInt(document.getElementById('number').value, 10);
    //     value = isNaN(value) ? 0 : value;
    //     value++;
    //     document.getElementById('number').value = value;
    // }

    // function decrementValue(){
    //     var value = parseInt(document.getElementById('number').value, 10);
    //     value = isNaN(value) ? 0 : value;
    //     value--;
    //     document.getElementById('number').value = value;
    // }

    // btn sidebar
    let btnprof = document.getElementById("btnprofil");
    let btnhist = document.getElementById("btnhistory");

    let prof = document.getElementById("profile");
    let hist = document.getElementById("history");

    btnprof.onclick = function() {
      hist.style.display = "none";
      prof.style.display = "block";
    }

    btnhist.onclick = function() {
      prof.style.display = "none";
      hist.style.display = "block";
    }
  </script>
  <script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>

</body>

</html>

<?php

if (isset($_POST['konfirmasi'])) {

  $bukti = $_FILES['bukti']['name'];
  $lokasi = $_FILES['bukti']['tmp_name'];
  move_uploaded_file($lokasi, "../Tailwind/public/bukti_pembayaran/" . $bukti);
  $id = $detail['id_pembelian'];
  $penyetor = $_POST['penyetor'];
  $bank = $_POST['bank'];
  $total = $_POST['total'];
  $tanggal = date('Y-m-d');

  $koneksi->query("INSERT INTO pembayaran (id_pembelian, penyetor, bank, total, bukti, tanggal) 
  VALUES ('$id', '$penyetor', '$bank', '$total', '$bukti', '$tanggal')");

  $koneksi->query("UPDATE pembelian SET status_pembelian='Waiting' WHERE id_pembelian='$idpem'");

  echo "<script>alert('Terima kasih sudah melakukan pembayaran');</script>";
  echo "<script>location='index.php?halaman=history';</script>";
}


?>