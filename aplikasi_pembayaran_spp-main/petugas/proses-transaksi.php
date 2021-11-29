<?php
session_start();
require_once 'Petugas.php';

$petugas = new Petugas;

if(!isset($_SESSION['id'])) {
    header('Location: ../');
} else {
    if($_GET['act'] == 'bayar') {
        // ambil id_pembayaran dari url
        $id_pembayaran = $_GET['id'];
        // tanggal bayar (hari ini)
        $tgl_bayar = date('Y-m-d');
        // dapatkan id_petugas yang saat ini login
        $id_petugas = $_SESSION['id'];

        $bayar = $petugas->prosesBayar($tgl_bayar, $id_petugas, $id_pembayaran);

        if($bayar) {
            $_SESSION['pesan'] = 'Pembayaran Sukses';
            header('Location: index.php?nis='.$_SESSION['nis']);
        } else {
            $_SESSION['pesan'] = 'Pembayaran Gagal';
            header('Location: index.php?nis='.$_SESSION['nis']);
        }
    } elseif($_GET['act'] == 'batal') {
        $id_pembayaran = $_GET['id'];

        $batal = $petugas->batalBayar($id_pembayaran);

        if($batal) {
            $_SESSION['pesan'] = 'Pembayaran Dibatalkan';
            header('Location: index.php?nis='.$_SESSION['nis']);
        } else {
            $_SESSION['pesan'] = 'Pembayaran Gagal Dibatalkan';
            header('Location: index.php?nis='.$_SESSION['nis']);
        }
    }
}