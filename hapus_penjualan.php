<?php
include 'koneksi.php';

if (isset($_GET['no_penjualan'])) {
    $no_penjualan = $_GET['no_penjualan'];
    $hapus_detail = "DELETE FROM penjualan_detail WHERE no_penjualan = '$no_penjualan'";
    $hapus_penjualan = "DELETE FROM penjualan WHERE no_penjualan = '$no_penjualan'";
    $hapus_penjualan_detail = "DELETE FROM penjualan_detail WHERE no_penjualan = '$no_penjualan'";

    if (mysqli_query($koneksi, $hapus_detail) && mysqli_query($koneksi, $hapus_penjualan)) {
        echo "<script>alert('Data berhasil dihapus!');</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!');</script>";
    }
}

header("Location: hasil_transaksi.php");
?>
