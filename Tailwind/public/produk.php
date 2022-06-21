<!-- Produk -->


<!-- Section Product -->



<section class="pt-14 pb-32 bg-slate-100">
    <div class="container">
        <div class="w-full px-4">
            <div class="max-w-xl mx-auto text-center mb-16">
                <h4 class="font-semibold text-lg mb-2 text-teal-500">Product</h4>
                <h2 class="font-bold text-dark text-3xl sm:text-4xl lg:text-5xl pb-4">All Product</h2>
                <p class="font-medium text-md text-secondary md:text-lg">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repudiandae, aperiam deserunt dolore ipsum autem eveniet magnam repellat necessitatibus a labore quis. Alias, distinctio a? Iusto consequuntur placeat neque quas distinctio.</p>
            </div>
        </div>

        <div class="flex flex-wrap">
            <?php $ambil = $koneksi->query("SELECT * FROM mount"); ?>
            <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
                <div class="w-full px-4 lg:w-1/2 xl:w-1/4">
                    <div class="bg-white rounded-xl overflow-hidden shadow-lg mb-10">
                        <img src="foto_mount/<?php echo $perproduk['foto_mount1']; ?>" class="w-full" style="height: 200px;">
                        <div class=" py-8 px-6">
                            <h3 class="font-semibold text-xl text-dark"><?php echo $perproduk['nama_mount']; ?></h3>
                            <table class="my-4">
                                <tr>
                                    <td class="py-1"><b>Tiket</b></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td>Rp <?php echo number_format($perproduk['harga_tiket']); ?> / Pendaki</td>
                                </tr>
                                <tr>
                                    <td class="py-2"><b>Lokasi</b></td>
                                    <td>&nbsp;:&nbsp;</td>
                                    <td><?php echo $perproduk['lokasi_mount']; ?></td>
                                </tr>
                            </table>
                            <a href="detail.php?id=<?php echo $perproduk['id_mount']; ?>" class="font-medium text-sm text-white bg-orange-600 py-3 px-6 rounded-lg hover:opacity-80">detail</a>
                            <a href="beli.php?id=<?php echo $perproduk['id_mount']; ?>" class="font-medium text-sm text-white bg-green-600 py-3 px-6 rounded-lg hover:opacity-80">beli</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>

<script src="./js/script.js"></script>
<script src="./js/modals.js"></script>