CREATE DATABASE db_inventaris;

USE db_inventaris;

CREATE TABLE barang (
  id INT AUTO_INCREMENT PRIMARY KEY,
  kode VARCHAR(20),
  nama_barang VARCHAR(100),
  stok INT,
  satuan VARCHAR(20)
);

CREATE TABLE supplier (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nama_supplier VARCHAR(100),
  alamat TEXT,
  no_telp VARCHAR(15)
);

CREATE TABLE transaksi (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_barang INT,
  jenis ENUM('masuk', 'keluar'),
  jumlah INT,
  tanggal DATE,
  keterangan TEXT,
  FOREIGN KEY (id_barang) REFERENCES barang(id)
);
