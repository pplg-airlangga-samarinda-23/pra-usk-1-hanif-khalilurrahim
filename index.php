<?php
session_start();

// Jika belum login → arahkan ke login
if(!isset($_SESSION['login'])){
    header("Location: auth/login.php");
    exit;
}

// Jika sudah login → arahkan sesuai role
if($_SESSION['role'] == 'admin'){
    header("Location: admin/dashboard.php");
} else {
    header("Location: petugas/dashboard.php");
}
exit;
?>