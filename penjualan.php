<?php include 'koneksi.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Transaksi Penjualan</title>
</head>
<body>
	<h1>Transaksi Penjualan</h1>
	<button><a href="hasil_transaksi.php" style="text-decoration: none;">Lihat Hasil Transaksi</a></button>
  	<table border="1" width="100%" cellpadding="1" cellspacing="0">
  		<tr>
  			<td width="70%">
  				<form action="keranjang.php" method="post">
  					<table border="1" width="100%">
  						<tr>
  							<td>Nama Produk</td>
  							<td>No</td>
  							<td>Jumlah</td>
  							<td>Harga</td>
  							<td>Total</td>
  						</tr>
  						<tr>
  							<td>
  								<select name="produk_id">
  							<?php 
  							$sql = "SELECT * FROM produk";
  							$query = mysqli_query($koneksi, $sql);
  							while($baris = mysqli_fetch_assoc($query)):?>
  					<option value="<?=$baris['id'];?>"><?=$baris['nama'];?></option>
  							<?php endwhile; ?>
  								</select>
  							</td>
  							<td><input type="number" name="jumlah" value="1"></td>
  							<td colspan="3"><input type="submit" name="aksi" value="cekout"></td>
  						</tr>
  <?php
  $nomor = 1;
  $total_bayar = 0;
  $sql = "SELECT penjualan_detail.*, produk.nama, produk.harga 
  FROM penjualan_detail
  INNER JOIN produk ON penjualan_detail.produk_id = produk.id WHERE penjualan_detail.no_penjualan = 'XXX'";
  $query = mysqli_query($koneksi, $sql);
  while ($baris = mysqli_fetch_assoc($query)):
  $nomor++;
  $total = $baris['jumlah'] * $baris['harga'];
  $total_bayar += $total;
  ?>
  						<tr>
  							<td><?=$nomor;?></td>
  							<td><?=$baris['nama'];?></td>
  							<td><?=$baris['jumlah'];?></td>
  							<td><?=$baris['harga'];?></td>
  							<td><?=$total;?></td>
  						</tr>
  					<?php endwhile;?>
  					</table>
  				</form>
  			</td>
  			<td width="30%">
  				<form action="simpan_penjualan.php" method="post">
                    <table border="0" width="100%">
                        <tr>
                            <td>No Penjualan</td>
                            <td><input type="text" name="no_penjualan" value="<?=date('YmdHis');?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Tanggal Penjualan</td>
                            <td><input type="date" name="tanggal"></td>
                        </tr>
                        <tr>
                            <td>Nama Pelanggan</td>
                            <td><input type="text" name="nama_pelanggan"></td>
                        </tr>
                        <tr>
                            <td>Total Bayar</td>
                            <td><input type="text" name="total_bayar" value="<?=$total_bayar;?>"></td>
                        </tr>
                        <tr>
                            <td>Bayar</td>
                            <td><input type="text" value="0" name="bayar"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Simpan"></td>
                        </tr>
                    </table>
                </form>
  			</td>
  		</tr>
  	</table>
</body>
</html>