<?php 
    include 'koneksi.php';
    $id = $_GET['id'];
    $query = "SELECT * FROM produk WHERE id=$id";
    $hasil = mysqli_query($koneksi, $query);
    $baris = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM EDIT DATA</title>
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

        .container {
            background: rgba(255, 255, 255, 0.2); /* Semi-transparent background */
            border-radius: 15px;
            padding: 30px;
            backdrop-filter: blur(10px); /* Glassmorphism effect */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            color: black;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            background-color: rgba(255, 255, 255, 0.1);
            color: black;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            outline: none;
            border-color: rgba(255, 255, 255, 0.7);
            background-color: rgba(255, 255, 255, 0.2);
        }

        button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Form Edit Data</h2>
        <form action="proses_edit.php" method="post">
            <table>
                <tr>
                    <td>ID PRODUK</td>
                    <td><input type="text" name="id" readonly value="<?= $baris['id']; ?>"></td>
                </tr>
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="nama" value="<?= $baris['nama']; ?>"></td>
                </tr>
                <tr>
                    <td>Harga Produk</td>
                    <td><input type="number" name="harga" value="<?= $baris['harga']; ?>"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi"><?= $baris['deskripsi']; ?></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit">Edit Data</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
