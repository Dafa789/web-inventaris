<?php
require_once '../config/koneksi.php';

$id = $_GET['id'];

$stmt = $koneksi->prepare("DELETE FROM supplier WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
