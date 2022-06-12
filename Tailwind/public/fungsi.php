<?php

//koneksi
// $koneksi = mysqli_connect('localhost', 'root', '', 'exmount');

$koneksi = new mysqli('localhost', 'root', '', 'exmount');

// if ($koneksi) {
//     echo 'berhasil';
// }


//registasi

if (isset($_POST['register'])) {

    $username = $_POST['username'];
    $pass     = $_POST['pass'];
    $email    = $_POST['email'];
    $epass = password_hash($pass, PASSWORD_DEFAULT);

    $insert = mysqli_query($koneksi, "INSERT INTO users(email,username,pass) values('$email','$username','$epass')");
    if ($insert) {
        echo '
        <script> 
            alert("Akun Berhasil Dibuat");
            window.location.href="login.php" 
        </script>
        ';
    } else {
        echo '
        <script> 
            alert("Registasi gaga");
            window.location.href="login.php" 
        </script>
        ';
    }
}


//login
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $pass     = $_POST['pass'];


    $cekAkun = mysqli_query($koneksi, "SELECT * fROM users where username='$username' AND pass='$pass' ");
    $ada = mysqli_num_rows($cekAkun);




    if ($ada > 0) {
        // Mendapatkan aku dalam bentuk array
        $akun = $cekAkun->fetch_assoc();
        // Simpan di session
        $_SESSION["users"] = $akun;
        // Jika sudah belanja
        if (isset($_SESSION['keranjang']) or !empty($_SESSION['keranjang'])) {
            header('location:index.php?halaman=home');
            // echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
        } else {
            header('location:index.php?halaman=produk');
            // echo "<meta http-equiv='refresh' content='1;url=riwayat.php'>";
        }
    } else {
        echo '
        <script> 
            alert("Login gagal")
        </script>
        ';
    }

    // funcuion logout




}
