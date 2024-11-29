<?php
include 'koneksi.php';
$query = "SELECT * FROM penjualan ORDER BY tanggal DESC";
$hasil = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Transaksi</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h1>Hasil Transaksi Penjualan</h1>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <tr bgcolor="yellow">
            <th>No Penjualan</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal</th>
            <th>Total Bayar</th>
            <th>Bayar</th>
            <th>Kembalian</th>
        </tr>
        <?php while ($baris = mysqli_fetch_assoc($hasil)): ?>
        <tr>
            <td><?= $baris['no_penjualan']; ?></td>
            <td><?= $baris['nama_pelanggan']; ?></td>
            <td><?= $baris['tanggal']; ?></td>
            <td><?= number_format($baris['total_bayar'], 0, ',', '.'); ?></td>
            <td><?= number_format($baris['bayar'], 0, ',', '.'); ?></td>
            <td><?= number_format($baris['bayar'] - $baris['total_bayar'], 0, ',', '.'); ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
    <br>
    <a href="transaksi_penjualan.php" style="text-decoration: none;">Kembali ke Transaksi Penjualan</a>
</body>
</html>
