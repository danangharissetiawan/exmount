<h2>Daftar Pelanggan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Telepon</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $nomer = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pelanggan") ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $nomer; ?></td>
                <td><?php echo $pecah['nama_pelanggan']; ?></td>
                <td><?php echo $pecah['email_pelanggan']; ?></td>
                <td><?php echo $pecah['telepon_pelanggan']; ?></td>
                <td>
                    <a href="" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php $nomer++; ?>
        <?php } ?>
    </tbody>
</table>