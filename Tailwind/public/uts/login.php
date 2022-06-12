<?php
    session_start();
?>

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
    <div class="container bg-slate-900 w-1/4 mt-40 rounded-2xl p-10 backdrop-blur-lg bg-white/10 shadow-md">
        <div class="">
            <p class="text-3xl font-semibold text-purple-100 mb-3">Login</p>

            <label for="username" class="text-purple-100">Username</label><br>
            <input type="text" name="username" id="username" class="w-full outline-none rounded-md my-2 backdrop-blur-sm bg-white/20 p-1 pl-3"><br>
            <label for="password" class="text-purple-100">Password</label><br>
            <input type="password" name="password" id="password" class="w-full outline-none rounded-md my-2 backdrop-blur-sm bg-white/20 p-1 pl-3">
            <button type="submit" class="bg-purple-800 rounded-md p-1.5 w-full text-purple-100 my-4 hover:bg-purple-900">Sign In</button>
        </div>
    </div>
</body>
</html>
