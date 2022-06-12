<?php

include "config.php";
session_start();

// andaikan kita sudah login
$_SESSION["email"] = "adhi@gmail.com";
$_SESSION["user"] = "adhi";

$var_email = $_SESSION["email"];
$var_pengguna = $_SESSION["user"];
$ambil_pengguna =  mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM users WHERE email = '$var_email' AND username = '$var_pengguna'"));

// untuk ngecek session keranjang ada atau tidak, berupa array ya
if(!isset($_SESSION["keranjang"])) {
    $_SESSION["keranjang"] = [];
}
if(empty($_SESSION["keranjang"])) {
    echo "<script>alert('Keranjang kosong, silahkan pilih produk!');</script>";
    echo "<script>location='product.php';</script>";
}

?>

<h4>Informasi Umum</h4>
<table>
    <tr>
        <th>Email</th>
        <th>Username</th>
        <th>No. Telp</th>
        <th>Tanggal</th>
    </tr>
    <tr>
        <!-- berarti kita akan butuh session email, username, dan telepon -->
        <td><?php echo $_SESSION["email"] ?></td>
        <td><?php echo $_SESSION["user"] ?></td>
        <td><?php echo $ambil_pengguna["telepon"] ?></td>
        <td><?php echo date_format(date_create("now"), "d/m/Y"); ?></td>
    </tr>
</table>

<?php

// post buat checkout
if(isset($_POST["bayar"])) {
    // buat ganti tanggalan yang ada di session array keranjang
    for ($i=0; $i < count($_SESSION["keranjang"]); $i++) {
        $_SESSION["keranjang"][$i]["tgl_pendakian"] = date_format(date_create($_POST["tanggalan$i"]), "Y-m-d H:i:s");
    }

    // check variabel yang mau dimasukkin ke transaksi
    // var_dump($ambil_pengguna["id_user"]);
    // var_dump($ambil_pengguna["username"]);
    // var_dump($ambil_pengguna["email"]);
    // for ($i=0; $i < count($_SESSION["keranjang"]); $i++) { 
    //     var_dump($_SESSION["keranjang"][$i]["id_mount"]);
    //     var_dump($_SESSION["keranjang"][$i]["nama_mount"]);
    //     var_dump($_SESSION["keranjang"][$i]["harga_tiket"]);
    //     var_dump($_SESSION["keranjang"][$i]["qty"]);
    //     var_dump($_SESSION["keranjang"][$i]["tgl_pendakian"]);
    // }

    // set ke variabel
    $var1 = $ambil_pengguna["id_user"]; // id pengguna
    $var2 = $ambil_pengguna["username"]; // pengguna
    $var3 = $ambil_pengguna["email"]; // email
    $var4 = ""; // id_mount
    $var5 = ""; // nama_mount
    $var6 = ""; // harga_ tiket
    $var7 = ""; // qty
    $var8 = ""; // tgl_pendakian
    $var10 = 0; // total

    for ($i=0; $i < count($_SESSION["keranjang"]); $i++) { 
        $var4 .= $_SESSION["keranjang"][$i]["id_mount"].", ";
        $var5 .= $_SESSION["keranjang"][$i]["nama_mount"].", ";
        $var6 .= $_SESSION["keranjang"][$i]["harga_tiket"].", ";
        $var7 .= $_SESSION["keranjang"][$i]["qty"].", ";
        $var8 .= $_SESSION["keranjang"][$i]["tgl_pendakian"].", ";
        $var10 += (int)$_SESSION["keranjang"][$i]["harga_tiket"] * (int)$_SESSION["keranjang"][$i]["qty"];
    }

    // rtrim guna menghilangkan yang paling belakang, dalam hal ini ", "
    $var4 = rtrim($var4, ", ");
    $var5 = rtrim($var5, ", ");
    $var6 = rtrim($var6, ", ");
    $var7 = rtrim($var7, ", ");
    $var8 = rtrim($var8, ", ");

    $var9 = date_format(date_create("now"), "Y-m-d H:i:s"); // tanggal transaksi
    $var11 = "Belum Bayar"; // status, karena COD maka utang

    // testing
    var_dump($var1);
    var_dump($var2);
    var_dump($var3);
    var_dump($var4);
    var_dump($var5);
    var_dump($var6);
    var_dump($var7);
    var_dump($var8);
    

    // simpan ke transaksi
    $sql = "INSERT INTO transaksi(id_user, username, email, id_mount, nama_mount, harga_tiket, qty, waktu_pendakian, waktu_transaksi, total, status) VALUES('$var1', '$var2', '$var3', '$var4', '$var5', '$var6', '$var7', '$var8', '$var9', '$var10', '$var11')";
    $simpan = mysqli_query($connect, $sql);

    // unset yang ada di session keranjang
    unset($_SESSION["keranjang"]);

    // jaga2 buat ngehandle error
    echo "<script>window.location.href='product.php'</script>";
}

?>

<h4>Produk Dipesan</h4>
<!-- form buat checkout -->
<form method="post">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Tanggal Pendakian</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
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
                <td>
                    <!-- ini pake javascript -->
                    <input type="datetime-local" id="tanggalan<?php echo $i; ?>" name="tanggalan<?php echo $i; ?>" class="tanggalan" required>
                </td>
                <td>Rp <?php echo number_format($_SESSION["keranjang"][$i]["harga_tiket"]); ?></td>
                <td><?php echo $_SESSION["keranjang"][$i]["qty"]; ?></td>
                <td>Rp 
                    <?php
                    $total_satuan = (int)$_SESSION["keranjang"][$i]["harga_tiket"] * (int)$_SESSION["keranjang"][$i]["qty"];
                    echo number_format($total_satuan);
                    ?>
                </td>
            </tr>

            <?php
            // total harganya
            $total +=  (int)$_SESSION["keranjang"][$i]["harga_tiket"] * (int)$_SESSION["keranjang"][$i]["qty"];
            }; ?>
            <tr>
                <td colspan="4">Subtotal : </td>
                <td colspan="3">Rp <?php echo number_format($total); ?></td>
            </tr>
        </tbody>
    </table>

    <h4>Metode Pembayaran</h4>
    <input type="radio" name="metode_pembayaran" value="cod" id="cod" required>
    <label for="cod">COD</label><br>
    <input type="radio" name="metode_pembayaran" value="tbank" id="tbank" disabled>
    <label for="tbank">Transfer Bank</label><br>

    <p>Dengan memilih "Bayar", Anda bersedia mengikuti kebijakan dan peraturan yang ada. <input type="submit" value="Bayar" name="bayar"></p>
    
</form>

<script>
    // untuk mendisable pemilihan tanggal yang telah lampau
    var today = new Date().toISOString().slice(0, 16);
    document.getElementsByClassName("tanggalan")[0].min = today;
</script>

<?php
// buat ngetest aja sih
var_dump($_SESSION["keranjang"]);