<?php

// Membuat konstanta
// untuk keamanan file php
define('_IN_APP_', 1);

// Menyisipkan file connection.php
include 'connection.php';
include 'functions.php';

// User must authenticated !
must_authenticated();

if ( 
    ! have_access('check_data_laundry') && 
    ! have_access('check_status_laundry')
) {
    header('location: ' . SITE_URL);
}

$sql = "SELECT `laundry`.*, `detaillaundry`.`total`, `detaillaundry`.`iddetail`, `detaillaundry`.`keterangan`, `statuslaundry`.`namastatus`,`transaksi`.`tgltransaksi` FROM `laundry` INNER JOIN `detaillaundry` ON `laundry`.`idlaundry` = `detaillaundry`.`idlaundry` INNER JOIN `statuslaundry` ON `detaillaundry`.`idstatus` = `statuslaundry`.`idstatus` INNER JOIN `transaksi` ON `transaksi`.`idtransaksi` = `detaillaundry`.`idtransaksi` WHERE `transaksi`.`id_user` = ?";
$stmt = $db->prepare($sql);
$id_user = $_SESSION['id_user'];
$stmt->bind_param('s', $id_user);
$stmt->execute();
$result = $stmt->get_result();
$laundries = $result->fetch_all(MYSQLI_ASSOC);

require 'views/cek_laundry.php';