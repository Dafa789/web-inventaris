<?php
require_once '../config/koneksi.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_barang   = $_POST['id_barang'];
    $jenis       = $_POST['jenis'];
    $jumlah      = $_POST['jumlah'];
    $tanggal     = $_POST['tanggal'];
    $keterangan  = $_POST['keterangan'];

    $stmt = $koneksi->prepare("INSERT INTO transaksi (id_barang, jenis, jumlah, tanggal, keterangan) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$id_barang, $jenis, $jumlah, $tanggal, $keterangan]);

    if($jenis == 'masuk') {
        $stmt = $koneksi->prepare("UPDATE barang SET stok = stok + ? WHERE id = ?");
    } else {
        $stmt = $koneksi->prepare("UPDATE barang SET stok = stok - ? WHERE id = ?");
    }
    $stmt->execute([$jumlah, $id_barang]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Tambah Transaksi</h2>
    <a href="index.php" class="btn btn-secondary btn-sm mb-3">← Kembali</a>

    <form method="POST">
        <div class="mb-3">
            <label>ID Barang</label>
            <input type="number" name="id_barang" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jenis</label>
            <select name="jenis" class="form-control">
                <option value="masuk">Masuk</option>
                <option value="keluar">Keluar</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control">
        </div>
        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control">
        </div>
        <div class="mb-3">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
</body>
</html>
