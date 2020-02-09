<?php

// Membuat konstanta
// untuk keamanan file php
define('_IN_APP_', 1);

// Menyisipkan file connection.php
include 'connection.php';
include 'functions.php';

// User must authenticated !
must_authenticated();

if ( ! have_access('manage_laundry')) {
    header('location: '.SITE_URL);
    exit;
}

if ( ! isset($_GET['idtrans'])) {
    header('location: '. SITE_URL);
    exit;
}

switch (isset($_GET['action']) ? $_GET['action'] : null) {
    case 'new':
        if (isset($_POST['new'])) {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $type    = $_POST['type'];
            $status = $_POST['status'];
            $keterangan = $_POST['keterangan'];
            $total = $_POST['total'];

            $stmt = $db->prepare("INSERT INTO `laundry` (`nama`, `harga`, `type`) VALUES (?,?,?)");
            $stmt->bind_param('sss', $nama, $harga, $type);
            if ($stmt->execute()) {
                $last_insert_id = $stmt->insert_id;
                $idtrans = $_GET['idtrans'];
                $stmt = $db->prepare("INSERT INTO `detaillaundry` (`idtransaksi`, `idlaundry`, `idstatus`, `harga`, `total`, `keterangan`) VALUES (?,?,?,?,?,?)");
                $stmt->bind_param('ssssss', $idtrans, $last_insert_id, $status, $harga, $total, $keterangan);
                if ( ! $stmt->execute()) {
                    echo $db->error;
                    exit;
                } else {
                    header('location: ' . SITE_URL . '/laundry.php?status=success-added&idtrans='. $_GET['idtrans']);
                    exit;
                }
            } else {
                echo $db->error;
                exit;
            }
            
        }

        $result = $db->query("SELECT * FROM `statuslaundry`");
        $statuses = $result->fetch_all(MYSQLI_ASSOC);
        require 'views/new_laundry.php';
        break;
    case 'edit':
        if (isset($_POST['edit'])) {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $type    = $_POST['type'];
            $status = $_POST['status'];
            $keterangan = $_POST['keterangan'];
            $total = $_POST['total'];
            $idlaundry = $_GET['idlaundry'];
            $iddetail = $_GET['iddetail'];

            $stmt = $db->prepare("UPDATE `laundry` SET `nama` = ?, `harga` = ?, `type` = ? WHERE `idlaundry` = ?");
            $stmt->bind_param('ssss', $nama, $harga, $type, $idlaundry);
            if ($stmt->execute()) {
                $stmt = $db->prepare("UPDATE `detaillaundry` SET `idstatus` = ?, `harga` = ?, `total` = ?, `keterangan` = ? WHERE `iddetail` = ?");
                $stmt->bind_param('sssss', $status, $harga, $total, $keterangan, $iddetail);
                if (!$stmt->execute()) {
                    echo $db->error;
                    exit;
                } else {
                    header('location: ' . SITE_URL . '/laundry.php?status=success-edited&idtrans=' . $_GET['idtrans']);
                    exit;
                }
            } else {
                echo $db->error;
                exit;
            }
        }

        $result = $db->query("SELECT * FROM `statuslaundry`");
        $statuses = $result->fetch_all(MYSQLI_ASSOC);

        $sql = "SELECT `laundry`.*, `detaillaundry`.`total`, `detaillaundry`.`iddetail`, `detaillaundry`.`keterangan`, `detaillaundry`.`idstatus`, `statuslaundry`.`namastatus`,`transaksi`.`tgltransaksi` FROM `laundry` INNER JOIN `detaillaundry` ON `laundry`.`idlaundry` = `detaillaundry`.`idlaundry` INNER JOIN `statuslaundry` ON `detaillaundry`.`idstatus` = `statuslaundry`.`idstatus` INNER JOIN `transaksi` ON `transaksi`.`idtransaksi` = `detaillaundry`.`idtransaksi` WHERE `detaillaundry`.`idtransaksi` = ? AND `laundry`.`idlaundry` = ? ";
        $stmt = $db->prepare($sql);
        $idtrans = $_GET['idtrans'];
        $idlaundry = $_GET['idlaundry'];
        $stmt->bind_param('ss', $idtrans, $idlaundry);
        $stmt->execute();
        $result = $stmt->get_result();
        $lan = $result->fetch_assoc();
        require 'views/edit_laundry.php';
        break;
    case 'delete':
        $iddetail = $_GET['iddetail'];
        $idlaundry = $_GET['idlaundry'];
        $stmt = $db->prepare("DELETE FROM `detaillaundry` WHERE `iddetail` =  ? ");
        $stmt->bind_param('s', $iddetail);
        if ($stmt->execute()) {
            $stmt = $db->prepare("DELETE FROM `laundry` WHERE `idlaundry` =  ? ");
            $stmt->bind_param('s', $idlaundry);
            $stmt->execute();
            header('location: '.SITE_URL.'/laundry.php?idtrans=' . $_GET['idtrans']);
        } else {
            echo $db->error;
        }
        exit;
    break;
    default:
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
        require 'views/view_laundry.php';
}
