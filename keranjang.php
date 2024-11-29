<?php
include 'koneksi.php';
$no_penjualan = "XXX";
$produk_id = $_POST['produk_id'];
$jumlah = $_POST['jumlah'];

$sql = "INSERT INTO penjualan_detail (no_penjualan, produk_id, jumlah)
		VALUES ('$no_penjualan','$produk_id','$jumlah')";
$query = mysqli_query($koneksi, $sql);
if($query){
	echo "<script>alert('Berhasil di simpan ke keranjang');</script>";
	echo "<script>window.location.href='penjualan.php';</script>";
}else{
	echo "<script>alert('Gagal Menyimpan ke keranjang');</script>";
	echo "<script>window.location.href='penjualan.php';</script>";
}
?>