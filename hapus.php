<?php
include 'koneksi.php';

$id = $_GET['id'];


if (isset($id) && is_numeric($id)) {
    $query = "DELETE FROM produk WHERE id = $id";
    
    if (mysqli_query($koneksi, $query)) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            window.location.href = 'index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak valid');
        window.location.href = 'index.php';
    </script>";
}
?>
