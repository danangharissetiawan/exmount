<h2>Data Pelanggan</h2>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Pelanggan</th>
            <th>Email</th>
            <th>No Telepon</th>

        </tr>
    </thead>
    <tbody>

        <?php $no = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM users"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $pecah["username"]; ?></td>
                <td><?= $pecah["email"]; ?></td>
                <td><?= $pecah["telepon"]; ?></td>

            </tr>
            <?php $no++; ?>
        <?php endwhile; ?>

    </tbody>
</table>