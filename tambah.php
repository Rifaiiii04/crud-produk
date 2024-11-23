<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM TAMBAH DATA</title>
    <style>
        /* Background settings */
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

        /* Form container styling */
        .container {
            max-width: 500px;
            width: 90%;
            background: rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(8px);
            border-radius: 10px;
            padding: 20px;
            color: #333;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        td {
            padding: 12px;
            color: #333;
        }

        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background: rgba(255, 255, 255, 0.2);
            color: #333;
            outline: none;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #6c63ff;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        button:hover {
            background-color: #5753d5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>FORM TAMBAH DATA</h2>
        <form action="proses_tambah.php" method="post">
            <table>
                <tr>
                    <td>Nama Produk</td>
                    <td><input type="text" name="nama" required></td>
                </tr>
                <tr>
                    <td>Harga Produk</td>
                    <td><input type="number" name="harga" required></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="deskripsi" required></textarea></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit">Tambah Data</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
