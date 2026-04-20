<?php
require_once 'config/koneksi.php';

$total_barang   = $koneksi->query("SELECT COUNT(*) FROM barang")->fetchColumn();
$total_supplier = $koneksi->query("SELECT COUNT(*) FROM supplier")->fetchColumn();
$total_keluar   = $koneksi->query("SELECT COUNT(*) FROM transaksi WHERE jenis='keluar'")->fetchColumn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-4">

    <h2>Dashboard Inventaris Barang</h2>
    <hr>

    <a href="barang/index.php" class="btn btn-primary me-2">Data Barang</a>
    <a href="supplier/index.php" class="btn btn-success me-2">Data Supplier</a>
    <a href="transaksi/index.php" class="btn btn-warning me-2">Transaksi</a>

    <hr>

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5>Total Barang</h5>
                    <h2><?= $total_barang ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5>Total Supplier</h5>
                    <h2><?= $total_supplier ?></h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5>Barang Keluar</h5>
                    <h2><?= $total_keluar ?></h2>
                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
