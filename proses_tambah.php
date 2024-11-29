<?php
include 'koneksi.php';

$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$query = "INSERT INTO produk (nama,harga,deskripsi)
VALUES ('$nama','$harga','$deskripsi')";

if(mysqli_query($koneksi, $query)){
    echo "
    <script>alert('Data Berhasil di simpan');</script>
    ";
    header("location: index.php");
}else{
    echo "
    <script>alert('Gagal Menyimpan Data');</script>
    ";
    header("location: index.php");
}
?>