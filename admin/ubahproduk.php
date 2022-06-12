<h2>Ubah Produk</h2>
<?php
$ambil = $koneksi->query("SELECT * FROM mount WHERE id_mount='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";

?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Gunung</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_mount']; ?>">
    </div>

    <div class="form-group">
        <label>Lokasi</label>
        <input type="text" name="lokasi" class="form-control" value="<?php echo $pecah['lokasi_mount']; ?>">
    </div>
    <div class="form-group">
        <label>Tiket</label>
        <input type="number" name="tiket" class="form-control" value="<?php echo $pecah['harga_tiket']; ?>">
    </div>
    <div class="from-group">
        <label>Foto</label>
        <img src="../foto_produk/<?php echo $pecah['foto_mount1']; ?>" width="200">
    </div>
    <div class="form-group">
        <input type="file" name="foto1" class="form-control">
    </div>

    <div class="from-group">
        <label>Foto</label>
        <img src="../foto_produk/<?php echo $pecah['foto_mount2']; ?>" width="200">
    </div>
    <div class="form-group">
        <input type="file" name="foto2" class="form-control">
    </div>

    <div class="from-group">
        <label>Foto</label>
        <img src="../foto_produk/<?php echo $pecah['foto_mount3']; ?>" width="200">
    </div>
    <div class="form-group">
        <input type="file" name="foto3" class="form-control">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <input name="deskripsi" class="form-control" value="<?php echo $pecah['desk_mount']; ?>">
    </div>

    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php

if (isset($_POST['ubah'])) {
    $namafoto1 = $_FILES['foto1']['name'];
    $lokasifoto1 = $_FILES['foto1']['tmp_name'];

    $namafoto2 = $_FILES['foto2']['name'];
    $lokasifoto2 = $_FILES['foto2']['tmp_name'];

    $namafoto3 = $_FILES['foto3']['name'];
    $lokasifoto3 = $_FILES['foto3']['tmp_name'];

    // jika foto di rubah
    if (!empty($lokasifoto1)) {
        move_uploaded_file($lokasifoto1, "../Tailwind/public/foto_mount/$namafoto1");
        $koneksi->query("UPDATE mount SET nama_mount='$_POST[nama]',
        lokasi_mount='$_POST[lokasi]',harga_tiket='$_POST[tiket]',foto_mount1=
        '$namafoto1',desk_mount='$_POST[deskripsi]' WHERE id_mount='$_GET[id]'");
    } else if(!empty($lokasifoto2)) {
        move_uploaded_file($lokasifoto2, "../Tailwind/public/foto_mount/$namafoto2");
        $koneksi->query("UPDATE mount SET nama_mount='$_POST[nama]',
        lokasi_mount='$_POST[lokasi]',harga_tiket='$_POST[tiket]',foto_mount2=
        '$namafoto2',desk_mount='$_POST[deskripsi]' WHERE id_mount='$_GET[id]'");
    } else if(!empty($lokasifoto3)) {
        move_uploaded_file($lokasifoto3, "../Tailwind/public/foto_mount/$namafoto3");
        $koneksi->query("UPDATE mount SET nama_mount='$_POST[nama]',
        lokasi_mount='$_POST[lokasi]',harga_tiket='$_POST[tiket]',foto_mount3=
        '$namafoto3',desk_mount='$_POST[deskripsi]' WHERE id_mount='$_GET[id]'");
    } else {
        $koneksi->query("UPDATE mount SET nama_mount='$_POST[nama]',
        lokasi_mount='$_POST[lokasi]',harga_tiket='$_POST[tiket]',desk_mount='$_POST[deskripsi]' WHERE id_mount='$_GET[id]'");
    }
    echo "<script>alert('data produk telah diubah');</script>";
    echo "<script>location='index.php?halaman=produk';</script>";
}



?>