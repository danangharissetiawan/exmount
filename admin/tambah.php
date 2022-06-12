<?php


if (isset($_POST["submit"])) {

    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan!');
        document.location.href = 'produk.php';
        </script>";
    } else {
        echo "
        <script>
        alert('data gagal ditambahkan!');
        </script>";
        echo mysqli_error($conn);
    }
}

?>


<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Gunung</label>
        <input type="text" class="form-control" name="nama_mount" autocomplete="off">
    </div>
    <div class="form-group">
        <label>Lokasi</label>
        <input type="number" class="form-control" name="lokasi_mount">
    </div>
    <div class="form-group">
        <label>Tiket</label>
        <input type="number" class="form-control" name="harga_tiket">
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea class="form-control" name="desk_mount" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" class="form-control" name="foto_mount">
    </div>
    <button class="btn btn-primary" name="submit">Submit</button>
</form>

