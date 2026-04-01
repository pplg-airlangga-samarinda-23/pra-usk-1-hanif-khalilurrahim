<?php session_start(); if($_SESSION['role']!='admin'){header("Location:../auth/login.php");} ?>

<h2>Dashboard Admin</h2>

<ul>
    <li><a href="register.php">Registrasi Petugas</a></li>
    <li><a href="produk.php">Data Produk</a></li>
    <li><a href="transaksi.php">Transaksi</a></li>
    <li><a href="laporan.php">Laporan</a></li>
    <li><a href="../auth/logout.php">Logout</a></li>
</ul>

<link rel="stylesheet" href="../css/style.css">