<?php
session_start();
require_once 'Petugas.php';

$petugas = new Petugas;

// jika session id belum di set, maka kembalikan ke halaman login
if(!isset($_SESSION['id'])) {
    header('Location: ../');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Petugas</title>
    <style type="text/css">
        li {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div>
        <ul style="display:flex; list-style:none;">
            <li><b>Aplikasi Pembayaran SPP</b></li>
            <li><a href="?p=transaksi">Transaksi</a></li>
            <li><a href="?p=logout">Logout</a></li>
        </ul>
    </div>