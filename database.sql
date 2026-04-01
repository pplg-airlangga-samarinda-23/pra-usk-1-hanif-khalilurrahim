CREATE DATABASE kasir;

USE kasir;

-- USER
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    role ENUM('admin','petugas')
);

-- PRODUK
CREATE TABLE produk (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    harga INT,
    stok INT
);

-- TRANSAKSI
CREATE TABLE transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    tanggal DATETIME DEFAULT CURRENT_TIMESTAMP,
    total INT
);

-- DETAIL TRANSAKSI
CREATE TABLE detail_transaksi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    transaksi_id INT,
    produk_id INT,
    jumlah INT,
    subtotal INT
);

-- ADMIN DEFAULT
INSERT INTO users VALUES (NULL,'admin',MD5('admin'),'admin');