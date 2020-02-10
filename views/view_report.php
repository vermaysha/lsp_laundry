<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
require 'layouts/header.php';
?>
<div class="content">
    <table border="1" style="width: 100%">
        <tr>
            <th>#</th>
            <th>Nama Pemilik</th>
            <th>Tanggal Transaksi</th>
            <th>Keterangan</th>
        </tr>
        <?php $i = 1;
        foreach ($transactions as $trans) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $trans['fullname'] ?></td>
                <td><?php echo $trans['tgltransaksi'] ?></td>
                <td><?php echo $trans['keterangan'] ?></td>
            </tr>
        <?php $i++;
        endforeach; ?>
        <tr>
            <th>#</th>
            <th>Nama Pemilik</th>
            <th>Tanggal Transaksi</th>
            <th>Keterangan</th>
        </tr>
    </table>
    <button type="button" onclick="window.print()" class="no-print">Print</button>
</div>
<?php
require 'layouts/footer.php';
?>