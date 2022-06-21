<?php

// koneksi ke database
$koneksi = new mysqli('localhost', 'root', '', 'exmount');


function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// Tamabah

function tambah($data)
{
    global $conn;
    $nama_mount = htmlspecialchars($data["nama_mount"]);
    $lokasi_mount  = htmlspecialchars($data["lokasi_mount"]);
    $foto_mount = htmlspecialchars($data["foto_mount"]);
    $harga_tiket = htmlspecialchars($data["harga_tiket"]);
    $desk_mount = htmlspecialchars($data["desk_mount"]);

    $query = "INSERT INTO mount VALUES ('', '$nama_mount','$lokasi_mount','$foto_mount','$harga_tiket','$desk_mount')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// Hapus

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM mount WHERE id = $id");

    return mysqli_affected_rows($conn);
}

// Ubah

function ubah($data)
{
    global $conn;
    $id = $data["id_mount"];
    $nama_mount = htmlspecialchars($data["nama_mount"]);
    $lokasi_mount  = htmlspecialchars($data["lokasi_mount"]);
    $foto_mount = htmlspecialchars($data["foto_mount"]);
    $harga_tiket = htmlspecialchars($data["harga_tiket"]);
    $desk_mount = htmlspecialchars($data["desk_mount"]);

    $query = "UPDATE mount SET
                nama_mount = '$nama_mount',
                lokasi_mount = '$lokasi_mount',
                foto_mount = '$foto_mount',
                harga_tiket = '$harga_tiket',
                desk_mount = ''$desk_mount''
              WHERE id_mount = $id
                ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

// cari

function cari($keyword)
{
    $query = "SELECT * FROM mount
                WHERE
                nama_mount LIKE '%$keyword%' OR
                lokasi_mount LIKE '%$keyword%' OR
                foto_mount LIKE '%$keyword%' OR
                harga_tiket LIKE '%$keyword%' OR
                desk_mount LiKE '%$keyword%'
                ";
    return query($query);
}
