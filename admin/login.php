<?php
session_start();
include 'fungsi.php';



?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Login</title>
</head>

<body>

    <div class="container" style=" color: #DB1D24;">

        <h4><img src="MU.png" alt="" style="margin-top: 40px;">FORM LOGIN</h4>
        <hr>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="">Username</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><b>@</b></div>
                    </div>
                    <input type="text" name="user" class="form-control" placeholder="Masukkan Username" required />
                </div>
            </div>

            <div class="form-group">
                <label for="">Password</label>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-unlock"></i></div>
                    </div>
                    <input type="password" name="pass" class="form-control" placeholder="Masukkan Password" required />
                </div>
            </div>

            <div class="form-group">
                <label class="checkbox-inline">
                    <input type="checkbox" /> Remember me
                </label>
                <span class="pull-right">
                    <a href="#">Forget password ? </a>
                </span>
            </div>

            <button class="btn btn-primary" name="login">Login</button>
            <hr />
            Not register ? <a href="registeration.html">click here </a>
        </form>





        <?php

        if (isset($_POST['login'])) {
            $ambil = $koneksi->query("SELECT * FROM admin_mount WHERE username='$_POST[user]' AND pass='$_POST[pass]'");

            $yangcocok = $ambil->num_rows;

            if ($yangcocok == 1) {
                $_SESSION['admin_mount'] = $ambil->fetch_assoc();
                echo "<div class='alert alert-info'>Login Sukses</div>";
                echo "<meta http-equiv='refresh' content='1;url=index.php'>";
            } else {
                echo "<div class='alert alert-danger'>Login Gagal</div>";
                echo "<meta http-equiv='refresh' content='1;url=login.php'>";
            }
        }



        ?>
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
</body>

</html>