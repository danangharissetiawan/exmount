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
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg mb-2 text-[#E78F37]">Cart Product</h4>
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
                        <?php $number = 1; ?>
                        <?php foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : ?>
                            <!-- menamilkan produk yg sedang diperulangkan berdasarkan id_produk -->
                            <?php
                            $ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount = '$id_mount'");
                            $pecah = $ambil->fetch_assoc();
                            $subharga = $pecah["harga_tiket"] * $jumlah;
                            ?>

                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-7 py-4"><?php echo $number; ?></td>
                                <td class="px-2 py-4"><?php echo $pecah["nama_mount"]; ?></td>
                                <td class="px-9 py-4">
                                    <center><img src="foto_mount/<?php echo $pecah['foto_mount1']; ?>" class="rounded-xl" width="150" height="150"></center>
                                </td>
                                <td class="px-7 py-4">Rp. <?php echo number_format($pecah["harga_tiket"]); ?></td>
                                <td class="px-7 py-4" style="display:inline-flex; ">
                                    <form action="" method="POST" style="margin-top: 50px;">
                                        <input type="number" name="indexitem" value="<?php echo $i; ?>" hidden>
                                        <Button class="rounded-full dark:bg-gray-700 enabled:hover:border-gray-400 disabled:opacity-75" type="submit" name="kurang" style="margin-right: 15px; padding: 5px;">-</button>
                                        <?php echo $jumlah; ?>
                                        <input type="number" name="indexitem" value="<?php echo $i; ?>" hidden>
                                        <button class="rounded-full dark:bg-gray-700 enabled:hover:border-gray-400 disabled:opacity-75" type="submit" name="tambah" style="margin-left: 15px; padding: 5px;">+</button>
                                    </form>
                                </td>
                                <td class="px-7 py-4">Rp. <?php echo number_format($subharga); ?></td>
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


                </table>

                <div class="flex my-10 w-1/2">
                    <a class="w-60 bg-[#F3B15F] p-3 text-base text-center mr-4 text-white rounded-lg hover:opacity-80" href="./produk.html">Lanjut Belanja</a>
                    <button name="sewa">
                        <a class="w-60 bg-green-600 p-3 text-base text-center text-white rounded-lg hover:opacity-80" href="index.php?halaman=checkout">Checkout</a>
                    </button>
                </div>
            </div>


            <!-- Table hp -->

</section>
<!-- Sewa dan Jasa -->
<section>
    <div class="container">
        <div class="w-full px-4 my-10">
            <div class="mx-auto text-center">
                <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl pb-4 my-8">Sewa dan Jasa</h2>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Product name</th>
                                <th scope="col" class="px-6 py-3">Qty</th>
                                <th scope="col" class="px-6 py-3">Category</th>
                                <th scope="col" class="px-6 py-3">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Carrier</th>
                                <td class="px-6 py-4"><input class="w-10 pl-2 bg-gray-600 rounded-md outline-none" type="number"></td>
                                <td class="px-6 py-4">Sewa</td>
                                <td class="px-6 py-4">#299</td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Porter</th>
                                <td class="px-6 py-4"><input class="w-10 pl-2 bg-gray-600 rounded-md outline-none" type="number"></td>
                                <td class="px-6 py-4">Jasa</td>
                                <td class="px-6 py-4">$299</td>
                            </tr>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">Sleeping Bag</th>
                                <td class="px-6 py-4"><input class="w-10 pl-2 bg-gray-600 rounded-md outline-none" type="number"></td>
                                <td class="px-6 py-4">Sewa</td>
                                <td class="px-6 py-4">$299</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="flex my-6 w-1/2">
                    <button type="submit" class="bg-teal-600 text-white p-2 rounded-md hover:opacity-80 w-1/3">Buy</button>
                </div>

            </div>
        </div>
    </div>
</section>
<script src="./js/script.js"></script>
<script src="https://cdn.tailwindcss.com"></script>