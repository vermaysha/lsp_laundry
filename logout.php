<?php
// Membuat konstanta
// untuk keamanan file php
define('_IN_APP_', 1);

// Menyisipkan file connection.php
include 'connection.php';
include 'functions.php';

must_authenticated();

session_destroy(); // Kill the session !

header('location: ' . SITE_URL . '/login.php');