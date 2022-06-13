<?php

// include 'fungsi.php';

// Jika tidak ada session user (belum login)
if (!isset($_SESSION["users"])) {
    // Diarahkan ke ke login.php
    echo "<script>alert('Silahkan login!')</script>";
    echo "<script>location='login.php';</script>";
}

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}


?>



<section class="pt-20 pb-20 bg-[#E78F37]">
    <div class="container">
        <div class="w-full px-4">
            <div class="mx-auto">
                <div class="w-full flex items-center">
                    <img class="w-8 md:w-12" src="./img/logonew.svg" alt="gunung">
                    <h1 class="text-2xl font-semibold ml-4 md:text-4xl tracking-wider">ExMount |</h1>
                    <p class="text-white text-2xl md:text-4xl pl-3">Checkout</p>
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
                        <p class="font-bold text-lg mb-3">Informasi Umum</p>
                        <div class="grid grid-cols-4 gap-4">
                            <div class="">
                                <p class="font-bold">Email</p>
                                <p class="text-gray-500"><?php echo $_SESSION['users']['email']; ?></p>
                            </div>
                            <div class="">
                                <p class="font-bold">Username</p>
                                <p class="text-gray-500"><?php echo $_SESSION['users']['username']; ?></p>
                            </div>
                            <div class="">
                                <p class="font-bold">No. Telp</p>
                                <p class="text-gray-500"><?php echo $_SESSION['users']['telepon']; ?></p>
                            </div>
                            <div class="">
                                <p class="font-bold">Tanggal Transaksi</p>
                                <p class="text-gray-500"><?php echo date('Y-m-d') ?></p>
                            </div>
                        </div>
                        <!-- <div class="relative w-1/4 mb-4">
                            <input type="text" id="floating_filled" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Nama Lengkap</label>
                        </div>
                        <div class="relative w-1/4">
                            <input type="date" class="block rounded-t-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 dark:bg-gray-700 border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="floating_filled" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Tanggal</label>
                        </div>         -->
                    </div>
                </div>
            </div>
            <div class="w-full px-4 py-3">
                <div class="mx-auto">
                    <div class="p-4 bg-white items-center">
                        <p class="font-bold text-lg mb-3">Ticket Pendakian Yang di pesan</p>
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">No</th>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Gambar</th>
                                        <th scope="col" class="px-6 py-3">Tanggal Pendakian</th>
                                        <th scope="col" class="px-6 py-3">Harga</th>
                                        <th scope="col" class="px-6 py-3">Qty</th>
                                        <th scope="col" class="px-6 py-3">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $number = 1; ?>
                                    <?php $totalbeli = 0; ?>
                                    <?php foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : ?>
                                        <!-- menamilkan produk yg sedang diperulangkan berdasarkan id_produk -->
                                        <?php

                                        $ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
                                        $detail = $ambil->fetch_assoc();
                                        $subharga = $detail["harga_tiket"] * $jumlah;
                                        ?>
                                        <tr class="bg-white border-b">
                                            <td class="px-6 py-4"><?= $number; ?></td>
                                            <td class="px-6 py-4"><?= $detail["nama_mount"]; ?></td>
                                            <td class="px-6 py-4"><img src="foto_mount/<?= $detail['foto_mount1']; ?>" class="rounded-md" width="150" height="150" alt=""></td>
                                            <td class="px-6 py-4"><input class="tanggalan bg-slate-200 p-1 rounded-lg outline-slate-100" type="date" name="tanggalPendakian<?php echo $number; ?>" id="tanggalPendakian"></td>
                                            <td class="px-6 py-4">Rp. <?= number_format($detail["harga_tiket"]); ?></td>
                                            <td class="px-6 py-4"><?= $jumlah; ?></td>
                                            <td class="px-6 py-4">Rp. <?= number_format($subharga); ?></td>
                                        </tr>
                                        <?php $totalbeli += $subharga; ?>
                                        <?php $number++; ?>
                                    <?php endforeach ?>



                                    <tr class="bg-[#E78F37] border-b bg-[#E78F37]">

                                        <td colspan="6" class="px-6 py-4 font-bold font-medium text-white whitespace-nowrap">Subtotal</td>
                                        <td class="px-6 py-4 font-bold text-white" name="totalbeli">Rp. <?= number_format($totalbeli); ?></td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full px-4 py-3">
                <div class="mx-auto">
                    <div class="p-4 bg-white items-center">
                        <p class="font-bold text-lg mb-3">Pilihan Tranfer Bank</p>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select an option</label>
                        <select name="id_bank" class="form-control w-1/4 bg-[#E78F37]  border mb-5 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-[#E78F37] dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="">== Pilih Pembayaran ==</option>
                            <?php
                            $databank = $koneksi->query("SELECT * FROM biaya_admin");
                            while ($data = $databank->fetch_assoc()) {
                            ?>
                                <option name="id_bank" value="<?php echo $data["id_bank"] ?>">
                                    <?php echo $data["nama_bank"] ?>
                                </option>
                                <?php $biayaAdmin = $data["biaya_admin"]; ?>
                            <?php } ?>
                        </select>
                        <hr>

                        <div class="flex tmpButton" style="margin: 20px 20px 20px 1050px">
                        <a class="w-60 bg-[#F3B15F] p-3 text-base text-center mr-4 text-white rounded-lg hover:opacity-80" href="./produk.html">Kembali</a>
                            <button name="checkout" class="font-medium text-sm text-white bg-green-600 py-3 px-6 rounded-lg hover:opacity-80">Checkout</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

