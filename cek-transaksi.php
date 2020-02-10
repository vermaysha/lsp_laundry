<?php

// Membuat konstanta
// untuk keamanan file php
define('_IN_APP_', 1);

// Menyisipkan file connection.php
include 'connection.php';
include 'functions.php';

// User must authenticated !
must_authenticated();

if ( ! have_access('check_detail_laundry')) {
    header('location: ' . SITE_URL);
}

$stmt = $db->prepare("SELECT `transaksi`.*, `users`.`fullname` FROM `transaksi` INNER JOIN `users` ON `transaksi`.`id_user` = `users`.`id_user` WHERE `transaksi`.`id_user` = ?");
$id_user = $_SESSION['id_user'];
$stmt->bind_param('s', $id_user);
$stmt->execute();
$result = $stmt->get_result();
$transactions = $result->fetch_all(MYSQLI_ASSOC);

require 'views/cek_transaksi.php';