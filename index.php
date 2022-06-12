<?php


$koneksi =  new mysqli("localhost", "root", "", "exmount");

if (!isset($_SESSION['aadmin'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');

    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="shop.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>Mancester United Store</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">

                <a class="navbar-brand" href="#"><span class="MU">MU</span>Store</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-2 mt-1 ">
                        <a class="nav-link" href="index.php?halaman=toko">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="">About</a>
                        <a class="nav-link" href="index.php?halaman=produk">Product</a>
                        <a class="nav-link" href="">Registrasi</a>
                    </ul>
                    <button class="btn btn-outline-dark my-2 my-sm-0 ml-3 mr-3" href="login.php">Login</button>



                    <div class="icon mt-2">
                        <h5>
                            <a href="index.php?halaman=keranjang"><i class="fas fa-shopping-cart ml-3 mr-3 " style="color: black;" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
                            <i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
                            <a href="post.php"><i class="fas fa-bell mr-3" data-toggle="tooltip" style="color: black;" title="Akun"></i></a>
                        </h5>
                    </div>

                </div>
            </div>
        </nav>
    </header>


    <?php
    if (isset($_GET['halaman'])) {
        if ($_GET['halaman'] == "produk") {
            include 'produk.php';
        } elseif ($_GET['halaman'] == "keranjang") {
            include 'keranjang.php';
        } elseif ($_GET['halaman'] == "beli") {
            include 'beli.php';
        } elseif ($_GET['halaman'] == "home") {
            include 'home.php';
        } elseif ($_GET['halaman'] == "logout") {
            include 'logout.php';
        }
    }

    ?>

    <!-- /. PAGE WRAPPER  -->
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->

    <script type="text/javascript" src="script.js"></script>


</body>

</html>