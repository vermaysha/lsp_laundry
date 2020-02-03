<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplikasi laundry</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <header class="header">
        <nav class="nav">
            <ul>
                <li class="site-title"><a href="<?php echo SITE_URL; ?>">Pengelolaan Laundry</a></li>
                <li class="logout"><a href="<?php echo SITE_URL . '/logout.php'; ?>">Logout</a></li>
            </ul>
            <div class="clearfix"></div>
        </nav>
    </header>
    <aside class="sidebar">
        <nav class="nav">
            <ul>
                <li><a href="<?php echo SITE_URL; ?>">Data Laundry</a></li>
                <li><a href="<?php echo SITE_URL; ?>">Data Pelanggan</a></li>
                <li><a href="<?php echo SITE_URL; ?>">Transaksi</a></li>
                <li><a href="<?php echo SITE_URL; ?>">Cetak Nota Order</a></li>
                <li><a href="<?php echo SITE_URL; ?>">Generate Laporan</a></li>
            </ul>
        </nav>
    </aside>
    <main class="main">