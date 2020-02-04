<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
require 'layouts/header.php';
?>
<div class="content">
    <form action="<?php echo SITE_URL; ?>/pelanggan.php?action=edit&id=<?php echo $_GET['id'];?>" method="post">
        <div class="input-block">
            <label for="username">Nama pengguna</label>
            <input type="text" name="username" id="username" placeholder="Type the username..." value="<?php echo $customer['username'] ?>" />
        </div>
        <div class="input-block">
            <label for="fullname">Nama lengkap</label>
            <input type="text" name="fullname" id="fullname" placeholder="Type the fullname..." value="<?php echo $customer['fullname'] ?>" />
        </div>
        <div class="input-block">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="Type the email..." value="<?php echo $customer['email'] ?>" />
        </div>
        <div class="input-block">
            <label for="phone">Nomor telepon</label>
            <input type="number" name="phone" id="phone" placeholder="Type the phone number..." value="<?php echo $customer['phone'] ?>" />
        </div>
        <div class="input-block">
            <label for="gender">Jenis kelamin</label>
            <select name="gender" id="gender">
                <option value="">-- Select Gender --</option>
                <option value="male" <?php if ($customer['gender'] == 'male'){echo 'selected=""';}?>>Laki-laki</option>
                <option value="femaile" <?php if ($customer['gender'] == 'female'){echo 'selected=""';}?>>Wanita</option>
            </select>
        </div>
        <div class="input-block">
            <label for="address">Alamat</label>
            <input type="text" name="address" id="address" placeholder="Type the address..." value="<?php echo $customer['fullname'] ?>" />
        </div>
        <p><strong>Isi password untuk mengupdate password</strong></p>
        <div class="input-block">
            <label for="password">Kata sandi</label>
            <input type="password" name="password" id="password" placeholder="Type the password..." />
        </div>
        <div class="input-block">
            <label for="repassword">Ulangi kata sandi</label>
            <input type="text" name="repassword" id="repassword" placeholder="Type the password again..." />
        </div>
        <div class="input-block">
            <button type="submit" name="edit" value="edit">Ubah</button>
        </div>
    </form>
</div>
<?php
require 'layouts/footer.php';
?>