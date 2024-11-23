<?php
    include 'koneksi.php';

    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query = "INSERT INTO produk (nama, harga, deskripsi) VALUES ('$nama', '$harga', '$deskripsi')";

    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data Berhasil disimpan');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menambah Data');
            window.location.href = 'index.php';
        </script>";
    }
?>