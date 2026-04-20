<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_inventaris';

$koneksi = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
$koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
