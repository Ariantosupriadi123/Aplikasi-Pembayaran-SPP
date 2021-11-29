<?php
require_once 'header.php';

if(isset($_GET['p'])) {
    if($_GET['p'] == 'transaksi') {
        require_once 'includes/transaksi.php';
    } elseif($_GET['p'] == 'logout') {
        header('Location: ../');
        session_destroy();
    }
} elseif(isset($_GET['nis'])) {
    require_once 'includes/transaksi.php';
    $_SESSION['nis'] = $_GET['nis'];
}