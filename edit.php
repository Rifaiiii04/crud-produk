<?php include 'koneksi.php';
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
</head>
<body>
    <h2>FORM EDIT DATA</h2>
    <form  action="proses_edit.php" method="POST">
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <td>ID Produk</td>
            <td><input type="text" name="id" readonly="" value="<?=$baris['id'];?>"></td>
        </tr>
        <tr>
            <td>Nama Produk</td>
            <td><input type="text" name="nama" value="<?=$baris['nama'];?>"></td>
        </tr>
        <tr>
            <td>Harga Produk</td>
            <td><input type="text" name="harga" value="<?=$baris['harga'];?>"></td>
        </tr>
        <tr>
            <td>Deskripsi</td>
            <td><textarea name="deskripsi"><?=$baris['deskripsi'];?></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Update"></td>
        </tr>
    </table>
    </form>
</body>
</html>