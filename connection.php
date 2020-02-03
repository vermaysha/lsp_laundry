<?php
defined('_IN_APP_') or die('access denied !'); // keep silent

// Menyisipkan file config.php
require 'config.php';

// Membuat koneksi ke database
if ( ! $db = mysqli_connect(
    DBHOST, 
    DBUSER, 
    DBPASS, 
    DBNAME)) {
    
    echo "Koneksi gagal ! " . $db->connect_error;
    exit(1); // tidak menghasilkan apa-apa ke user
}