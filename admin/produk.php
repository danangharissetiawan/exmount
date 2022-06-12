<?php



?>


<br>
<H2>Data Gunung di Indonesia</H2>
<br>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Gunung</th>
            <th>Lokasi</th>
            <th>Tiket</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM mount"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $pecah['nama_mount']; ?></td>
                <td><?php echo $pecah['lokasi_mount']; ?></td>
                <td><?php echo $pecah['harga_tiket']; ?></td>
                <td>
                    <img src="../Tailwind/public/foto_mount/<?php echo $pecah['foto_mount1']; ?>" width="100">
                </td>

                <td>
                    <a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_mount']; ?>" onclick="
                        return confirm('yakin ingin dihapus?');" class="btn-danger btn">hapus</a>

                    <a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_mount']; ?>" onclick="
                        return confirm('apakah ada data yang ingin diubah?');" class="btn-warning btn">ubah</a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php } ?>
    </tbody>
</table>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary">Tambah Data</a>