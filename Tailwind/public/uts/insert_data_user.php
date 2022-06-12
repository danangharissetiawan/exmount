<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="h-64 bg-gradient-to-r from-purple-400 via-purple-600 to-purple-800">
    <div class="w-full mx-auto max-w-lg mt-20 bg-purple-900 overflow-hidden rounded-lg">

        <form action="simpan_data_user.php" method="POST">
            <p class="w-full mx-12 my-6 font-bold text-white text-2xl">Form Data User</p>
            <!-- Nama -->
            <div class="w-full mx-12 my-6">
                <input class="w-96 bg-purple-800 mt-4 p-2 rounded-md text-white focus:outline-none pl-3" type="text" name="nama" id="" placeholder="Nama">
                <input class="w-96 bg-purple-800 mt-4 p-2 rounded-md text-white focus:outline-none pl-3" type="email" name="email" id="" placeholder="Email">
                <input class="w-96 bg-purple-800 mt-4 p-2 rounded-md text-white focus:outline-none pl-3" type="text" name="telp" id="" placeholder="Telp">
                <input class="w-96 bg-purple-800 mt-4 p-2 rounded-md text-white focus:outline-none pl-3" type="password" name="password" id="" placeholder="Password">
                <input class="w-96 bg-purple-800 mt-4 p-2 rounded-md text-white focus:outline-none pl-3" type="text" name="peran" id="" placeholder="Peran">
                <input class="w-96 bg-purple-800 mt-4 p-2 rounded-md text-white focus:outline-none pl-3" type="number" name="kodeuser" id="" placeholder="Kode User">
            </div>

            <!-- Submit -->
            <input class="mx-12 w-24 cursor-pointer text-white bg-neutral-800 p-2 rounded-md mb-10 mt-2 hover:opacity-80" type="submit" value="Kirim">

        </form>
    </div>
</body>
</html>