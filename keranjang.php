<?php
session_start();

//koneksi ke database
include 'koneksi.php';

if (empty($_SESSION["keranjang"]) or !isset($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
    echo "<script>location='index.php';</script>";
}
?>
<section class="konten " style="margin-top: 150px;">
    <div class="container">
        <h1>Keranjang Belanja</h1>
        <hr>
        <table class="table table-light table-hover ">

            <thead>
                <tr style="text-align: center; background-color: #DB1D24; color:white;">
                    <th>No.</th>
                    <th>Gunung</th>
                    <th>Foto</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Subharga</th>
                </tr>
            </thead>
            <?php $number = 1; ?>
            <?php foreach ($_SESSION["keranjang"] as $id_mount => $jumlah) : ?>
                <!-- menamilkan produk yg sedang diperulangkan berdasarkan id_produk -->

                <?php

                $ambil = $koneksi->query("SELECT * FROM mount
                        WHERE id_mount = '$id_mount'");
                $pecah = $ambil->fetch_assoc();
                $subharga = $pecah["harga_tiket"] * $jumlah;


                ?>
                <tbody style="text-align: center;">
                    <tr>
                        <td><?php echo $number; ?></td>
                        <td><?php echo $pecah["nama_mount"]; ?></td>
                        <td>
                            <img src="foto_mount/<?php echo $pecah['foto_mount']; ?>" class="card-img-top" alt="..." style="width: 100px;">
                        </td>
                        <td>Rp. <?php echo number_format($pecah["harga_tiket"]); ?></td>
                        <td><?php echo $jumlah; ?></td>
                        <td>Rp. <?php echo number_format($subharga); ?></td>
                    </tr>
                </tbody>
                <?php $number++; ?>
            <?php endforeach ?>
        </table>
        <a href="index.php" class="btn btn-primary">Lanjutkan Belanja</a>
        <a href="checkout.php" class="btn btn-success">Checkout</a>
    </div>
</section>






























































<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

<script type="text/javascript" src="script.js"></script>
</body>

</html>