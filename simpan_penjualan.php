<?php 
include 'koneksi.php';
$no_penjualan = $_POST['no_penjualan'];	
$nama_pelanggan = $_POST['nama_pelanggan'];	
$tanggal = $_POST['tanggal'];	
$total_bayar = $_POST['total_bayar'];	
$bayar = $_POST['bayar'];	
$kembalian = $bayar - $total_bayar; 

$sql = "INSERT INTO penjualan(nama_pelanggan, tanggal, total_bayar, bayar, kembalian) 
        VALUES('$nama_pelanggan', '$tanggal', '$total_bayar', '$bayar', '$kembalian')";

$query = mysqli_query($koneksi, $sql);
if ($query) {
    $update = mysqli_query($koneksi, "UPDATE penjualan_detail SET no_penjualan = '$no_penjualan' WHERE no_penjualan = 'XXX'");
    echo "<script>alert('Data Berhasil Disimpan'); window.location.href='penjualan.php';</script>";
} else {
    echo "<script>alert('Gagal Menyimpan Data'); window.location.href='penjualan.php';</script>";
    };
?>
