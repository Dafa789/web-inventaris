<?php
require_once '../config/koneksi.php';

$stmt      = $koneksi->query("SELECT * FROM transaksi");
$transaksis = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Data Transaksi</h2>
    <a href="tambah.php" class="btn btn-primary btn-sm mb-3">+ Tambah Transaksi</a>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>ID Barang</th>
            <th>Jenis</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
        </tr>
        <?php $no = 1; foreach($transaksis as $t): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $t['id_barang'] ?></td>
            <td>
                <?php if($t['jenis'] == 'masuk'): ?>
                <span class="badge bg-success">Masuk</span>
                <?php else: ?>
                <span class="badge bg-danger">Keluar</span>
                <?php endif; ?>
            </td>
            <td><?= $t['jumlah'] ?></td>
            <td><?= $t['tanggal'] ?></td>
            <td><?= $t['keterangan'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
