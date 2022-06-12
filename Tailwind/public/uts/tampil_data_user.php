<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Document</title>
</head>
<body class="h-64 bg-gradient-to-r from-purple-400 via-purple-600 to-purple-800">
    <header class="w-full py-5">
        <div class="container flex justify-between mx-auto">
            <p class="text-2xl font-bold text-purple-100">TOKO ABC</p>
            <div class="flex gap-10">
                <ul><li><a href="#" class="text-purple-100 hover:text-purple-200">Home</a></li></ul>
                <ul><li><a href="login.html" class="text-purple-100 bg-red-500 hover:bg-red-600 p-2 rounded-sm">Logout</a></li></ul>
            </div>
        </div>
    </header>

    <table class="max-w-7xl w-full mx-auto mt-20 text-neutral-100 text-center">
        <tr class="bg-purple-900 font-bold h-10">
            <td>kode-user</td>
            <td>Nama</td>
            <td>Email</td>
            <td>Telp</td>
            <td>Password</td>
            <td>Peran</td>
            <td>Aksi</td>
        </tr>
        
        <?php
            include('koneksi.php');

            $query = mysqli_query($conn, "SELECT * FROM mhs");
            while ($mydata = mysqli_fetch_array($query)) {
                echo "<tr class='bg-neutral-700 h-10 '>";
                    echo "<td>".$mydata['kode_user']."</td>";
                    echo "<td>".$mydata['nama']."</td>";
                    echo "<td>".$mydata['email']."</td>";
                    echo "<td>".$mydata['telp']."</td>";
                    echo "<td>".$mydata['password']."</td>";
                    echo "<td>".$mydata['peran']."</td>";
                    echo "<td>"."<a class='text-sky-500 hover:text-sky-600 pr-4' href='form_edit.php?id=".$mydata['id']."'>Edit</a>";
                    echo "<a class='text-violet-500 hover:text-violet-600' href='hapus_data.php?id=".$mydata['id']."'>Delete</a>"."</td>";
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>