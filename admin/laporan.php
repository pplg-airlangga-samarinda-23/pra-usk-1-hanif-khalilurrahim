<?php include "../config/koneksi.php"; ?>

<h2>Laporan Penjualan</h2>

<button onclick="window.print()">Print</button>

<table>
<tr><th>Tanggal</th><th>Total</th></tr>

<?php
$data = mysqli_query($conn,"SELECT * FROM transaksi");
while($d = mysqli_fetch_array($data)){
?>
<tr>
<td><?= $d['tanggal'] ?></td>
<td><?= $d['total'] ?></td>
</tr>
<?php } ?>
</table>
<link rel="stylesheet" href="../css/style.css">