<?php
if (isset($_POST["checkout"])) {

    $id_user = $_SESSION["users"]["id_user"];
    $tanggal = date("Y-m-d");
    $total = $totalbeli;
    $status = "Belum Lunas";

    // menyimpan data ke tabel pembelian
    $koneksi->query("INSERT INTO pembelian(id_user, tanggal_pembelian, total_pembelian, status_pembelian ) VALUES ('$id_user', '$tanggal', '$total', '$status')");

    // mendapatkan id pembelian baru terjadi
    $id_pembelian_terbaru = $koneksi->insert_id;

    $urutan = 1;
    foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) {
        $data = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
        $isidata = $data->fetch_assoc();
        $jmlh_tiket = $jumlah;
        $gunung = $isidata["nama_mount"];
        $tiket = $isidata["harga_tiket"];
        $total = $tiket * $jumlah;
        $tanggal_pendakian = $_POST["tanggalPendakian" . $urutan];
        $urutan++;
        $koneksi->query("INSERT INTO pemesanan_tiket(id_pembelian, id_produk, jumlah_tiket, gunung, tiket, total, tanggal_pendakian) Values('$id_pembelian_terbaru','$id_mount','$jmlh_tiket','$gunung','$tiket','$total','$tanggal_pendakian')");
    }

    // Mengosongkan keranjang belanja
    unset($_SESSION["keranjang"]);

    // Tampilan dialihkan ke halaman nota dari pembelian barusan
    echo "<script>alert('Pembelian sukses');</script>";
    echo "<script>location='nota.php?id=$id_pembelian_terbaru';</script>";
}
?>



<!-- <section class="py-12 bg-slate-100">
    <div class="container">
        <div class="w-full px-4 py-3">
            <div class="mx-auto">
                <div class="p-4 bg-white flex items-center">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit sit excepturi veniam accusantium earum cum voluptatibus laudantium numquam dolorem! Numquam vel iste, repellat consequuntur cum neque laborum iure ab est.</p>
                </div>
            </div>
        </div>
        <div class="w-full px-4 py-3">
            <div class="mx-auto">
                <div class="p-4 bg-white flex items-center">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit sit excepturi veniam accusantium earum cum voluptatibus laudantium numquam dolorem! Numquam vel iste, repellat consequuntur cum neque laborum iure ab est.</p>
                </div>
            </div>
        </div>
        <div class="w-full px-4 py-3">
            <div class="mx-auto">
                <div class="p-4 bg-white flex items-center">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Fugit sit excepturi veniam accusantium earum cum voluptatibus laudantium numquam dolorem! Numquam vel iste, repellat consequuntur cum neque laborum iure ab est.</p>
                </div>
            </div>
        </div>
    </div>
</section> -->
<script src="https://cdn.tailwindcss.com"></script>
<script src="./js/script.js"></script>
<script src="https://unpkg.com/flowbite@1.4.6/dist/flowbite.js"></script>

<script>
    // untuk mendisable pemilihan tanggal yang telah lampau
    var today = new Date().toISOString().substr(0, 10);
    document.getElementsByClassName("tanggalan")[0].min = today;
</script>