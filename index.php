<?php 
include 'koneksi.php';

$cari = "";
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    $query = "SELECT * FROM produk WHERE nama LIKE '%$cari%'";
} else {
    $query = "SELECT * FROM produk";
}

$hasil = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #cfd9df 0%, #e2ebf0 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        
        .container {
            max-width: 800px;
            width: 90%;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(8px);
            border-radius: 10px;
            padding: 20px;
            color: #333;
        }

        
        .container a, .container button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            text-decoration: none;
            color: #fff;
            background-color: #6c63ff;
            border-radius: 5px;
            transition: background 0.3s;
        }
        
        .container a:hover, .container button:hover {
            background-color: #5753d5;
        }

        form {
            text-align: center;
        }

        form input[type="text"] {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 70%;
        }

        /* Table styling */
        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(4px);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            text-align: center;
            color: #333;
        }

        th {
            background: rgba(0, 0, 0, 0.3);
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.1);
        }

        tr:hover {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .wow{
            margin-bottom: 10px;
            height: 50px;
        }

        .wow a{
            position: relative;
            bottom: 13px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Data Produk</h2>
        <a href="tambah.php">Tambah Data</a>
        <form action="index.php" method="get">
            <label for="cari">Cari Produk:</label>
            <input type="text" name="cari" id="cari" value="<?= htmlspecialchars($cari) ?>">
            <button type="submit">Cari</button>
        </form>
        <button class="wow"><a href="index.php">Refresh</a></button>
        <button class="wow"><a href="penjualan.php">Transaksi Penjualan</a></button>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($baris = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td><?= $baris['nama']; ?></td>
                    <td><?= $baris['harga']; ?></td>
                    <td><?= $baris['deskripsi']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $baris['id'] ?>">Edit</a>
                        <a href="hapus.php?id=<?= $baris['id'] ?>" onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>  
    </div>
</body>
</html>
