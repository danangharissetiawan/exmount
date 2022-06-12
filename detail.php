<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "toko");

// mendapatkan id produk dari url

$id_produk = $_GET["id"];

// query ambil data
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>



<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <link rel="stylesheet" href="toko.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Mancester United Store</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="foto/MU.png" width="50" height="50" alt="" loading="lazy">
                </a>
                <a class="navbar-brand" href="#"><span class="MU">MU</span>Store</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mr-2 mt-1 ">
                        <a class="nav-link active" href="toko.php">Home <span class="sr-only">(current)</span></a>
                        <a class="nav-link" href="about.php">About</a>
                        <a class="nav-link" href="index.php">Product</a>
                        <a class="nav-link" href="tamu.php">Registrasi</a>
                    </ul>
                    <button class="btn btn-outline-dark my-2 my-sm-0 ml-3 mr-3" href="">Login</button>



                    <div class="icon mt-2">
                        <h5>
                            <a href="keranjang.php"><i class="fas fa-shopping-cart ml-3 mr-3 " style="color: black;" data-toggle="tooltip" title="Keranjang Belanja"></i></a>
                            <i class="fas fa-envelope mr-3" data-toggle="tooltip" title="Surat Masuk"></i>
                            <a href="post.php"><i class="fas fa-bell mr-3" data-toggle="tooltip" style="color: black;" title="Akun"></i></a>
                        </h5>
                    </div>

                </div>
            </div>
        </nav>
    </header>










    <section class="konten mt-5">
        <div class="fproduk jumbotron-fluid">
            <img src="foto_produk/<?php echo $detail['foto_produk']; ?>">
        </div>
            <div class="data"  style="color:black; margin-top:900px">
            <h2 style="margin-top: 10px; margin-left: 30px; "><?php echo $detail['nama_produk']; ?></h2>
            <h4 style="margin-top: 10px; margin-left: 30px; ">Rp. <?php echo number_format($detail['harga_produk']); ?></h4>
            <p style="margin-top: 10px; margin-left: 30px; "><?php echo $detail['deskripsi_produk']; ?></p>
        </div>

    </section>
    













    <footer class="bg text-white p-5  bg-dark" style="margin-top:1100px;">
        <div class="row ngisor">
            <div class="col-md-3 ">
                <h5>LAYANAN PELANGGAN</h5>
                <ul style="margin-top: 25px;">
                    <li>Pusat Bantuan</li>
                    <li>Cara Pembelian</li>
                    <li>Pengiriman</li>
                    <li>Cara Pengembalian</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 style="margin-left: 50px ; ">TENTANG KAMI</h5>
                <p style="text-align: justify ; margin-top: 25px;">MU Store adalah sebuah toko online yang menjual
                    produk produk original dari prodok Manchester United. Toko Online ini baru berdiri tahun ini
                    dan reseller toko ini berada di Demak</p>

            </div>
            <div class="col-md-3">
                <h5 style="margin-left: 50px ;">MITRA KERJASAMA</h5>
                <ul style="margin-left: 50px ; margin-top: 25px;">
                    <li>Adidas</li>
                    <li>GOJEK</li>
                    <li>INDOMARET</li>
                    <li>JNE</li>
                </ul>
            </div>
            <div class="col-md-3">
                <h5 style="margin-left: 50px ;">HUBUNGI KAMI</h5>
                <ul style="margin-left: 50px ; margin-top: 25px;">
                    <li>088228659668</li>
                    <li>muofficial.com</li>
                </ul>
            </div>
        </div>
    </footer> 

    <div class="copyright text-center text-white font-weight-bold p-3" style="width: 1500px;">
        <p>Developed by Syaifun Nadhif Maulana Copyright <i class="far fa-copyright"></i> 2021</p>
    </div> 


















































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