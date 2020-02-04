<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
require 'layouts/header.php';
?>
<div class="content">
    <a href="<?php echo SITE_URL; ?>/pelanggan.php?action=new">Tambah Pelanggan</a>
    <?php if (isset($success)):?>
        <p><strong>Sukses !</strong> <?php echo $success;?></p>
    <?php endif;?>
    <table border="1" style="width: 100%">
        <tr>
            <th>#</th>
            <th>Nama lengkap</th>
            <th>Nama pengguna</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Action</th>
        </tr>
        <?php $i = 1;
        foreach ($customers as $cust) : ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $cust['fullname'] ?></td>
                <td><?php echo $cust['username'] ?></td>
                <td><?php echo $cust['address'] ?></td>
                <td><?php echo $cust['gender'] ?></td>
                <td>
                    <a href="<?php echo SITE_URL; ?>/pelanggan.php?action=delete&id=<?php echo $cust['id_user'] ?>">Hapus</a>
                    <a href="<?php echo SITE_URL; ?>/pelanggan.php?action=edit&id=<?php echo $cust['id_user'] ?>">Ubah</a>
                </td>
            </tr>
        <?php $i++;
        endforeach; ?>
        <tr>
            <th>#</th>
            <th>Nama lengkap</th>
            <th>Nama pengguna</th>
            <th>Alamat</th>
            <th>Jenis Kelamin</th>
            <th>Action</th>
        </tr>
    </table>
</div>
<?php
require 'layouts/footer.php';
?>