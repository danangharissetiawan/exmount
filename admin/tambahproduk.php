<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Gunung</label>
        <input type="text" class="form-control" name="nama" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Lokasi</label>
        <input type="text" class="form-control" name="lokasi">
    </div>
    <div class="form-group">
        <label>Tiket</label>
        <input type="number" class="form-control" name="tiket">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="deskripsi" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto 1</label>
        <input type="file" class="form-control" name="foto1">
    </div>
    <div class="form-group">
        <label>Foto 2</label>
        <input type="file" class="form-control" name="foto2">
    </div>
    <div class="form-group">
        <label>Foto 3</label>
        <input type="file" class="form-control" name="foto3">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
if (isset($_POST['save'])) {
    $nama1 = $_FILES['foto1']['name'];
    $nama2 = $_FILES['foto2']['name'];
    $nama3 = $_FILES['foto3']['name'];
    $lokasi1 = $_FILES['foto1']['tmp_name'];
    $lokasi2 = $_FILES['foto2']['tmp_name'];
    $lokasi3 = $_FILES['foto3']['tmp_name'];
    move_uploaded_file($lokasi1, "../Tailwind/public/foto_mount/" . $nama1);
    move_uploaded_file($lokasi2, "../Tailwind/public/foto_mount/" . $nama2);
    move_uploaded_file($lokasi3, "../Tailwind/public/foto_mount/" . $nama3);
    $koneksi->query("INSERT INTO mount(nama_mount,lokasi_mount,harga_tiket,foto_mount1,foto_mount2,foto_mount3,desk_mount)
        VALUES('$_POST[nama]','$_POST[lokasi]','$_POST[tiket]',
        '$nama1','$nama2','$nama3','$_POST[deskripsi]')");
    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
}
?>