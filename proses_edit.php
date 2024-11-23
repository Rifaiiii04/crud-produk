<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE produk SET nama='$nama', harga='$harga', deskripsi='$deskripsi' WHERE id='$id'";
    
    $hasil = mysqli_query($koneksi, $query);

    if ($hasil) {
        echo "<script>
        alert('Data Berhasil diEdit');
        window.location.href = 'index.php';
    </script>";
    } else {
        echo "<script>
        alert('Gagal mengedit Data');
        window.location.href = 'index.php';
    </script>";
    }
}
?>
