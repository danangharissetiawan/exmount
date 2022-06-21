<h2>Detail Pembelian</h2>

<?php
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN users
    ON pembelian.id_user = users.id_user  WHERE
    pembelian.id_pembelian='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>

<strong><?php echo $detail['username']; ?></strong> <br>
<p>
    <?php echo $detail['telepon']; ?> <br>
    <?php echo $detail['email']; ?>
</p>

<p>
    Tanggal :<?php echo $detail['tanggal_pembelian']; ?> <br>
    Total :<?php echo $detail['total_pembelian']; ?>
</p>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>No</td>
            <td>Gunung</td>
            <td>Foto</td>
            <td>Harga</td>
            <td>Jumlah</td>
            <td>Subtotal</td>
            <td>Tanggal Pendakian</td>
        </tr>
    </thead>
    <tbody>
        <?php $nomer = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pemesanan_tiket JOIN mount ON
            pemesanan_tiket.id_produk=mount.id_mount 
            WHERE pemesanan_tiket.id_pembelian='$_GET[id]'") ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $pecah['gunung'];  ?></td>
                <td>
                    <img src="../Tailwind/public/foto_mount/<?php echo $pecah['foto_mount1']; ?>" width="250">
                </td>
                <td><?php echo $pecah['tiket']; ?></td>
                <td><?php echo $pecah['jumlah_tiket']; ?></td>
                <td>
                    <?php echo $pecah['total']  ?>
                </td>
                <td><?php echo $pecah['tanggal_pendakian']; ?></td>
            </tr>
            <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>