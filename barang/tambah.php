<?php
require_once '../config/koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kode       = $_POST['kode'];
    $nama_barang = $_POST['nama_barang'];
    $stok       = $_POST['stok'];
    $satuan     = $_POST['satuan'];

    $stmt = $koneksi->prepare("INSERT INTO barang (kode, nama_barang, stok, satuan) VALUES (?, ?, ?, ?)");
    $stmt->execute([$kode, $nama_barang, $stok, $satuan]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Tambah Barang</h2>
    <a href="index.php" class="btn btn-secondary btn-sm mb-3">← Kembali</a>

    <form method="POST">
        <div class="mb-3">
            <label>Kode Barang</label>
            <input type="text" name="kode" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
        </div>
        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>
        <div class="mb-3">
            <label>Satuan</label>
            <input type="text" name="satuan" class="form-control" placeholder="pcs / kg / lusin">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
