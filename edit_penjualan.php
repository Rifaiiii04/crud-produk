<?php
include 'koneksi.php';

if (isset($_GET['no_penjualan'])) {
    $no_penjualan = $_GET['no_penjualan'];
    $query = "SELECT * FROM penjualan WHERE no_penjualan = '$no_penjualan'";
    $hasil = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($hasil);

    if (!$data) {
        echo "Data tidak ditemukan!";
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $no_penjualan = $_POST['no_penjualan'];
    $tanggal = $_POST['tanggal'];
    $nama_pelanggan = $_POST['nama_pelanggan'];
    $total_bayar = $_POST['total_bayar'];
    $bayar = $_POST['bayar'];

    $update = "UPDATE penjualan SET 
                tanggal = '$tanggal', 
                nama_pelanggan = '$nama_pelanggan', 
                total_bayar = '$total_bayar', 
                bayar = '$bayar' 
                WHERE no_penjualan = '$no_penjualan'";

    if (mysqli_query($koneksi, $update)) {
        echo "<script>alert('Data berhasil diperbarui!');</script>";
        header("Location: hasil_transaksi.php");
    } else {
        echo "Gagal memperbarui data!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
</head>
<body>
    <h1>Edit Transaksi</h1>
    <form action="" method="post">
        <input type="hidden" name="no_penjualan" value="<?= $data['no_penjualan']; ?>">
        <label for="tanggal">Tanggal Penjualan:</label>
        <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal']; ?>" required><br><br>
        <label for="nama_pelanggan">Nama Pelanggan:</label>
        <input type="text" id="nama_pelanggan" name="nama_pelanggan" value="<?= $data['nama_pelanggan']; ?>" required><br><br>
        <label for="total_bayar">Total Bayar:</label>
        <input type="text" id="total_bayar" name="total_bayar" value="<?= $data['total_bayar']; ?>" required><br><br>
        <label for="bayar">Bayar:</label>
        <input type="text" id="bayar" name="bayar" value="<?= $data['bayar']; ?>" required><br><br>
        <button type="submit">Simpan</button>
        <a href="hasil_transaksi.php">Batal</a>
    </form>
</body>
</html>
