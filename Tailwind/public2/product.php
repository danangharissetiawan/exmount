<?php
include "config.php";
session_start();
// session_unset();
// session_destroy();

// untuk ngecek session keranjang ada atau tidak, berupa array ya
// kyknya ke depannya bakal butuh session peran
if(!isset($_SESSION["keranjang"])) {
    $_SESSION["keranjang"] = [];
}

?>

<a href="keranjang.php">Keranjang</a>

<div>
    <div>
        <?php
        // ini fungsi buat nambah ke keranjang, ambil data yang dari form
        if(isset($_POST["tambahItem"])) {
            $needpush = true;
            $item = [
                "id_mount" => $_POST["id"],
                "nama_mount" => $_POST["nama"],
                "harga_tiket" => $_POST["harga"],
                "tgl_pendakian" => "",
                "qty" => 1
            ];

            // untuk mengecek apakah sudah ada di keranjang atau tidak, kalau ada tinggal tambah kuantitasnya
            for ($i=0; $i < count($_SESSION["keranjang"]); $i++) { 
                if($_SESSION["keranjang"][$i]["id_mount"] == $_POST["id"]) {
                    $_SESSION["keranjang"][$i]["qty"] += 1;
                    $needpush = false; // kalau ada berarti tidak perlu tambah ke array session keranjang
                }
            }

            // kalau barang belum ada, berarti ditambah ke array session keranjang
            if($needpush == true) {
                array_push($_SESSION["keranjang"], $item);
            }

            // ini untuk menghandle error kuantitas keranjang nambah sendiri
            echo "<script>window.location.href='product.php'</script>";
        }

        $ambil =  mysqli_query($connect, "SELECT * FROM mount ORDER BY nama_mount");
        $i = 1;
        while($row = mysqli_fetch_assoc($ambil)) {
        ?>
        <img src="../public/foto_mount/<?php echo $row["foto_mount1"]; ?>" alt="" width="200px">
        <div>
            <table>
                <tr>
                    <td>Nama : </td>
                    <td>&nbsp;&nbsp;</td>
                    <td><?php echo $row["nama_mount"] ?></td>
                </tr>
                <tr>
                    <td>Lokasi : </td>
                    <td>&nbsp;&nbsp;</td>
                    <td><?php echo $row["lokasi_mount"] ?></td>
                </tr>
                <tr>
                    <td>Tiket : </td>
                    <td>&nbsp;&nbsp;</td>
                    <td>Rp <?php echo number_format($row["harga_tiket"]) ?> / Pendaki</td>
                </tr>
                <tr>
                    <td>Stok : </td>
                    <td>&nbsp;&nbsp;</td>
                    <td>
                        <?php
                        // cek berapa jumlah stok yang tersedia
                        if($row["stok_mount"] == 0) {
                            echo "Habis!";
                        } else if ($row["stok_mount"] <= 5) {
                            echo "Tersisa ", $row["stok_mount"], " tiket!";
                        } else {
                            echo "Tersedia!";
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <!-- Seperti tadi di atas, untuk menambah barang ke keranjang menggunakan bantuan form -->
                        <form method="POST">
                            <input type="number" name="id" value="<?php echo $row["id_mount"]; ?>" hidden>
                            <input type="text" name="nama" value="<?php echo $row["nama_mount"]; ?>" hidden>
                            <input type="number" name="harga" value="<?php echo $row["harga_tiket"]; ?>" hidden>
                            <input type="submit" value="Tambah Item" name="tambahItem" <?php if ($row["stok_mount"] == 0) {
                                // kalau stok habis berarti kita buat hidden tombolnya
                                echo "hidden";
                            } ?>>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
        <?php
        $i++;
        }; 
        
        // buat ngetest aja sih
        // var_dump($_SESSION["keranjang"]);
        
        ?>
    </div>
</div>