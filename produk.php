<!-- Produk -->

<div class="col-md-10 mt-3">
    <h4 class="text-center mt-3 mb-3 produk"> Product</h4>
    <div class="row">
        <?php $ambil = $koneksi->query("SELECT * FROM mount"); ?>
        <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
            <div class="col-md-2 mt-3 mb-3 " style="margin-right:40px; margin-left: 40px;">
                <div class="card box" style=" height: 550px;">
                    <img src="foto_mount/<?php echo $perproduk['foto_mount']; ?>" class="card-img-top" alt="..." style="width: 200px;">
                    <div class="card-body">
                        <h5 class="card-title" style="margin-top: -10px ;"><?php echo $perproduk['nama_mount']; ?></h5>
                        <p class="card-text text-white  mt-3"><?php echo $perproduk['lokasi_mount']; ?></p>
                        <p class="harga text-white p-1 mt-3">Harga : Rp <?php echo number_format($perproduk['harga_tiket']); ?></p>
                        <!-- <div class="bintang p-1" style="text-align: center;">
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star text-warning"></i>
                                <i class="fas fa-star-half-alt text-warning"></i>
                                <i class="far fa-star text-warning"></i>
                            </div> -->
                        <a href="beli.php?id=<?php echo $perproduk['id_mount']; ?>" class="btn btn-success btn-toko mt-2">Beli</a>
                        <a href="detail.php?id=<?php echo $perproduk['id_mount']; ?>" class="btn btn-info btn-toko mt-2">Detail</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>