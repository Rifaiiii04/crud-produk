<?php 
    include 'koneksi.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['aksi']) && $_POST['aksi'] === 'simpan' ){
        
        $no_penjualan = "XXX";
        $produk_id = mysqli_real_escape_string($koneksi, $_POST['produk_id']);
        $jumlah = (int) $_POST['jumlah'];

        $sql = "INSERT INTO penjualan_detail (no_penjualan,produk_id, jumlah) 
        VALUES('$no_penjualan', '$produk_id', '$jumlah')";
        $query = mysqli_query($koneksi, $sql);

        if($query){
            echo "<script>
            alert('Produk Berhasil di simpan');
            window.location.href = 'penjualan.php';
          </script>";
        }else{
            echo "<script>
            alert('Produk Gagal di simpan');
            window.location.href = 'penjualan.php';
          </script>";
        };
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Penjualan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8ecf1;
            margin: 0;
            padding: 0;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            width: 90%;
            background-color: #ffffff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
        }

        th {
            background-color: #6a85cf;
            color: #ffffff;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8;
        }

        tr:hover {
            background-color: #d9e4f5;
        }

        input[type="number"], select {
            width: 90%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #6a85cf;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #566bbf;
        }

        button {
            background-color: #6a85cf;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 10px;
        }

        button:hover {
            background-color: #566bbf;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h1 {
            color: #333;
        }
    </style>
</head>
<body>
    <a href="index.php"><button>Back</button></a>
    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <tr>
            <td width="70%">
                <form name="penjualan" action="" method="post">
                    <table border="1" width="100%" cellpadding="5" cellspacing="0">
                        <tr>
                            <td>Nama Barang</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td>Total</td>
                        </tr>
                        <tr>
                            <td><select name="produk_id">
                            <?php $sql = "SELECT * FROM produk";
                                     $query = mysqli_query($koneksi, $sql);
                                  while($baris = mysqli_fetch_assoc($query)):?>
                                    <option value="<?= $baris['id'] ?>"><?= $baris['nama'] ?></option>
                                 <?php endwhile; ?>
                            </select></td>
                            <td><input type="number" name="jumlah" value="1"></td>
                            <td><input type="submit" name="aksi" value="simpan"></td>
                            <td>0</td>
                        </tr>
                        <tr>
                        <?php
                            $total = 0;
                             $sql = "SELECT penjualan_detail.*, produk.nama, produk.harga FROM produk 
                            INNER JOIN penjualan_detail ON produk.id = penjualan_detail.produk_id";
                            $query = mysqli_query($koneksi, $sql);
                            while($baris = mysqli_fetch_assoc($query)):
                            $total = $baris['jumlah'] * $baris['harga'];  
                            ?>
                            <td><?= $baris['nama']; ?></td>
                            <td><?= $baris['jumlah']; ?></td>
                            <td>Rp. <?= number_format($baris['harga']); ?></td>
                            <td>Rp. <?= number_format($total);?></td>
                            
                        </tr>
                        <?php endwhile; ?>
                    </table>
                </form>
            </td>
            <td width="30%">
                <form action="" name="simpan_penjualan" method="post">
                <table width="100%" border="1" cellpadding="1" cellspacing="0">
                    <tr>
                        <td>No Penjualan</td>
                        <td><input type="text" value=""></td>
                    </tr>
                    <tr>
                        <td>Tanggal Penjualan</td>
                        <td><input type="date" value=""></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td><input type="text" value=""></td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td><input type="text" value=""></td>
                    </tr>
                    <tr>
                        <td>Bayar</td>
                        <td><input type="text" value=""></td>
                    </tr>
                    <tr>
                        <td>Kembalian</td>
                        <td><input type="text" value=""></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" name="selesai" value="selesai">
                        </td>
                    </tr>
                </table>
            </form>
            </td>
        </tr>
    </table>
</body>
</html>

