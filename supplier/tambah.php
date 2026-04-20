<?php
require_once '../config/koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama_supplier = $_POST['nama_supplier'];
    $alamat        = $_POST['alamat'];
    $no_telp       = $_POST['no_telp'];

    $stmt = $koneksi->prepare("INSERT INTO supplier (nama_supplier, alamat, no_telp) VALUES (?, ?, ?)");
    $stmt->execute([$nama_supplier, $alamat, $no_telp]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Supplier</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Tambah Supplier</h2>
    <a href="index.php" class="btn btn-secondary btn-sm mb-3">← Kembali</a>

    <form method="POST">
        <div class="mb-3">
            <label>Nama Supplier</label>
            <input type="text" name="nama_supplier" class="form-control">
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <input type="text" name="alamat" class="form-control">
        </div>
        <div class="mb-3">
            <label>No Telp</label>
            <input type="text" name="no_telp" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
