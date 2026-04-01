<?php
include "../config/koneksi.php";

if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = MD5($_POST['password']);

    mysqli_query($conn,"INSERT INTO users VALUES(NULL,'$user','$pass','petugas')");
    echo "Berhasil tambah petugas";
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <button name="submit">Daftar</button>
</form>
<link rel="stylesheet" href="../css/style.css">