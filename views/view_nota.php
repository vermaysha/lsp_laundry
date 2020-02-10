<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
require 'layouts/header.php';
?>
<div class="content">
    <table border="1" style="width: 100%">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Tanggal Transaksi</th>
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
        </tr>
    </table>
    <button class="no-print" type="button" onclick="window.print()">Print</button>
</div>
<?php
require 'layouts/footer.php';
?>