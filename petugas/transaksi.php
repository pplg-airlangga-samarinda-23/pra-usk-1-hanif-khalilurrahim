<?php
session_start();
include "../config/koneksi.php";

if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

if(isset($_POST['tambah'])){
    $_SESSION['cart'][] = [
        'id'=>$_POST['id'],
        'nama'=>$_POST['nama'],
        'harga'=>$_POST['harga']
    ];
}

if(isset($_POST['checkout'])){
    $total = 0;
    foreach($_SESSION['cart'] as $c){
        $total += $c['harga'];
    }

    mysqli_query($conn,"INSERT INTO transaksi(total) VALUES('$total')");
    $id_transaksi = mysqli_insert_id($conn);

    foreach($_SESSION['cart'] as $c){
        mysqli_query($conn,"INSERT INTO detail_transaksi VALUES(NULL,'$id_transaksi','$c[id]',1,'$c[harga]')");
    }

    $_SESSION['cart'] = [];
    echo "Transaksi berhasil";
}
?>

<h2>Transaksi</h2>

<div class="container">

<!-- PANEL PRODUK -->
<div class="produk">
<?php
$data = mysqli_query($conn,"SELECT * FROM produk");
while($p = mysqli_fetch_array($data)){
?>
<form method="POST">
    <input type="hidden" name="id" value="<?= $p['id'] ?>">
    <input type="hidden" name="nama" value="<?= $p['nama'] ?>">
    <input type="hidden" name="harga" value="<?= $p['harga'] ?>">
    <p><?= $p['nama'] ?> - <?= $p['harga'] ?></p>
    <button name="tambah">Tambah</button>
</form>
<?php } ?>
</div>

<!-- KERANJANG -->
<div class="keranjang">
<h3>Keranjang</h3>
<?php
$total=0;
foreach($_SESSION['cart'] as $c){
    echo $c['nama']." - ".$c['harga']."<br>";
    $total += $c['harga'];
}
?>
<p>Total: <?= $total ?></p>

<form method="POST">
    <button name="checkout">Bayar</button>
</form>
</div>

</div>
<link rel="stylesheet" href="../css/style.css">