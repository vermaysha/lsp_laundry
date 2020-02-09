<?php

// Membuat konstanta
// untuk keamanan file php
define('_IN_APP_', 1);

// Menyisipkan file connection.php
include 'connection.php';
include 'functions.php';

// User must authenticated !
must_authenticated();

if (!have_access('manage_transaction')) {
    header('location: ' . SITE_URL);
}

switch (isset($_GET['action']) ? $_GET['action'] : null) {
    case 'new':
        if (isset($_POST['new'])) {
            $customer = $_POST['customer'];
            $keterangan = $_POST['keterangan'];

            $stmt = $db->prepare("INSERT INTO `transaksi` SET `id_user` = ?, `tgltransaksi` = ?, `keterangan` = ?");
            $now = date('Y-m-d');
            $stmt->bind_param('sss', $customer, $now, $keterangan);
            if ($stmt->execute()) {
                header('location: ' . SITE_URL . '/transaksi.php?status=success-added&idtrans=' . $stmt->insert_id);
                exit(0);
            }
        }
        $result = $db->query("SELECT * FROM `users` WHERE `role` = 'pelanggan'");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        require 'views/new_transaksi.php';
        break;
    case 'edit':
        if (isset($_POST['edit'])) {
            $customer = $_POST['customer'];
            $keterangan = $_POST['keterangan'];
            $idtrans = $_GET['id'];

            $stmt = $db->prepare("UPDATE `transaksi` SET `id_user` = ?, `keterangan` = ? WHERE `idtransaksi` = ?");
            $stmt->bind_param('sss', $customer, $keterangan, $idtrans);
            if ($stmt->execute()) {
                header('location: ' . SITE_URL . '/transaksi.php?status=success-edited');
                exit(0);
            }
        }
        $idtrans = $_GET['id'];
        $stmt = $db->prepare("SELECT `transaksi`.*, `users`.`fullname` FROM `transaksi` INNER JOIN `users` ON `transaksi`.`id_user` = `users`.`id_user` WHERE `idtransaksi` = ?");
        $stmt->bind_param('s', $idtrans);
        $stmt->execute();
        $result = $stmt->get_result();
        $transaction = $result->fetch_assoc();

        $result = $db->query("SELECT * FROM `users` WHERE `role` = 'pelanggan'");
        $users = $result->fetch_all(MYSQLI_ASSOC);
        require 'views/edit_transaksi.php';
        break;
    case 'delete':
        $idtrans = $_GET['id'];
        // Untuk menghapus data dalam relation harus dimulai dari tabel child dilanjut parent
        $stmt = $db->prepare("SELECT `idlaundry` FROM `detaillaundry` WHERE `idtransaksi` = ?");
        $stmt->bind_param('s', $idtrans);
        $stmt->execute();
        $result = $stmt->get_result();
        $idlaundry = $result->fetch_object()->idlaundry;

        $stmt = $db->prepare("DELETE FROM `detaillaundry` WHERE `idtransaksi` =  ? ");
        $stmt->bind_param('s', $idtrans);
        $stmt->execute();

        $stmt = $db->prepare("DELETE FROM `laundry` WHERE `idlaundry` = ?");
        $stmt->bind_param('s', $idlaundry);
        $stmt->execute();

        $stmt = $db->prepare("DELETE FROM `transaksi` WHERE `idtransaksi` = ?");
        $stmt->bind_param('s', $idtrans);
        $stmt->execute();

        header('location: ' . SITE_URL . '/transaksi.php');
        exit(1);
        break;
    default:
        switch (isset($_GET['status']) ? $_GET['status'] : null) {
            case 'success-edited':
                $success = 'Transaksi telah diubah';
                break;
            case 'success-added':
                $success = 'Trasaksi telah ditambahkan';
                break;
            case 'success-deleted':
                $success = 'Trasaksi telah dihapus';
                break;
            default:
        }
        $result = $db->query("SELECT `transaksi`.*, `users`.`fullname` FROM `transaksi` INNER JOIN `users` ON `transaksi`.`id_user` = `users`.`id_user`");
        $transactions = $result->fetch_all(MYSQLI_ASSOC);
        require 'views/view_transaksi.php';
}
