<?php
include 'koneksi.php';
$id = $_POST['id'];
$nama = $_POST['nama'];
$harga = $_POST['harga'];
$deskripsi = $_POST['deskripsi'];

$query  = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id = '$id'";
if(mysqli_query($koneksi, $query)){
    echo "
    <script>alert('Data Berhasil di rubah');</script>
    ";
    header("location: index.php");
}else{
    echo "
    <script>alert('Gagal Menyimpan Data');</script>
    ";
    header("location: index.php");
}
?>