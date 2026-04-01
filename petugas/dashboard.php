<?php 
session_start(); 

if($_SESSION['role'] != 'petugas'){
    header("Location: ../auth/login.php");
    exit;
}
?>

<h2>Dashboard Petugas</h2>

<ul>
    <li><a href="produk.php">Data Produk</a></li>
    <li><a href="transaksi.php">Transaksi</a></li>
    <li><a href="../auth/logout.php">Logout</a></li>
</ul>

<link rel="stylesheet" href="../css/style.css">