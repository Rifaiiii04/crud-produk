<?php
include 'koneksi.php';
$pencarian = isset($_GET['pencarian']) ? $_GET['pencarian'] : '';

// Set data per halaman
$dataPerHalaman = 2;

// Cek halaman saat ini
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$awalData = ($halaman - 1) * $dataPerHalaman;

// Query untuk mendapatkan data dengan limit dan pencarian
$query = "SELECT * FROM produk WHERE nama LIKE '%$pencarian%' LIMIT $awalData, $dataPerHalaman";
$hasil = mysqli_query($koneksi, $query);

// Query untuk mendapatkan total data tanpa limit
$queryTotal = "SELECT COUNT(*) AS total FROM produk WHERE nama LIKE '%$pencarian%'";
$hasilTotal = mysqli_query($koneksi, $queryTotal);
$totalData = mysqli_fetch_assoc($hasilTotal)['total'];

// Hitung total halaman
$totalHalaman = ceil($totalData / $dataPerHalaman);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PRODUK</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <h2>Data Produk</h2>
    <button><a href="tambah.php">+Tambah Data</a></button> &nbsp;
    <button><a href="penjualan.php">Transaksi Penjualan</a></button>
    <form method="GET" action="index.php">
        <input type="text" name="pencarian" placeholder="Cari Data..." value="<?= $pencarian; ?>">
        <button type="submit">Cari</button>
        <button><a href="index.php">Refresh</a></button>
    </form>
    <table width="100%" cellpadding="5" cellspacing="0" border="1">
        <tr bgcolor="yellow">
            <td>Nama Produk</td>
            <td>Harga</td>
            <td>Deskripsi</td>
            <td>Aksi</td>
        </tr>
        <?php while($baris = mysqli_fetch_assoc($hasil)): ?>
        <tr>
            <td><?= $baris['nama']; ?></td>
            <td><?= $baris['harga']; ?></td>
            <td><?= $baris['deskripsi']; ?></td>
            <td>
                <a href="edit.php?id=<?= $baris['id']; ?>">Edit</a>
                <a href="hapus.php?id=<?= $baris['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <!-- Navigasi Paginasi -->
    <div style="margin-top: 10px;">
        <?php if ($halaman > 1): ?>
            <a href="index.php?halaman=<?= $halaman - 1; ?>&pencarian=<?= $pencarian; ?>">Sebelumnya</a>
        <?php endif; ?>

        <?php for ($i = 1; $i <= $totalHalaman; $i++): ?>
            <a href="index.php?halaman=<?= $i; ?>&pencarian=<?= $pencarian; ?>" <?= $i == $halaman ? 'style="font-weight: bold;"' : ''; ?>><?= $i; ?></a>
        <?php endfor; ?>

        <?php if ($halaman < $totalHalaman): ?>
            <a href="index.php?halaman=<?= $halaman + 1; ?>&pencarian=<?= $pencarian; ?>">Selanjutnya</a>
        <?php endif; ?>
    </div>
</body>
</html>
