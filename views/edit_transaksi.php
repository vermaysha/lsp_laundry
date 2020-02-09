<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
require 'layouts/header.php';
?>
<div class="content">
    <form action="<?php echo SITE_URL; ?>/transaksi.php?action=edit&id=<?php echo $_GET['id']?>" method="post">
        <div class="input-block">
            <label for="customer">Nama Pelanggan</label>
            <select name="customer" id="customer">
                <option value="">-- Select pelanggan --</option>
                <?php foreach ($users as $user) { ?>
                    <option value="<?php echo $user['id_user'] ?>" <?php echo $user['id_user'] == $transaction['id_user'] ? 'selected' : ''?>><?php echo $user['fullname'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="input-block">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" placeholder="Type the description..." value="<?php echo $transaction['keterangan']?>" />
        </div>
        <div class="input-block">
            <button type="submit" name="edit" value="edit">Ubah</button>
        </div>
    </form>
</div>
<?php
require 'layouts/footer.php';
?>