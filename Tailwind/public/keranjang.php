<?php
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



<section id="blog" class="pt-14 pb-32 bg-gray-100">
    <form method="POST">
        <div class="container">
            <div class="w-full px-4">
                <div class="max-w-xl mx-auto text-center mb-16">
                    <h4 id="tess" class="font-semibold text-lg mb-2 text-teal-500">Cart Product</h4>
                    <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl pb-4">Shopping Cart</h2>
                </div>
            </div>


            <!-- table order -->
            <div class="w-full px-4 overflow-auto mx-auto hidden md:block">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 shadow-md">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th class="px-6 py-3">No</th>
                                <th class="px-6 py-3">Name</th>
                                <th class="px-6 py-3">Pict</th>
                                <th class="px-6 py-3">Price</th>
                                <th class="px-6 py-3">Qty</th>
                                <th class="px-6 py-3">Total</th>
                                <th class="px-6 py-3">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $number = 1;
                            $totalHarga = 0; ?>
                            <?php foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : ?>
                                <!-- menamilkan produk yg sedang diperulangkan berdasarkan id_produk -->
                                <?php
                                $ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
                                $pecah = $ambil->fetch_assoc();
                                $hargaTiket = $pecah["harga_tiket"];
                                $subharga = $pecah["harga_tiket"] * $jumlah;
                                ?>

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-7 py-4"><?php echo $number; ?></td>
                                    <td class="px-2 py-4"><?php echo $pecah["nama_mount"]; ?></td>
                                    <td class="px-9 py-4">
                                        <center><img src="foto_mount/<?php echo $pecah['foto_mount1']; ?>" class="rounded-xl" width="150" height="150"></center>
                                    </td>
                                    <td class="px-7 py-4" id="harga<?php echo $number; ?>" value="<?php echo $hargaTiket ?>">Rp. <?php echo number_format($pecah["harga_tiket"]); ?></td>
                                    <td class="px-7 py-4">

                                        <input type="button" onclick="" value="-" />
                                        <input class="border border-gray-300 rounded-md mx-2 w-6 text-center" id="number" name="jumlah" value="<?php echo $jumlah; ?>" min="0" />
                                        <input type="button" onclick="" value="+" />

                                    </td>
                                    <td class="px-7 py-4" id="totalHarga<?php echo $number; ?>">Rp. <?php echo number_format($subharga); ?></td>
                                    <td class="px-7 py-4">
                                        <center>
                                            <a href="hapuskeranjang.php?id=<?= $id_mount; ?>" class="hover:text-red-500 cursor-pointer">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </a>
                                        </center>
                                    </td>
                                </tr>
                                <?php $number++; ?>
                            <?php endforeach ?>
                        </tbody>



                        <div class="flex my-10 w-1/2">

                            <a class="w-60 bg-sky-600 p-3 text-base text-center mr-4 text-white rounded-lg hover:opacity-80" href="index.php?halaman=produk">Lanjut Belanja</a>

                            <button name="checkout" class="w-60 bg-green-600 p-3 text-base text-center text-white rounded-lg hover:opacity-80">Checkout</button>

                        </div>
                </div>


                <!-- Table hp -->
    </form>
</section>



<script>
    function formatRupiah(angka, prefix) {
        var number_string = angka.toString();
        var split = number_string.split(',');
        var sisa = split[0].length % 3;
        var rupiah = split[0].substr(0, sisa);
        var ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }

    <?php
    $urutan = 1;
    foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) {
    ?>

        function incrementValue<?php echo $urutan; ?>() {
            var value = parseInt(document.getElementById('number<?php echo $urutan; ?>').value, 10);
            value = isNaN(value) ? 0 : value;
            value++;
            document.getElementById('number<?php echo $urutan; ?>').value = value;
            updateTotalHarga<?php echo $urutan; ?>(value);
        }

        function decrementValue<?php echo $urutan; ?>() {
            var value = parseInt(document.getElementById('number<?php echo $urutan; ?>').value, 10);
            value = isNaN(value) ? 0 : value;
            value--;
            document.getElementById('number<?php echo $urutan; ?>').value = value;
            updateTotalHarga<?php echo $urutan; ?>(value);
        }

        function updateTotalHarga<?php echo $urutan; ?>(jumlah) {
            // var harga = parseInt(document.getElementById('harga<?php echo $urutan; ?>').value, 10);
            var element = document.getElementById("harga<?php echo $urutan; ?>");
            let harga = parseInt(element.getAttribute("value"));
            var totalHarga = harga * jumlah;

            document.getElementById('totalHarga<?php echo $urutan; ?>').textContent = formatRupiah(totalHarga, 'Rp. ');
            // document.getElementById('totalHarga<?php echo $urutan; ?>').textContent = totalHarga;
        }

    <?php
        $urutan++;
    }
    ?>
</script>


<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/flowbite@1.4.5/dist/flowbite.js"></script>

<?php
if (isset($_POST['checkout'])) {
    $urutan = 1;
    foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) {
        $jumlah = $_POST['jumlah' . $urutan];
        $_SESSION['keranjang'][$id_mount] = $jumlah;
        $urutan++;
    }


    echo "<div class='alert alert-success'>Produk telah masuk ke keranjang</div>";
    echo "<script>location='index.php?halaman=checkout'</script>";
}

?>