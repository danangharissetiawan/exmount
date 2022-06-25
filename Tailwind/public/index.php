<?php
session_start();
include 'fungsi.php';
if (!isset($_SESSION['users'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');

    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link src="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>

<?php
if (isset($_GET['halaman'])) {
    if ($_GET['halaman'] == "produk") {
        include 'navbar.php';
        include 'produk.php';
    } elseif ($_GET['halaman'] == "keranjang") {
        include 'navbar.php';
        include 'keranjang.php';
    } elseif ($_GET['halaman'] == "beli") {
        include 'beli.php';
    } elseif ($_GET['halaman'] == "profil") {
        include 'profil.php';
    } elseif ($_GET['halaman'] == "checkout") {
        include 'checkout.php';
    } elseif ($_GET['halaman'] == "home") {
        include 'navbar.php';
        include 'home.php';
    } elseif ($_GET['halaman'] == "history") {
        include 'navbar.php';
        include 'history.php';
    }
} else {
    include 'logout';
}
?>

<body>







    <div class=" bg-orange-200 text-center ">
        <p class="font-semibold text-sm md:text-md p-5">copyright &copy; 2022 rpl</p>
    </div>

    <script src="./js/script.js"></script>
</body>

</html>