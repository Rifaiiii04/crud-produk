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
  	<table border="1" width="100%" cellpadding="1" cellspacing="0">
  		<tr>
  			<td width="70%">
  				<form action="keranjang.php" method="post">
  					<table border="1" width="100%">
  						<tr>
  							<td>No</td>
  							<td>Nama Produk</td>
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
  $sql = "SELECT penjualan_detail.*, produk.nama, produk.harga 
  FROM penjualan_detail
  INNER JOIN produk ON penjualan_detail.produk_id = produk.id";
  $query = mysqli_query($koneksi, $sql);
  while ($baris = mysqli_fetch_assoc($query)):
  $nomor++;
  $total = $baris['jumlah'] * $baris['harga'];
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
  				
  			</td>
  		</tr>
  	</table>
</body>
</html>