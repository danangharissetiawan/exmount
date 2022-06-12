<?php
    include('connection.php');

    $kodeuser = $_POST['kode_user'];
    $nama = $_POST['nama'];
    $nim = $_POST['email'];
    $asal = $_POST['telp'];
    $pass = $_POST['password'];
    $peran = $_POST['peran'];

    $query = "INSERT INTO user (kode_user, nama, email, telp, password, peran) values ('$kodeuser','$nama', '$email', '$telp', '$pass', '$peran')";
    mysqli_query($conn, $query);
?>