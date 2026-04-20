<?php
require_once '../config/koneksi.php';

$stmt      = $koneksi->query("SELECT * FROM supplier");
$suppliers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Supplier</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">
    <h2>Data Supplier</h2>
    <a href="tambah.php" class="btn btn-primary btn-sm mb-3">+ Tambah Supplier</a>

    <table class="table table-bordered table-striped">
        <tr>
            <th>No</th>
            <th>Nama Supplier</th>
            <th>Alamat</th>
            <th>No Telp</th>
            <th>Aksi</th>
        </tr>
        <?php $no = 1; foreach($suppliers as $s): ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $s['nama_supplier'] ?></td>
            <td><?= $s['alamat'] ?></td>
            <td><?= $s['no_telp'] ?></td>
            <td>
                <a href="edit.php?id=<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $s['id'] ?>" class="btn btn-danger btn-sm">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>
