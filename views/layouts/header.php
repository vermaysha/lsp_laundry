<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
?>
<!DOCTYPE html>
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
                <?php if ($_SESSION['role'] == 'admin') { ?>
                    <li><a href="<?php echo SITE_URL; ?>/pelanggan.php">Data Pelanggan</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/transaksi.php">Transaksi</a></li>
                    <li><a href="<?php echo SITE_URL; ?>/print-nota-order.php">Cetak Nota Order</a></li>
                <?php } else { ?>
                    <li><a href="<?php echo SITE_URL; ?>/cek-laundry.php">Cek Laundry</a></li>
                <?php } ?>
                <li><a href="<?php echo SITE_URL; ?>/generate-report.php">Generate Laporan</a></li>
            </ul>
        </nav>
    </aside>
    <main class="main">