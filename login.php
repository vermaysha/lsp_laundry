<?php
// Membuat konstanta
// untuk keamanan file php
define('_IN_APP_', 1);

// Menyisipkan file connection.php
include 'connection.php';
include 'functions.php';

must_unauthenticated();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $plain_pass = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE `username` = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result(); // fetch a row
    $user = $result->fetch_object();

    if ($result->num_rows <= 0) {
        $error = "Username salah !";
    } else if ( ! password_verify($plain_pass, $user->password)) {
        $error = "Password salah !";
    } else {
        $_SESSION['is_login'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user->role;
        $_SESSION['id_user'] = $user->id_user;
        header('location: ' . SITE_URL);
        exit(0);
    }
}

// Menampilkan halaman view_login
require_once 'views/view_login.php';