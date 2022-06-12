<?php
session_start();
//koneksi
$koneksi = mysqli_connect('localhost', 'root', '', 'exmount');

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




  if ($ada == 1) {
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
}

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="login.css">
  <title>Hello, world!</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-6">
        <div class="pict">
          <img src="aditya.jpg" class="float-start img-fluid mt-5" alt="...">
        </div>
      </div>
      <div class="col-6">
        <div class="logo mt-3 text-end">
          <img src="img/mount.svg" class="mb-3" alt="" width="35" height="66">
          <p class="d-inline fw-bold">ExMount</p>
        </div>

        <div class="row justify-content-center mt-3">
          <div class="col-8">
            <div class="form-main">
              <p class="text-center pe-5">Welcome to lorem.....</p>

              <div class="slide-control text-center mb-4">
                <input type="radio" name="slider" id="login" cheked>
                <input type="radio" name="slider" id="regis">
                <label for="login" class="slide login">Login</label>
                <label for="regis" class="slide regis">Register</label>
                <div class="slide-tab"></div>
              </div>

              <div class="form-inner">
                <form method="post" class="login">
                  <!-- username -->
                  <div class="field pb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your Username" required>
                  </div>

                  <!-- pass -->
                  <div class="field pb-3">
                    <label for="pass" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter your Password" required>
                  </div>

                  <!-- checkbox -->
                  <div class="form-check pb-4 ms-1">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Remember me
                    </label>
                  </div>

                  <!-- submit -->
                  <div class="row justify-content-end">
                    <div class="col-8">
                      <button name="login" class="button align-self-end" type="submit">Login</button>
                    </div>
                  </div>
                </form>


                <form method="post" class="regis">
                  <!-- email -->
                  <div class="field pb-3">
                    <label for="email" class="form-label fw-bold">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your Email" required>
                  </div>

                  <!-- username -->
                  <div class="field pb-3">
                    <label for="username" class="form-label fw-bold">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your Username" required>
                  </div>

                  <!-- pass -->
                  <div class="field pb-3">
                    <label for="pass" class="form-label fw-bold">Password</label>
                    <input type="password" class="form-control" name="pass" placeholder="Enter your Password" required>
                  </div>

                  <!-- checkbox -->
                  <div class="form-check pb-4 ms-1">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault">
                      Remember me
                    </label>
                  </div>

                  <!-- submit -->
                  <div class="row justify-content-end">
                    <div class="col-8">
                      <button type="submit" class="button align-self-end" name="register">Register</button>
                    </div>
                  </div>
                </form>

              </div>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
  <script>
    // const loginText = document.querySelector(".title-text .login");
    const loginForm = document.querySelector("form.login");
    const signupForm = document.querySelector("form.regis");
    const loginBtn = document.querySelector("label.login");
    const signupBtn = document.querySelector("label.regis");
    // const signupLink = document.querySelector("form .signup-link a");
    signupBtn.onclick = (() => {
      loginForm.style.marginLeft = "-50%";
      // loginText.style.marginLeft = "-50%";
    });
    loginBtn.onclick = (() => {
      loginForm.style.marginLeft = "0%";
      // loginText.style.marginLeft = "0%";
    });
    // signupLink.onclick = (()=>{
    //   signupBtn.click();
    //   return false;
    // });
  </script>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>