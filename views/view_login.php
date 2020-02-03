<?php
defined('_IN_APP_') or die('access denied !'); // keep silent
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login page</title>
    <link rel="stylesheet" href="assets/login.css">
</head>
<body>
    <form action="<?php echo SITE_URL;?>/login.php" method="post">
    <?php if (isset($error)){?>
    <div class="alert">
        <p>ERROR ! <?php echo $error;?></p>
    </div>
    <?php }?>
    <div>
        <label for="username">Username</label>
        <input type="text" name="username" id="username">
    </div>
    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
    </div>
    <div>
    <button type="submit" name="login" value="login">Login now !</button>
    </div>
    </form>
</body>
</html>