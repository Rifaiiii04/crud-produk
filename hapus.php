<?php 
include 'koneksi.php';
$id = $_GET['id'];

$query = "DELETE FROM produk WHERE id='$id'";
if(mysqli_query($koneksi, $query)){
    echo "
    <script>alert('Data Berhasil di hapus');</script>
    ";
    header("location: index.php");
}else{
    echo "
    <script>alert('Gagal Menghapus Data');</script>
    ";
    header("location: index.php");
}
?>