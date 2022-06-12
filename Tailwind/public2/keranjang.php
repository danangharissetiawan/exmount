<?php
include "config.php";
session_start();

// untuk ngecek session keranjang ada atau tidak, berupa array ya
if(!isset($_SESSION["keranjang"])) {
    $_SESSION["keranjang"] = [];
}
if(empty($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
    echo "<script>location='product.php';</script>";
}

?>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Gambar</th>
            <th>Harga</th>
            <th>QTY</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // post buat hapus barang
        if(isset($_POST["hapusItem"])){
            // hapus barang di session array keranjang
            unset($_SESSION["keranjang"][$_POST["indexitem"]]);
            $_SESSION["keranjang"] = array_values($_SESSION["keranjang"]);

            // jaga2 buat ngehandle error
            echo "<script>window.location.href='keranjang.php'</script>";
        }

        // total harga dibuat variabel
        $total = 0;

        // cetak session array keranjang, pake for btw
        for ($i=0; $i < count($_SESSION["keranjang"]); $i++) {
            // buat ngambil gambar di database
            $id = $_SESSION["keranjang"][$i]["id_mount"];
            $ambil =  mysqli_query($connect, "SELECT * FROM mount WHERE id_mount = '$id'");
            $row = mysqli_fetch_assoc($ambil);
        ?>

        <tr>
            <td><?php echo $i+1; ?></td>
            <td><?php echo $_SESSION["keranjang"][$i]["nama_mount"]; ?></td>
            <td><img src="../public/foto_mount/<?php echo $row["foto_mount1"]; ?>" alt="" width="200px"></td>
            <td>Rp <?php echo number_format($_SESSION["keranjang"][$i]["harga_tiket"]); ?></td>
            <td><?php echo $_SESSION["keranjang"][$i]["qty"]; ?></td>
            <td>
                <form method="POST">
                    <!-- hapus item nich -->
                    <input type="number" name="indexitem" value="<?php echo $i; ?>" hidden>
                    <input type="submit" value="Hapus Item" name="hapusItem">
                </form>
            </td>
        </tr>
        <?php
        // total harganya
        $total +=  (int)$_SESSION["keranjang"][$i]["harga_tiket"] * (int)$_SESSION["keranjang"][$i]["qty"];
        }; ?>
        <tr>
            <!-- Harusnya ini button -->
            <td colspan="2"><a href="product.php">Lanjut Belanja</a></td>
            <td><a href="checkout.php">Checkout</a></td>
            <td colspan="3">Subtotal : Rp <?php echo number_format($total); ?></td>
        </tr>
    </tbody>
</table>

<?php
// buat ngetest aja sih
// var_dump($_SESSION["keranjang"]);