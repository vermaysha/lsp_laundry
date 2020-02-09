<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
require 'layouts/header.php';
?>
<div class="content">
    <a href="<?php echo SITE_URL; ?>/laundry.php?action=new&idtrans=<?php echo $_GET['idtrans'] ?>">Tambah</a>
    <table border="1" style="width: 100%">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Tanggal Transaksi</th>
            <th>Action</th>
        </tr>
        <?php $i = 1;
        foreach ($laundries as $lan) { ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $lan['nama']; ?></td>
                <td><?php echo $lan['harga']; ?></td>
                <td><?php echo $lan['type']; ?></td>
                <td><?php echo $lan['namastatus']; ?></td>
                <td><?php echo $lan['tgltransaksi']; ?></td>
                <td>
                    <a href="<?php echo SITE_URL; ?>/laundry.php?action=delete&idtrans=<?php echo $_GET['idtrans'] ?>&iddetail=<?php echo $lan['iddetail']; ?>&idlaundry=<?php echo $lan['idlaundry']?>">Hapus</a>
                    <a href="<?php echo SITE_URL; ?>/laundry.php?action=edit&idtrans=<?php echo $_GET['idtrans'] ?>&iddetail=<?php echo $lan['iddetail']; ?>&idlaundry=<?php echo $lan['idlaundry']?>">Ubah</a>
                </td>
            </tr>
        <?php $i++;
        } ?>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Tanggal Transaksi</th>
            <th>Action</th>
        </tr>
    </table>
</div>
<?php
require 'layouts/footer.php';
?>