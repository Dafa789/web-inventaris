<?php
require_once '../config/koneksi.php';

$stmt   = $koneksi->query("SELECT * FROM barang");
$barangs = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Data Barang</h2>
    <a href="tambah.php" class="btn btn-primary btn-sm mb-3">+ Tambah Barang</a>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Satuan</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; foreach($barangs as $b): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $b['kode'] ?></td>
            <td><?= $b['nama_barang'] ?></td>
            <td><?= $b['stok'] ?></td>
            <td><?= $b['satuan'] ?></td>
            <td>
                <a href="edit.php?id=<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $b['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
