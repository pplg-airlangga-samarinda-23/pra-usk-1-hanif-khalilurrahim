<?php include "../config/koneksi.php"; ?>

<h2>Data Produk</h2>

<form method="POST">
    <input type="text" name="nama" placeholder="Nama Produk">
    <input type="number" name="harga" placeholder="Harga">
    <input type="number" name="stok" placeholder="Stok">
    <button name="tambah">Tambah</button>
</form>

<?php
if(isset($_POST['tambah'])){
    mysqli_query($conn,"INSERT INTO produk VALUES(NULL,'$_POST[nama]','$_POST[harga]','$_POST[stok]')");
}
?>

<table>
<tr><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th></tr>

<?php
$data = mysqli_query($conn,"SELECT * FROM produk");
while($d = mysqli_fetch_array($data)){
?>
<tr>
<td><?= $d['nama'] ?></td>
<td><?= $d['harga'] ?></td>
<td><?= $d['stok'] ?></td>
<td>
    <a href="?hapus=<?= $d['id'] ?>">Hapus</a>
</td>
</tr>
<?php } ?>

</table>

<?php
if(isset($_GET['hapus'])){
    mysqli_query($conn,"DELETE FROM produk WHERE id=$_GET[hapus]");
}
?>
<link rel="stylesheet" href="../css/style.css">