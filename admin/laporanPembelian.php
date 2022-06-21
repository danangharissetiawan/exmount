<?php
$semuadata   = [];
$tgl_mulai   = "-";
$tgl_selesai = "-";
$status      = "-";
if (isset($_POST['kirim'])) {
    $tgl_mulai = $_POST['tglm'];
    $tgl_selesai = $_POST['tgls'];
    $status      = $_POST['status'];

    $ambil = $koneksi->query("SELECT * FROM pembelian pm LEFT JOIN users pl ON pm.id_user=pl.id_user WHERE tanggal_pembelian BETWEEN '$tgl_mulai' AND '$tgl_selesai' AND status_pembelian='$status'");
    while ($pecah = $ambil->fetch_assoc()) {
        $semuadata[] = $pecah;
    }

    // echo "<pre>";
    // print_r($semuadata);
    // echo "</pre>";
}


?>


<h2>Laporan Pemesanan Tiket</h2>
<hr>

<form action="" method="post">
    <div class="row">
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tglm" value="<?= $tgl_mulai; ?>">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Tanggal Selesai</label>
                <input type="date" class="form-control" name="tgls" value="<?= $tgl_selesai; ?>">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="">Status</label>
                <select name="status" id="" class="form-control">
                    <option value="<?= $status; ?>">Pilih Status</option>
                    <option value="Lunas">Lunas</option>
                    <option value="Uang Muka">Uang Muka</option>
                    <option value="Belum Lunas">Belum Bayar</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <label for="">&nbsp;</label><br>
            <button class="btn btn-primary" name="kirim">Lihat</button>
        </div>
    </div>
</form>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php $total = 0; ?>
        <?php foreach ($semuadata as $key => $value) : ?>
            <?php $total += $value['total_pembelian']; ?>
            <tr>
                <td><?= $key + 1; ?>.</td>
                <td><?= $value['username']; ?></td>
                <td><?= $value['tanggal_pembelian']; ?></td>
                <td><?= $value['status_pembelian']; ?></td>
                <td>Rp. <?= number_format($value['total_pembelian']); ?>,-</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4">Total</th>
            <th>Rp. <?= number_format($total); ?>,-</th>
        </tr>
    </tfoot>
</table>