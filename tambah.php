<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORM TAMBAH DATA</title>
</head>
<body>
    <h2>FORM TAMBAH DATA</h2>
    <form  action="proses_tambah.php" method="POST">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama"></td>
        </tr>
        <tr>
            <td>Harga Produk</td>
            <td><input type="text" name="harga"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><textarea name="deskripsi"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Tambah"></td>
        </tr>
    </table>
    </form>
</body>
</html>