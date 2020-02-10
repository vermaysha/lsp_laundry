<?php

// Membuat konstanta
// untuk keamanan file php
define('_IN_APP_', 1);

// Menyisipkan file connection.php
include 'connection.php';
include 'functions.php';

// User must authenticated !
must_authenticated();

if (!have_access('print_order')) {
    header('location: ' . SITE_URL);
}

switch (isset($_GET['status']) ? $_GET['status'] : null) {
    case 'success-edited-cust':
        $success = 'Laundry telah diubah';
        break;
    case 'success-created-cust':
        $success = 'Laundry telah ditambahkan';
        break;
    case 'success-deleted-cust':
        $success = 'Laundry telah dihapus';
        break;
    default:
}
$sql = "SELECT `laundry`.*, `detaillaundry`.`total`, `detaillaundry`.`iddetail`, `detaillaundry`.`keterangan`, `statuslaundry`.`namastatus`,`transaksi`.`tgltransaksi` FROM `laundry` INNER JOIN `detaillaundry` ON `laundry`.`idlaundry` = `detaillaundry`.`idlaundry` INNER JOIN `statuslaundry` ON `detaillaundry`.`idstatus` = `statuslaundry`.`idstatus` INNER JOIN `transaksi` ON `transaksi`.`idtransaksi` = `detaillaundry`.`idtransaksi` WHERE `detaillaundry`.`idtransaksi` = ? ";
$stmt = $db->prepare($sql);
$idtrans = $_GET['idtrans'];
$stmt->bind_param('s', $idtrans);
$stmt->execute();
$result = $stmt->get_result();
$laundries = $result->fetch_all(MYSQLI_ASSOC);

require 'views/view_nota.php';
